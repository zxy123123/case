<?php
require './init.php';
// p($_POST);
// exit;

$sex = $_POST['sex'];
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
// $file = $_POST['file'];



    foreach ($_POST as $key => $val) {
        if ($val == '') {
            redirect('请完善信息');
        exit;
}
}
// 用户名验证
$name_reg = '/^[a-zA-Z][\w]{3,15}$/i';
// 手机号
$tel_reg = '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/';
// 邮箱
$email_reg ='/[\w\.]+@\w+(\.\w+)+(\.\w+)*/i';

if (!preg_match($name_reg,$name)){
    redirect('用户名不合法!');
    exit;
}

if(!preg_match($tel_reg,$tel)) {
    redirect('非合法手机号');
    exit;
}

if(!preg_match($email_reg,$email)) {
    redirect('邮箱不合法');
    exit;
}





$sql ="UPDATE s47_user SET `name`='$name', `tel`='$tel', `email`='$email',`sex`='$sex' WHERE `id`='{$_SESSION['home']['id']}'";
if (execute($link,$sql)) {
    redirect('修改成功');
    exit;
}else{
    redirect('修改失败,请重试');
    exit;
}

mysqli_close($link);