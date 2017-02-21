<!-- 注册 -->
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
    <link rel="stylesheet" href="./public/home.css">
    <link rel="stylesheet" href="./public/login.css">
</head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>

<div class="conatiner mt50 zt">
    <div class="clearfix mt50"></div>
    <h1 class="text-center mt50 col">欢迎注册青橙账户</h1>
    <br>

    <form action="./com/regdo.php" method="post" class="form-horizontal col-md-7 h5 pull-right">

        <div class="form-group">
            <label for="user" class="col-md-4 control-label">用户名:</label>
            <div class="col-md-4 ">
                <input type="text" name="name" class="form-control" id="user" placeholder="请输入用户名..">
                <span>* 以字母开头,长度4-16,允许字母数字下划线组成,不区分大小写</span>
            </div>
        </div>

        <div class="form-group">
            <label for="pwd" class="col-md-4 control-label">密码:</label>
            <div class="col-md-4">
                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="请输入密码..">
                <span>* 由4-32位组成</span>
            </div>
        </div>

        <div class="form-group">
            <label for="repwd" class="col-md-4 control-label">确认密码:</label>
            <div class="col-md-4">
                <input type="password" name="repwd" class="form-control" id="repwd" placeholder="再次确认密码">

            </div>
        </div>

        <div class="form-group">
            <label for="tel" class="col-md-4 control-label">手机:</label>
            <div class="col-md-4">
                <input type="text" name="tel" class="form-control" id="tel" placeholder="11位手机号">
                <span>* 请输入合法的手机号</span>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-4 control-label">邮箱:</label>
            <div class="col-md-4">
                <input type="email" name="email" class="form-control" id="email" placeholder="请输入邮箱">
                <span>* 请输入合法的邮箱</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="pull-left col-md-5">
                    <input type="text" name="vcode" class="form-control " placeholder="输入验证码">
                </div>
                <div >
                <img src="./com/yzm.php" title="点 我 刷 新" style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()">
                </div>
            </div>
        </div>
        

      <div class="form-group">
        <div class="col-md-offset-5 col-md-7">
          <button type="submit" class="btn col">注册</button>
          <button type="reset" class="btn col ">重置</button>
        </div>
      </div>

    </form>
    <div class="col-md-5 pull-left">
        <img src="./imgs/19.jpg" class="center-block">
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
