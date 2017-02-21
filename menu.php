<?php require './init.php'; ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/1.png" type="image/png">
    <title>menu</title>

    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/admin.css">
</head>
<body>
<div class="mt30"></div>

<!-- <div class="panel panel-warning">
    <div class="panel-heading">用户管理</div>
    <div class="list-group">
        <a href="./user/index.php" target="main" class="list-group-item">前台用户列表</a>
        <a href="./user/add.php" target="main" class="list-group-item">添加前台用户</a>
        <a href="#" class="list-group-item">后台用户列表</a>
        <a href="#" class="list-group-item">添加后台用户</a>

    </div>
</div> -->

<div class="panel-group" id="accordion">
 <div class="panel panel-warning">
    <div class="panel-heading"><h3>我的青橙</h3></div>
    <div class="list-group">
        <span class="list-group-item">欢迎您,<?php echo $_SESSION['home']['name'] ?></span>
        <span class="list-group-item">等级:行者</span>
        <span class="list-group-item">青橙币:2000</span>
    </div>
</div>

  <div class="panel panel-warning">
    <div class="panel-heading">交易管理</div>
    <div class="list-group">
        <a href="./showcart.php" target="_blank" class="list-group-item">我的购物车</a>
        <a href="./pc-order/index.php" target="main" class="list-group-item">我的订单</a>
    </div>
</div>

<div class="panel panel-warning">
    <div class="panel-heading">账户管理</div>
    <div class="list-group">
        <a href="./revise.php" target="main" class="list-group-item">修改密码</a>
        <a href="./update.php" target="main" class="list-group-item">修改信息</a>
        <a href="./head.php" target="main" class="list-group-item">修改头像</a>
    </div>
</div>

<div class="panel panel-warning">
    <div class="panel-heading">客户服务</div>
    <div class="list-group">
        <a href="./nb404.php" target="_blank"class="list-group-item">我的售后</a>
        
    </div>

</div>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>