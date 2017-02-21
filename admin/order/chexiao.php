<?php
    require '../init.php';
    // p($_GET);
    $a = $_GET['a'];
    $id = $_GET['id'];

    switch($a){

             case '0':
            $sql = "UPDATE ".PRE."order SET `status`='3' where `id`='$id'";
            $row = execute($link,$sql);
            if($row){
                admin_redirect('撤单成功');
            }else{
                admin_redirect('撤单失败');
            }
            
            break;
            case '2':
            $sql = "UPDATE ".PRE."order SET `status`='3' where `id`='$id'";
            $row = execute($link,$sql);
            if($row){
                admin_redirect('撤单成功');
            }else{
                admin_redirect('撤单失败');
            }
            break;

            default:
                admin_redirect('非撤消状态');
}
