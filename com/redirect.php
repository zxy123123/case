<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../imgs/1.png" type="image/png">
    <meta http-equiv="refresh" content="<?php echo $t ?>;url=<?php echo $url ?>">
    <title>跳转页面</title>

    <!-- Bootstrap -->
    <link href="../public/css/7.css" rel="stylesheet">

</head>
<body>

<div class="container mt50">
    <div class="jumbotron mt50">
        <h1><?php echo $msg ?></h1>
        <p>页面将在 <?php echo $t ?> 秒后跳转到:</p>
        <p><?php echo $url ?></p>
        <a class="btn btn-primary btn-lg" href="<?php echo $url ?>">立即跳转</a>
    </div>
</div>


</body>
</html>