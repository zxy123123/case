<?php
    require '../init.php';

    $id = $_GET['id'];

    // p($_GET);

$sql = "UPDATE s47_goods SET `zan`=`zan`+1 WHERE `id`='$id'";
execute($link,$sql);
header("location:".$_SERVER['HTTP_REFERER']);