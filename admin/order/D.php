<?php
	require '../init.php';
	$where = "where `status`='3'";
    $urlname = '';
    $name = '';
	
	if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $where = "WHERE `ordernum` LIKE '%$name%'";//SQL查询条件
        $urlname = "&name=$name";//url的参数
    }

        $sql = "
        SELECT i.iname,g.gname,o.oname,o.address,o.phone,o.allprice,og.price,og.qty,o.ordernum,o.status
        FROM ".PRE."order o,".PRE."ordergoods og,".PRE."image i,".PRE."goods g
        WHERE og.order_id = o.id AND og.goods_id = g.id AND i.goods_id = g.id AND i.cover = 1 AND g.state=1 
        ";
        $list = query($link ,$sql);
    //p($list);

        $sql = "SELECT count(*) total FROM s47_order $where ";
        
        $row = query($link, $sql);
        $total = $row[0]['total'];
    
        $num = 2;
    
        $allpage = ceil($total / $num);
        $page = isset($_GET['page'])?(int)$_GET['page']:1;
        
        $page = max(1,$page);
        $page = min($page,$allpage);
    
        $offset = ($page-1) * $num;

        $prev = $page - 1;
        $next = $page + 1;

        $start = max($page - 2, 1);
        $end = min($page + 2, $allpage);

        $pageurl = 'D.php';
        
        $num_link = '';
        for ($i = $start; $i <= $end; $i++) {
        if ($page == $i) {
             $num_link .= '<li class="active"><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
            continue;
            }
            $num_link .= '<li><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
            }
            
            $sql2 = "select `ordernum`,`allprice`,`id`,`status` from ".PRE."order $where  LIMIT $offset,$num";
            $row = query($link,$sql2);
            $rows = mysqli_affected_rows($link);
    //p($row);
?>

<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ysx</title>
    <!-- Bootstrap -->
    <link href="../../public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="../public/admin.css">

</head>
<body class="bgc">
<div class="container">
    <div class="row">
            <h2 pull-left>已失效</h2>
            <a href="./A.php?a=aaa" class="btn btn-primary btn-sm mt10">未发货</a>
            <a href="./B.php?a=bbb" class="btn btn-primary btn-sm mt10">已发货</a>
            <a href="./C.php?a=ccc" class="btn btn-primary btn-sm mt10">已完成</a>
            <a href="./D.php?a=ddd" class="btn btn-primary btn-sm mt10">已失效</a>
        <form class="navbar-form navbar-left pull-right" >
        <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="按订单号搜索">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
        <?php if(!empty($row)):?>
        <?php  foreach ($row as $val): ?>
        <table class="table-bordered center-b mt20" width="1000">
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
            <caption>订单号 : <?php echo $val['ordernum']?> 总价 : <?php echo $val['allprice']?> 订单状态 : <?php echo $a ?></caption>
    
            <tr>
                    <th>商品图片</th>
                    <th>商品详情</th>
                    <th width="50px">收货人</th>
                    <th>收获地址</th>
                    <th>联系电话</th>
                    <th width="50px">数量</th>
                    <th>价格</th>
                    <th>合计</th>
            </tr>
                    <?php  
                            foreach ($list as $vau){ 
                                    if($vau['ordernum'] == $val['ordernum']){
                                        echo'<tr>';
                                            echo'<td><img src="'.getpath(ADMIN_URL.'../uploads/',$vau['iname'],'b').'"></td>';
                                            echo'<td>'.$vau['gname'].'</td>';
                                            echo'<td>'.$vau['oname'].'</td>';
                                            echo'<td>'.$vau['address'].'</td>';
                                            echo'<td>'.$vau['phone'].'</td>';
                                            echo'<td>'.$vau['qty'].'</td>';
                                            echo'<td>'.$vau['price'].'</td>';
                                            echo'<td>'.($vau['price']*$vau['qty']).'</td>';
                                        echo'</tr>';
                                        }
                                }
                        ?>
        </table>

        <br><br>
        <?php endforeach ?>
        <?php else:?>
                <h3>暂无订单信息</h3>
        <?php endif?>
        <?php require ADMIN_PATH.'../com/page.php'; ?>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>