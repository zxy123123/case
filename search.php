<?php 
    //按分类形式生成的二级页
    require './init.php';
    $search = $_GET['s'];


    //按分类ID去查询商品数据
    $sql = "
    SELECT i.iname, g.gname, g.id, g.price, g.zan
    FROM ".PRE."goods g, ".PRE."image i
    WHERE g.id = i.goods_id AND i.cover=1 AND g.state=1 AND g.gname LIKE '%$search%'";
    $list = query($link, $sql);
   /* p($list);exit;*/
    ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/1.png" type="image/png" >
    <title>青橙产品</title>
    <!-- Bootstrap -->
    <link href="./public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/css/my.css">
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="./public/css/zxsc.css">
</head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>

<div>
        <a href="./nb404.php"><img src="./imgs/t32.jpg"></a>
    </div>
<div class="container">
    <div class="row">
        <?php $qfd = 0;?><!-- 清浮动 -->
        <?php if (empty($list)): ?>
        <h2>暂无数据</h2>
        <?php else: ?>
        <?php foreach ($list as $key => $val): ?>
        <div class="col-md-4">
          <div class="thumbnail s1 ">
            <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
                <img src="<?php echo getpath(URL.'uploads/',$val['iname'],'c') ?>">
            </a>
            <div class="caption ">
                <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
                    <h4><?php echo $val['gname'] ?></h4>
                </a>  
              <h3 >
                <span class="glyphicon glyphicon-usd"></span>
                <?php echo $val['price'] ?>
            <!-- 这里原来是右飘点赞的功能,因为点进去已有,所以取消 -->
                <br><br><a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" class="btn btn-success btn-block" target="_blank"><span class="glyphicon glyphicon-leaf">&nbsp;查看详情</span></a>
                
              </h3>
            </div>

          </div>
        </div>
        <?php $qfd++;echo $qfd%3==0?'<div class="clear"></div>':''; ?><!-- 每三个图片清一次浮动 -->
        <?php endforeach ?>
        <?php endif ?>

    </div><!-- END row -->
</div><!-- END container -->

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


