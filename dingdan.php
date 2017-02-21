<?php
    require './init.php' ;
?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/1.png" type="image/png" >
    <title>结算</title>
    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <link href="./public/global_71f64cd.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="./public/css/my.css">
</head>
<body >
<!-- 引入导航条 -->


<?php
if(isset($_SESSION['home']["name"])){
   }else{
   redirect('请先登录','login.php',3);
   exit;
   }// exit;

// p($_SESSION);
// exit;
foreach ($_SESSION['cart'] as $key => $val) {
        $sql = "SELECT `stock` FROM s47_goods WHERE `id`='$key'";
        $hh = query($link,$sql);
        // p($hh);
        // p($val['qty']);46
        $idd = $val['id'];
        // p($idd);
        // exit;
        $sql = "SELECT `state` FROM s47_goods WHERE `id`='$idd'";
        $bbb = query($link,$sql);
        $bbb = $bbb['0']['state'];

        if ($bbb == 0){
        redirect('此商品已下架',URL.'./zxsc.php');
        exit;
}

        $hh = $hh['0']['stock'];
        // p($hh);
        if($hh < $val['qty']){
        redirect('库存不足');
        exit;
}
}

?>

   <div class="container">
        <div class="row mt20">
            <div class="form-group"><span class="label label-success">填写订单信息</span></div>
        </div>
    <div class="row">
        <div class="col-md-4 ">
            <form action="./com/order.php" method="post">
                <div class="form-group has-success ">
                    <div class="input-group">
                        <div class="input-group-addon">收货人</div>
                                <input type="text" name="oname"  class="form-control" id="exampleInputAmount" placeholder="请输入收货人姓名">
                    </div>
                </div>


                <div class="form-group">
                    <div class="input-group has-success">
                          <div class="input-group-addon">收货地址</div>
                          <input type="text" name="address" class="form-control" id="exampleInputAmount" placeholder="请输入详细地址">
                        </div>
                </div>
   
                    <div class="form-group">
                    <div class="input-group has-success">
                          <div class="input-group-addon">联系电话</div>
                          <input type="text" name="tel" class="form-control" id="exampleInputAmount" placeholder="请输入手机号">
                        </div>
                </div>

                    <center><button type="reset" name="reset" class="mt10 btn btn-success"><span class="glyphicon glyphicon-ok">重填</span></button></center>
 


            <div class="container">

            <div class="row action">
                    <h1 class="module-title"></h1>
            <div class="row mt20">
        <?php if (empty($_SESSION['cart'])): ?>
            <h3>还没有订单</h3>
            <p><a href="./index.php">[继续购物]</a></p>
        <?php else: ?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>商品</th>
                    <th>商品名</th>
                    <th>单品价格</th>
                    <th>购买数量</th>
                    <th>小计</th>
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
                        </a>
                         <?php echo $val['qty'] ?> 
                    </td>
                    <td><span class="glyphicon glyphicon-usd"></span><?php echo $val['price'] * $val['qty'] ?></td>
                    
                </tr>
                <?php $total += $val['price'] * $val['qty'];//总价 ?>
                <?php endforeach ?>
                <tr>
                    <td colspan="6" class="text-right">
                        <a href="" class="btn btn-success">总计: <span class="glyphicon glyphicon-usd"></span><?php echo $total ?></a>
                        <input type="submit" name="submit" value="提交订单"class="btn btn-primary">
                    </td>
                </tr>
            </table>
        <?php endif ?>
    </div>
</div>
</form>

<!-- 引入回顶部 -->
<?php require PATH.'com/gotop.php';?>
<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>