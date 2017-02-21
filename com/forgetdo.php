<?php 
    require '../init.php';
/*
    p($_SESSION);
    p($_POST);
exit;*/
  
   



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
    
    //接收用户信息
    $name = $_POST['name'];
    $pwd = md5($_POST['pwd']);
    $repwd = md5($_POST['repwd']);
    $tel = $_POST['tel'];

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





 $sql="SELECT `name`,`tel` FROM ".PRE."user WHERE `name`='$name'";

        $result= query($link,$sql);

       if(empty($result)){
        redirect('用户名不存在,请重试');
        exit;
       }

       $row = $result[0];
       if ($tel != $row['tel']) {
        redirect('手机号验证不通过,请重试');
        exit;
       }



     $sql = "UPDATE ".PRE."user SET `pwd`='$pwd'";

    if (execute($link,$sql)) {
        redirect('重置成功!',URL.'login.php');
        exit;
    }else{
        redirect('重置失败,请重试!');
        exit;
    }


    mysqli_close($link);



