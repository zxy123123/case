<?php
require '../init.php';
// p($_GET);
// p($_SESSION);
$on = $_GET['on'];
$od = $_GET['od'];




// p($sss);
// exit;





$gid = $_GET['gid'];
$id = $_SESSION['home']['id'];
$uname = $_SESSION['home']['name'];
$hf = $_POST['hf'];
$say = $_GET['say'];



// if(empty($hf)) {
//     redirect('啥都没回复呢');
//     exit;
// }

$sql = "UPDATE s47_discuss SET `reply`='$hf' WHERE `order_id`='$od'";


$row = execute($link,$sql);

// p($row);

if($row) {
    redirect('回复成功');
}else{
    redirect('回复失败');
}


