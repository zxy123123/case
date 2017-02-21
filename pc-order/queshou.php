<?php
    require '../init.php';
    /* p($_GET);*/
    $a = $_GET['a'];
    $id = $_GET['id'];
    switch($a){
        case '1':
            $sql = "update ".PRE."order set `status`='2' where `id`='$id'";
            $row = execute($link,$sql);
            // echo $sql;
            // p($row);exit;
            if($row){
                redirect('收货成功');
            }else{
                redirect('收货失败');
            }
            
            break;
            default:
                redirect('非收货状态');
}
    
?>



    
    
    
    
    
    
    
    
    
    
    
    