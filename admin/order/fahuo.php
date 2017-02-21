<?php
    require '../init.php';
   /* p($_GET);*/
    $a = $_GET['a'];
    $id = $_GET['id'];
    switch($a){
        case '0':
            $sql = "update ".PRE."order set `status`='1' where `id`='$id'";
            $row = execute($link,$sql);
            if($row){
                admin_redirect('发货成功');
            }else{
                admin_redirect('发货失败');
            }
            
            break;
            default:
                admin_redirect('非发货状态');
}
