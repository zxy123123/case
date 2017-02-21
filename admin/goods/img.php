<?php 
    require '../init.php';
    //接收商品的ID
    $goods_id = $_GET['goods_id'];
    //查询当前商品的名字
    $sql = "SELECT gname FROM ".PRE."goods WHERE id='$goods_id'";
    $gname = query($link,$sql);
    $gname = $gname[0]['gname'];

    //查询当前商品的图片
    $sql = "SELECT `id`,`iname`,`cover` FROM ".PRE."image WHERE goods_id='$goods_id'";
    $list = query($link,$sql);
    // p($list);exit;
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
<body>
<div class="container">
    <div class="row">
        <h2>商品图片管理 
        <small class="text-primary">您正在编辑的是:《<?php echo $gname ?>》</small>
        </h2>
        <form action="./action.php?a=add_img" method="post" enctype="multipart/form-data" class="form-inline">
            <input type="hidden" name="goods_id" value="<?php echo $goods_id ?>">
            <input type="file" name="file" class="form-control">
            <button type="submit" class="btn btn-primary">添加图片</button>
        </form>

        <div class="row mt10">
            <?php if (!empty($list)): ?>
            <?php foreach ($list as $val): ?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo getpath(ADMIN_URL.'../uploads/',$val['iname'],'c') ?>">
                    <div class="caption">
                        <h4>
                            ID:<?php echo $val['id'] ?>
                            <?php echo $val['cover']?'<label class="label label-primary">是封面</label>':'<label class="label label-danger">非封面</label>'; ?>
                        </h4>
                        <p>
                            <a href="./action.php?a=cover&goods_id=<?php echo $goods_id ?>&image_id=<?php echo $val['id'] ?>" class="btn btn-primary">设封面</a>
                            <a href="./action.php?a=del_img&id=<?php echo $val['id'] ?>" class="btn btn-danger">删除</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>
        </div>
    
    </div>
</div>


    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

        

