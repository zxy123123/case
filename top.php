<!-- TOP -->
<?php require './init.php'; ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../imgs/1.png" >
    <title>top</title>

    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/home.css" >
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php" target="_top">
          <img src="./imgs/1.png" id="logo" size="60x60">
      </a>
    </div>

    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav ">
               <li><a href="index.php" target="_top">首页</a></li>
        <li><a href="./Personal Center.php" target="_top">个人中心</a></li>
        <li><a href="./pc-order/index.php" target="main" >交易管理</a></li>
        <li><a href="./revise.php" target="main">账户管理</a></li>
        <li><a href="nb404.php" target="_blank">客户服务</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">最近登录时间: <?php echo date('Y年m月d日 H:i:s') ?></a></li>
        <li><a href="#">您好, <?php echo $_SESSION['home']['name'] ?></a></li>
        <li><a href="./com/logout.php" target="_top">退出</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>