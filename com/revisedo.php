<?php 
    require '../init.php';

// p($_SESSION);
//     p($_POST);
// exit;

    //表单不为空,如果有空值,回之
    foreach ($_POST as $key => $val) {
        if ($val == '') {
            redirect('请完善表单信息!');
            exit;
        }
    }

    //检测验证码
    $vcode = strtolower($_SESSION['vcode']);
    $uservcode = strtolower($_POST['vcode']);
    if ($vcode != $uservcode) {
        redirect('验证码错误!');
        exit;
    }


    //密码验证
    $pwd_reg = '/^[\S]{4,32}$/';



    //接收用户信息
    $name = $_SESSION['home']['name'];
    $pwd = md5($_POST['pwd']);
    $repwd = md5($_POST['repwd']);
    $npwd = md5($_POST['npwd']);

     if (!preg_match($pwd_reg, $_POST['npwd'])) {
         redirect('密码不够长!');
        exit;
    }

    if($npwd !=$repwd){
        redirect('密码不一致');
        exit;   
    }


 $sql="SELECT `pwd`FROM ".PRE."user WHERE `name`='$name'";

        $result= query($link,$sql);



       $row = $result[0];
       if ($pwd != $row['pwd']) {
        redirect('原始密码验证错误,请重试');
        exit;
       }


     $sql = "UPDATE ".PRE."user SET `pwd`='$npwd' WHERE `name`='$name'";

    if (execute($link,$sql)) {
        redirect('修改成功!');
        exit;
    }else{
        redirect('修改失败,请重试!');
        exit;
    }


    mysqli_close($link);



