<?php
    require '../init.php';

  

    //设置搜索条件
    $where = '';
    $name = '';
    $urlname = '';
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $where = "WHERE `ordernum` LIKE '%$name%'"; //按订单号查找的SQL条件
        $urlname = "&name=$name";//url传参的参数
    }

$sql = "
        SELECT i.iname,g.gname,o.oname,o.address,o.phone,o.allprice,og.price,og.qty,o.ordernum,o.status
        FROM ".PRE."order o,".PRE."ordergoods og,".PRE."image i,".PRE."goods g
        WHERE og.order_id = o.id AND og.goods_id = g.id AND i.goods_id = g.id AND i.cover = 1 AND g.state=1"; 

 $list = query($link,$sql);

 // p($list);
 // exit;


    //查询所有商品数量(总记录数)
    $sql = "SELECT count(*) total FROM ".PRE."order $where";

    $row = query($link,$sql);
    $total = $row[0]['total'];
    
    //定义每一页显示的数量
    $num = 2;
    //总页数
    $allpage = ceil($total / $num);

    //判断 并取得页码 页码数
    $page = isset($_GET['page'])?(int)$_GET['page']:1;
    //限制页码范围,不能小于1 不能大于$allpage
    $page = max(1,$page);
    $page = min($page,$allpage);//[接收的页数,总页数]

   //查询偏移量
    $offset = ($page-1) * $num;

    //上一页 下一页
    $prev = $page - 1;
    $next = $page + 1;

    //控制分页显示数
    $start = max(1, $page - 2);
    $end = min($page + 2 , $allpage);

      //定义分页的跳转路径
    $pageurl = './index.php';
    
    //产生分页数字链接
    $num_link = '';
    for ($i = $start; $i <= $end; $i++) {
        if ($page == $i) {
            $num_link .= '<li class="active"><a href="'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
            continue;
        }
        $num_link .= '<li><a href="'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
    }
    $sql2 = "select `ordernum`,`allprice`,`id`,`status` from ".PRE."order $where  LIMIT $offset,$num";
$row = query($link,$sql2);
     $rows = mysqli_affected_rows($link);
/*    mysqli_close($link);*/

?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cate-list</title>

    <!-- Bootstrap -->
    <link href="../public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../public/js/html5shiv.min.js"></script>
    <script src="../public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../public/admin.css">
</head>
<body class="bgc">
<div class="container">
    <div class="row">
            <h2 pull-left>订单管理</h2>
                <a href="./A.php?a=aaa" class="btn btn-primary btn-sm mt10">未发货</a>
                <a href="./B.php?a=bbb" class="btn btn-primary btn-sm mt10">已发货</a>
                <a href="./C.php?a=ccc" class="btn btn-primary btn-sm mt10">已完成</a>
                <a href="./D.php?a=ddd" class="btn btn-primary btn-sm mt10">已失效</a>
<form class="navbar-form navbar-left pull-right" >
              <div class="form-group">

            <input type="text" name="name" class="form-control" placeholder="按订单号搜索">
        </div>
            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span></button>
    </form>
    <body>
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
            <th class="col-md-2">商品图片</th>
            <th class="col-md-1">商品名</th>
            <th class="col-md-1">收货人</th>
            <th class="col-md-2">收货地址</th>
            <th class="col-md-1">电话</th>
            <th class="col-md-1">数量</th>
            <th class="col-md-1">价格</th>
            <th class="col-md-1">合计</th>
            <th class="col-md-2">修改订单状态</th>
        </tr>
        <?php  
            foreach ($list as $lue){ 
                if($lue['ordernum'] == $val['ordernum']){   
                    echo'<tr>';
                    echo '<td><img src="'.getpath(ADMIN_URL.'../uploads/',$lue['iname'],'b').'"></td>';
                    echo '<td>'.$lue['gname'].'</td>';
                    echo '<td>'.$lue['oname'].'</td>';
                    echo '<td>'.$lue['address'].'</td>';
                    echo '<td>'.$lue['phone'].'</td>';
                    echo '<td>'.$lue['qty'].'</td>';
                    echo '<td>'.$lue['price'].'</td>';
                    echo '<td>'.($lue['price']*$lue['qty']).'</td>';
                    echo '<td><a href="./fahuo.php?a='. $val['status'].'&id='.$val['id'].'" class="btn btn-primary ">立即发货</a>
                                    <a href="./shouhuo.php?a='.$val['status'].'&id='.$val['id'].'" class="btn btn-primary ">强制收货</a>
                                    <a href="./chexiao.php?a='.$val['status'].'&id='.$val['id'].'" class="btn btn-primary btn-block ">撤消订单</a>
                    </td>';
                  echo '</tr>';
                }
            }
        ?>
    </table>

            <?php endforeach ?>
            <?php else:?>
            <h3>暂无订单信息</h3>
            <?php endif?>
            <?php require ADMIN_PATH.'../com/page.php'; ?>



    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

        

