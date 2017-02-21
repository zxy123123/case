<?php 
    require '../init.php';
    //直接产生PID
    //为空默认为0,不为空就是传值
    $pid = empty($_GET['pid'])?0:$_GET['pid'];
    //直接产生PATH
    //为空默认为0,  不为空就是传值 拼接pid 和一个逗号
    $path = empty($_GET['path'])?'0,':$_GET['path'].$pid.',';

 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<link href="../public/css/7.css" rel="stylesheet">
<link rel="stylesheet" href="../public/admin.css">
<body class="bgc">
<div class="container">
 <div class="row">
    <div class=" col-md-2 col-md-offset-4"><h2>添加分类</h2></div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
    <form action="./action.php?a=add" method="post" class="form-inline">
        <div class="form-group">
        <div class="input-group">
        <div class="input-group-addon">分类名:</div>
        <input type="text" class="form-control" id="exampleInputAmount" name="cname" placeholder="请输入分类名">
        </div>
        </div>

        <input type="hidden" name="pid" value="<?php echo $pid ?>" readonly>
        <input type="hidden" name="path" value="<?php echo $path ?>" readonly>

    
    <button type="submit" class="mt10 btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;确认添加</span></button>
       <!--  <input type="submit" value="确认添加"> -->
    </form>

    <!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>

