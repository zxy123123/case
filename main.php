<?php require './init.php'; 

/*p($_SESSION);
exit;*/

$id = $_SESSION['home']['id'];
$sql = "SELECT `name`,`email`,`tel`,`head` FROM ".PRE."user WHERE `id` = '$id'";

$result = mysqli_query($link,$sql);

$list = mysqli_fetch_all($result,MYSQLI_ASSOC);
$list = $list['0'];
$head = $list['head'];


if(empty($head)){
    $file = './imgs/u=995910554,336571511&fm=21&gp=0.jpg';
}else{
    $file = getpath(URL . 'uploads/', $head, 'c');
}
// echo $file;

/*p($list);
exit;*/

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
<div class="col-md-2 col-md-offset-3"><h2 style="color:black;">账户信息</h2></div>
        </div><br>
        
            <div class="row">
                <div class="col-md-2"> <img src="<?php echo $file?>"  class="img-thumbnail"></div>
                <div class="col-md-6 col-md-offset-1">
                    <form action="./action.php" method="post">
                        <div class="form-group">
                        <div class="form-group has-warning has-feedback">
                    <div class="input-group">
                          <div class="input-group-addon">用户名:</div>
                          <input type="text" name="name" class="form-control" id="exampleInputAmount" value="<?php echo $list['name']?>" readonly="readonly">
                    </div>
                </div>
        <div class="form-group">
        <div class="form-group has-warning has-feedback">
                    <div class="input-group">
                          <div class="input-group-addon">E-mail&nbsp;</div>
                          <input type="text" name="email" value="<?php echo $list['email']?>"class="form-control" id="exampleInputAmount" readonly="readonly">
                    </div>
                </div>
        <div class="form-group">
        <div class="form-group has-warning has-feedback">
                    <div class="input-group">
                          <div class="input-group-addon">手机号</div>
                          <input type="text" name="tel" class="form-control" id="exampleInputAmount" value="<?php echo $list['tel'] ?>" readonly="readonly">
                    </div>
            </div>
            </div>
</div>
</div>

</div><!-- END row -->
</div><!-- END container -->



<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>