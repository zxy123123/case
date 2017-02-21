<?php 
    require '../init.php';

    unset($_SESSION['home']);
    redirect('退出成功',URL.'index.php',1);