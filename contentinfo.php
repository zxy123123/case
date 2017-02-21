<!-- 详情页 -->
<?php 
    require './init.php' ;
    $goods_id = $_GET['id'];
    $gname = $_GET['gname'];
?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/1.png" type="image/png" >
    <title>[<?php echo $gname ?>]--商城</title>
    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="./public/css/my.css">
</head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>

<!-- 引入商品详情 -->
<?php require PATH.'com/shop.php'; ?>
<!-- 引入回顶部 -->
<?php require PATH.'com/gotop.php';?>

<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>


<script src="./public/home.js"></script>
<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>