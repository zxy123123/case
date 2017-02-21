<?php
require './init.php';

// p($_SESSION);
// exit;
// ./imgs/u=995910554,336571511&fm=21&gp=0.jpg

$id = $_SESSION['home']['id'];
$sql = "SELECT `name`,`email`,`tel`,`head` FROM ".PRE."user WHERE `id` = '$id'";

$result = mysqli_query($link,$sql);

$list = mysqli_fetch_all($result,MYSQLI_ASSOC);
$list = $list['0'];
$head = $list['head'];
// p($list);
// exit;

if(empty($head)){
    $file = './imgs/u=995910554,336571511&fm=21&gp=0.jpg';
}else{
    $file = getpath(URL . 'uploads/', $head, 'c');
}
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
<div class="col-md-2 col-md-offset-2"><h2 style="color:black;">修改头像</h2></div>
        </div><br>
         <div class="col-md-2"> <img src="<?php echo $file?>" class="img-thumbnail"></div>

          <form action="./headdo.php?a=head" method="post" enctype="multipart/form-data">

            <div class="form-group col-md-5">
        <div class="form-group has-warning has-feedback">
                    <div class="input-group">
                    <div class="input-group-addon">修改头像</div>
            <input type="file" name="file" class="form-control">

</div>
</div>

<center><button type="submit" class="mt10 btn btn-warning"><span class="glyphicon glyphicon-ok">&nbsp;确认修改</span></button></center>
