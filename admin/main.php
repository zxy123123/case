<?php require './init.php'; 



$sql = "SELECT `ordernum`,`user_name`,`say`,`goods_id`,`order_id` FROM s47_discuss";

$row = query($link,$sql);
// p($row);
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
    <link rel="stylesheet" href="./public/admin.css">
</head>
<body>
<div class="container-fluid bgc mt20">

    <div class="row">
        <h1 class="col-md-12 zt">青橙后台管理系统</h1>
        <p class="col-md-12">
            <a href="./user/index.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus">&nbsp;添加用户</span></a>
            <a href="./goods/add.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign">&nbsp;添加商品</span></a>
            <a href="./goods/index.php" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open">&nbsp;查看商品</span></a>
            <a href="./order/index.php" class="btn btn-primary"><span class="glyphicon glyphicon-duplicate">&nbsp;处理订单</span></a>
            <!-- <a href="http://www.baidu.com" class="btn btn-primary">我要百度</a> -->
        </p>
    </div>

        <div class="row">
        <div class=" col-md-8">
            <div class="panel panel-primary mt20">
<table class="table table-bordered table-hover">
    <tr>
    <th>订单编号</th>
      <th>客户</th>
      <th>评论内容</th>
      <th>操作</th>
    </tr>

<?php if (empty($row)): ?>
  <tr>
    <td colspan="3"><h3 class="text-center">暂无数据</h3>
    </td>
  </tr>
  
<?php else: ?>
  
<?php foreach ($row  as $val): ?>
  <tr>
  <td><?php echo $val['ordernum']?></td>
  <td><?php echo $val['user_name']?></td>
  <td><?php echo $val['say']?></td>
  <td><a href="./huifu.php?on=<?php echo $val['ordernum']?>&gid=<?php echo $val['goods_id']?>&say=<?php echo $val['say']?>&od=<?php echo $val['order_id']?>" class="btn btn-primary"><span class="glyphicon glyphicon-option-horizontal">&nbsp;回复</span></a></td>

  </tr>
<?php endforeach ?>
<?php endif ?>
</table>










<!--     <div class="row">
        <div class=" col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading"><span class="glyphicon glyphicon-ice-lolly">&nbsp;最新订单</span></div>
              <div class="panel-body">
                Panel content
              </div>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading"><span class="glyphicon glyphicon-piggy-bank">&nbsp;订单统计</span></div>
              <div class="panel-body">
                GD
              </div>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading"><span class="glyphicon glyphicon-tree-deciduous">&nbsp;商城统计</span></div>
              <div class="panel-body">
                Panel content
              </div>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">Panel heading without title</div>
              <div class="panel-body">
                Panel content
              </div>
            </div>
        </div> -->

        
    </div><!-- END row -->
</div><!-- END container -->



<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>