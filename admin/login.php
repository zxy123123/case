<!-- 登录页面 -->

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/1.png" type="image/png">
    <title>用户登录</title>
    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/admin.css">
</head>
<body class="adminlogin">

<div class="conatiner mt50">
    <div class="clearfix mt50"></div>
    <h1 class="text-center mt50 zt">后 台 登 录</h1>
    <hr>

    <form action="./logindo.php" method="post" class="form-horizontal col-md-4 col-md-offset-4">

        <div class="form-group">
            <div class="col-md-12">
                <input type="text" name="name" class="form-control input-lg" placeholder="请输入用户名..">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <input type="password" name="pwd" class="form-control input-lg" placeholder="请输入密码">
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-12">
                <div class="pull-left">
                    <input type="text" name="vcode" class="form-control" placeholder="验证码">
                </div>
                <div class="pull-right">
                <img src="../com/yzm.php" title="点 我 刷 新" style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()" class="pull-right">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
              <a href="../index.php" class="pull-right">返回首页</a>
            </div>
        </div>

    </form>
</div><!-- END container -->


<!-- 引入尾部 -->
<?php require '../com/footer.php'; ?>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>