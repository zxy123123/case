<?php 
  require './init.php';
  unset($_SESSION['admin']);
  admin_redirect("退出成功!",ADMIN_URL.'login.php');




