<?php
require '../init.php';

$gid = $_GET['gid'];
$id = $_SESSION['home']['id'];
$uname = $_SESSION['home']['name'];
$pl = $_POST['pl'];
$on = $_GET['on'];
$od = $_GET['od'];
// p($od);
// exit;
// p($_GET);
// P($_SESSION);
// P($_POST);
// p($od);
// exit;

if (empty($pl)) {
    redirect('啥都没评论呢');
    exit;
}
$sql = "SELECT `say` FROM s47_discuss WHERE `order_id`='$od'";
$sss = query($link,$sql);

if (!empty($sss)){
    redirect('只能评论一次');
    exit;
}

$sql = "INSERT INTO s47_discuss (`say`,`goods_id`,`user_name`,`ordernum`,`order_id`) VALUES ('$pl','$gid','$uname','$on','$od')";

$row = execute($link,$sql);
// p($row);

if($row) {
    redirect('评论成功');
}else{
    redirect('评论失败');
}







