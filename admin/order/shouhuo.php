<?php
    require '../init.php';
    /*p($_GET);*/
    $a = $_GET['a'];
    $id = $_GET['id'];

    switch($a){
            case '1':
            $sql = "update ".PRE."order set `status`='2' where `id`='$id'";
            $row = execute($link,$sql);
            if($row){
                admin_redirect('强制收货成功');
            }else{
                admin_redirect('强制收货失败');
            }
            break;
default:
                admin_redirect('非收货状态');
}
