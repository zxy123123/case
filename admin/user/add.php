<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user-list</title>

    <link href="../public/css/7.css" rel="stylesheet">
     <link rel="stylesheet" href="../public/admin.css">
      <title>Document</title>
</head>
<body class="bgc">
<div class="container">
<div class="row">
<div class="col-md-2 col-md-offset-5"><h2 style="color:black;">添加用户</h2></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
    <!-- <h2>添加用户</h2> -->

    <form action="./action.php?a=add" method="post">
    <div class="form-group">
                    <div class="input-group">
                          <div class="input-group-addon">用户名</div>
                          <input type="text" name="name" class="form-control" id="exampleInputAmount" placeholder="请输入用户名">
                    </div>
                </div>
        
        <div class="form-group">
                    <div class="input-group">
                          <div class="input-group-addon"> 密码&nbsp;</div>
                          <input type="password" name="pwd" class="form-control" id="exampleInputAmount" placeholder="请输入密码">
                        </div>
                </div>
       
        <div class="form-group">
                    <div class="input-group">
                          <div class="input-group-addon">手机号</div>
                          <input type="text" name="tel" class="form-control" id="exampleInputAmount" placeholder="请输入手机号">
                        </div>
                </div>
        <!-- 性别:
        <input type="radio" name="sex" value="0">女
        <input type="radio" name="sex" value="1" checked>男
        <input type="radio" name="sex" value="2">保密<br><br> -->

        <div class="form-group">
                    <div class="input-group">
                          <div class="input-group-addon">邮箱</div>
                          <input type="text" name="email" class="form-control" id="exampleInputAmount" placeholder="请输入邮箱">
                        </div>
                </div>
        
        <center><button type="submit" class="mt10 btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;确认添加</span></button></center>
        
    </form>

    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>