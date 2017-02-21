<?php 

 require '../init.php';
 // p($_SESSION);

// p($_SESSION);
// exit;
// 
foreach ($_POST as $key => $val) {
  // p($_POST);
      if ($val == '') {
            redirect('请完善收货信息!');
            exit;
      }
}




$ordernum = date('Ymd').mt_rand(100,999);
$user_id = $_SESSION['home']['id'];
$oname = $_POST['oname'];
$phone = $_POST['tel'];
$address = $_POST['address'];
$allprice = 0;
foreach ($_SESSION['cart'] as $key => $val){
$allprice += $val['price'] * $val['qty'];
}

$status = 0;
/*var_dump($_SESSION['cart']);
exit;*/

$sql = "INSERT INTO ".PRE."order (`user_id`,`oname`,`phone`,`address`,`ordernum`,`allprice`,`status`) VALUES ('$user_id','$oname','$phone','$address','$ordernum','$allprice','$status')";
$xx = execute($link,$sql);

if($xx>0) {

}else{
    redirext('添加失败');
    exit;
}


$list = $_SESSION['cart'];
foreach ($list as $key => $val) {
$sql = "INSERT INTO ".PRE."ordergoods (`goods_id`,`price`,`qty`,`order_id`) VALUES('{$val['id']}','{$val['price']}','{$val['qty']}','$xx');";
      $result=execute($link,$sql);
    if(!$result >0){
      redirect('又失败了...');
      exit;
    }
}
redirect('订单已受理...','../Personal Center.php',3);
unset($_SESSION['cart']);
?>