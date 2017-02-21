<?php
require './init.php';

// p($_SESSION);
// exit;
// ./imgs/u=995910554,336571511&fm=21&gp=0.jpg

$id = $_SESSION['home']['id'];
$sql = "SELECT `name`,`email`,`tel`,`sex` FROM ".PRE."user WHERE `id` = '$id'";

$result = mysqli_query($link,$sql);

$list = mysqli_fetch_all($result,MYSQLI_ASSOC);
$list = $list['0'];

// p($list);
// exit;
?>


<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/1.png" type="image/png">
    <title>main</title>

    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
     <!-- <div class="form-group has-warning has-feedback"> -->
    <link rel="stylesheet" href="./public/home.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-2 col-md-offset-5"><h2 style="color:black;">修改信息</h2>
</div>
</div><br>
<div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="./action.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <div class="form-group has-warning has-feedback">
                <div class="input-group">
                          <div class="input-group-addon">用户名:</div>
                            <input type="text" name="name" class="form-control" id="exampleInputAmount" value="<?php echo $list['name']?>" placeholder="请修改用户名">
                </div>
                    </div>
        
                <div class="form-group">
                <div class="form-group has-warning has-feedback">
                        <div class="input-group">
                            <div class="input-group-addon">E-mail&nbsp;</div>
                                <input type="text" name="email" value="<?php echo $list['email']?>"class="form-control" id="exampleInputAmount" placeholder="请修改邮箱">
                        </div>
                </div>
       
                <div class="form-group">
                    <div class="form-group has-warning has-feedback">
                        <div class="input-group">
                            <div class="input-group-addon">手机号</div>
                            <input type="text" name="tel" class="form-control" id="exampleInputAmount" value="<?php echo $list['tel'] ?>" placeholder="请修改手机号">
                        </div>
                    </div>
                </div>

            <div class="form-group">
                <div class="form-group has-warning has-feedback">
                    <div class="input-group pull-left">
                        <div class="input-group-addon">性别:</div>
                        <input type="radio" name="sex" value="0" <?php echo $list['sex']==0?'checked':''; ?>>女</label>
                        <input type="radio" name="sex" value="1" <?php echo $list['sex']==1?'checked':''; ?>>男</label>
                        <input type="radio" name="sex" value="2" <?php echo $list['sex']==2?'checked':''; ?>>保密</label>
                    </div>
                </div>
            </div>
        <center><button type="submit" class="mt10 btn btn-warning"><span class="glyphicon glyphicon-ok">&nbsp;确认修改</span></button></center>
</form>
</div><!-- END row -->
</div><!-- END container -->

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>



