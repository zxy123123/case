<?php
    header("content-type:text/html;charset=utf-8");
    require '../init.php';
    $id = $_GET['id'];

    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接又失败了!!');
    mysqli_set_charset($link,'utf8');

    $sql = "SELECT `id`,`name`,`tel`,`sex`,`email`,`logincount` FROM ".PRE."user WHERE `id`='$id'";
    $result = mysqli_query($link,$sql);
    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
    }
/*    echo '<pre>';
        print_r($row);
    echo '</pre>';
exit;*/


 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../public/admin.css">
    <link href="../public/css/7.css" rel="stylesheet">
</head>
<body class="bgc">
<div class="container">
    <div class="row">
    <div class="col-md-2 col-md-offset-5"><h2>编辑用户</h2></div></div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
    <form action="./action.php?a=edit" method="post">
        <!-- 隐藏域用于传递用户的ID 以便action页面知道是编辑谁 -->
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <div class="input-group">
        <div class="input-group-addon">商品名:</div>
        <input type="text" name="name" value="<?php echo $row['name'] ?>"  class="form-control" id="exampleInputAmount" placeholder="请输入用户名"></div></div>

        <label class="radio-inline">
        <input type="radio" name="sex" value="0" <?php echo $row['sex']==0?'checked':''; ?>>女</label>
        <label class="radio-inline">
        <input type="radio" name="sex" value="1" <?php echo $row['sex']==1?'checked':''; ?>>男</label>
        <label class="radio-inline">
        <input type="radio" name="sex" value="2" <?php echo $row['sex']==2?'checked':''; ?>>保密</label>

        <div class="form-group">
                        <div class="input-group">
         <div class="input-group-addon">tel:</div>
        <input type="text" name="tel" value="<?php echo $row['tel'] ?>"  class="form-control" id="exampleInputAmount" placeholder="请修改手机"></div></div>

        <div class="form-group">
                        <div class="input-group">
        <div class="input-group-addon">email:</div>
        <input type="text" name="email" value="<?php echo $row['email'] ?>"  class="form-control" id="exampleInputAmount" placeholder="请修改邮箱"></div></div>


        <center><button type="submit" class="mt10 btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;确认添加</span></button></center>
    </form>
    </div>
    </div>
    </div>

    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>