<?php 
    require '../init.php';

   /* p($_SESSION);
    p($_POST);*/

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

    //用户名验证
   $name_reg = '/^[a-zA-Z][\w]{3,15}$/i';
    //密码验证
    $pwd_reg = '/^[\S]{4,32}$/';
    //两次密码一致性的验证

        //手机号
    $tel_reg = '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/';
    //邮箱
    $email_reg = '/[\w\.]+@\w+(\.\w+)+(\.\w+)*/i';
    //接收用户信息
    $name = $_POST['name'];
    $pwd = md5($_POST['pwd']);
    $repwd = md5($_POST['repwd']);
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    if (!preg_match($name_reg,$name)){
         redirect('用户名不合法!');
        exit;  
    }
 

     if (!preg_match($pwd_reg, $_POST['pwd'])) {
         redirect('密码不够长!');
        exit;  
    }

    if($pwd !=$repwd){
        redirect('密码不一致');
        exit;   
    }

     if (!preg_match($tel_reg, $_POST['tel'])) {
         redirect('非合法手机号!');
        exit;   
    }
     $sql = "INSERT INTO ".PRE."user (`name`,`pwd`,`tel`,`email`) VALUES('$name','$pwd','$tel','$email')";
    if (execute($link,$sql)) {
        redirect('注册成功!',URL.'login.php');
        exit;
    }else{
        redirect('注册失败,请重试!');
        exit;
    }


    mysqli_close($link);



