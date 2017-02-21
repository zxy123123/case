<?php
 require '../init.php';
// var_dump($_GET);
// exit;
$ordernum = $_GET['ordernum'];

// var_dump($ordernum);

$sql = "
        SELECT i.iname,g.gname,og.qty,g.price,o.ordernum,o.status,o.id oid,g.id gid
        FROM s47_order o,s47_ordergoods og,s47_goods g,s47_image i
        WHERE og.order_id = o.id AND og.goods_id = g.id AND i.goods_id = g.id AND i.cover = 1 AND o.ordernum = '{$ordernum}'";

// echo $sql;
 $aa = query($link,$sql);

//  var_dump($aa);
// exit;
?>


<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cate-list</title>

<link href="../public/css/7.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
            <h2 pull-left>订单详情</h2>
<br>
<table class="table table-bordered table-hover h4">
    <tr>
    <th class="col-md-1">商品图片</th>
    <th class="col-md-1">商品名</th>
    <th class="col-md-1">数量</th>
    <th class="col-md-1">价格</th>
    <th class="col-md-1">合计</th>
    <th class="col-md-1">确认收货</th>
    </tr>

<?php foreach ($aa as $val): ?>
    <?php
    switch($val['status']){
        case '0':
            $a = '未发货';
            break;
        case '1':
            $a = '已发货';
            break;
        case '2':
            $a = '已完成';
            break;
        case '3':
            $a = '已失效';
            break;
    }
?>
<caption>订单号:<?php echo $val['ordernum']?>&nbsp;状态:<?php echo $a ?></caption>
    <tr>
    <td><img src="<?php echo getpath(URL.'uploads/', $val['iname'],'b')?>"></td>
    <td><?php echo $val['gname'] ?></td>
    <td><?php echo $val['qty'] ?></td>
    <td><?php echo $val['price'] ?></td>
    <td><?php echo $val['price']*$val['qty'] ?></td>
    <td><a href="./queshou.php?a=<?php echo $val['status']?>&id=<?php echo $val['oid']?>" class="btn btn-warning btn-blank">好的</a>
    <a href="./pinglun.php?on=<?php echo $val['ordernum']?>&gid=<?php echo $val['gid']?>&od=<?php echo $val['oid']?>" class="btn btn-warning btn-blank">立即评价</a>
    </td>

<?php endforeach ?>
</table>





