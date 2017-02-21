<!-- 登录 -->
<?php require './init.php' ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/1.png" type="image/png" >
    <title>商城</title>
    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="./public/login.css">
</head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>

<div class="conatiner mt50 zt">
    <div class="clearfix mt50"></div>
    <h1 class="text-center mt50 col">欢迎注登录青橙账户</h1>
    <br><br>

    <form action="./com/logindo.php" method="post" class="form-horizontal col-md-7 h5 pull-right">

        <div class="form-group">
            <label for="user" class="col-md-4 control-label">用户名:</label>
            <div class="col-md-4 ">
                <input type="text" name="name" class="form-control input-lg" placeholder="请输入用户名..">
            </div>
        </div>

        <div class="form-group">
            <label for="pwd" class="col-md-4 control-label">密码:</label>
            <div class="col-md-4">
                <input type="password" name="pwd" class="form-control input-lg" id="pwd" placeholder="请输入密码..">
               
            </div>
        </div>

        

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="pull-left col-md-6">
                    <input type="text" name="vcode" class="form-control input-lg" placeholder="输入验证码">
                </div>
                <div >
                <img src="./com/yzm.php" title="点 我 刷 新" style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()">
                </div>
            </div>
        </div>
        

      <div class="form-group">
        <div class="col-md-offset-4 col-md-4">
          <button type="submit" class="btn col btn-lg btn-block">登录</button>
          <a href="./forget.php" class="pull-left">忘记密码?</a>
          <a href="./reg.php" class="pull-right">立即注册</a>
        </div>
      </div>

    </form>
    <div class="col-md-5 pull-left">
        <img src="./imgs/174252sm89jjgpfp8fo11s.jpg" class="center-block">
    </div>
</div><!-- END container -->

<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>
