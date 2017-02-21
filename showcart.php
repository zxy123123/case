<!-- 购物车界面 -->
<?php
    require './init.php';
// p($_SESSION);
// exit;

    ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/1.png" type="image/png" >
    <title>我的购物车</title>
    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="./public/css/my.css">
</head>
<body >
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>


<div class="container">
    <div class="row">
        <h1>购物车</h1>
    </div>

    <div class="row">
        <?php if (empty($_SESSION['cart'])): ?>
            <img src="./imgs/20090114091725582.jpg">
            <h3>您的购物车还是空的,赶紧行动吧!</h3>
            <p><a href="./index.php">[继续购物]</a></p>
        <?php else: ?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>商品</th>
                    <th>商品名</th>
                    <th>单品价格</th>
                    <th>购买数量</th>
                    <th>小计</th>
                    <th>操作</th>
                </tr>
                <?php $total = 0; //总价的初始值?>
                <?php foreach ($_SESSION['cart'] as $key => $val): ?>
                <tr>
                    <td>
                        <a href="./contentinfo.php?id=<?php echo $key ?>&gname=<?php echo $val['gname'] ?>">
                            <img src="<?php echo getpath(URL.'uploads/',$val['iname'],'b') ?>">
                        </a>
                    </td>
                    <td>
                        <a href="./contentinfo.php?id=<?php echo $key ?>&gname=<?php echo $val['gname'] ?>">
                            <?php echo $val['gname'] ?>
                        </a>
                    </td>
                    <td><span class="glyphicon glyphicon-usd"><?php echo $val['price'] ?></span></td>
                    <td>
                        <a href="./com/cartdo.php?a=jian&goods_id=<?php echo $key ?>&qty=<?php echo $val['qty'] ?>">
                            <span class="glyphicon glyphicon-minus btn-sm btn-primary"></span>
                        </a>
                        [ <?php echo $val['qty'] ?> ]
                        <a href="./com/cartdo.php?a=jia&goods_id=<?php echo $key ?>&qty=<?php echo $val['qty'] ?>">
                            <span class="glyphicon glyphicon-plus btn-sm btn-primary"></span>
                        </a>
                        
                    </td>
                    <td><span class="glyphicon glyphicon-usd"></span><?php echo $val['price'] * $val['qty'] ?></td>
                    <td>
                        <a href="./com/cartdo.php?a=del&goods_id=<?php echo $key ?>">删除</a>
                    </td>
                </tr>
                <?php $total += $val['price'] * $val['qty'];//总价 ?>
                <?php endforeach ?>
                <tr>
                    <td colspan="6" class="text-right">
                        <a href="./index.php" class="btn btn-warning"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;继续购物</a>
                        <a href="./com/cartdo.php?a=alldel" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;清空购物车</a>
                        <a href="" class="btn btn-success">总计: <span class="glyphicon glyphicon-usd"></span><?php echo $total ?></a>
                        <a href="./dingdan.php" class="btn btn-primary">立即结算</a>
                    </td>
                </tr>
            </table>
        <?php endif ?>
    </div>
</div>

<!--  unset($_SESSION['cart']);
 exit; -->
 
<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>