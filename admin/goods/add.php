<?php 
    require '../init.php';
    //CONCAT(`path`,`id`,',')  0,1,  mysql的拼接函数
    $sql = "SELECT `id`,`cname`,`path`,CONCAT(`path`,`id`,',') AS bpath FROM ".PRE."category order by bpath";
    $cate = query($link, $sql);
    // p($cate);exit;
 ?>


 <!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap -->
    <link rel="icon" href="../../imgs/22.jpg" type="image/jpg" sizes="16x16">
   
    <link rel="stylesheet" href="../public/admin.css">
    <link href="../public/css/7.css" rel="stylesheet">
    <title>添加商品</title>
</head>
<body class="bgc" >

<div class="container">
    <div class="row">
        <div class="col-md-2 col-md-offset-5"><h2>添加商品</h2></div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="./action.php?a=add" method="post" enctype="multipart/form-data"> 
        
            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">商品名:</div>
                  <input type="text" name="gname" class="form-control" id="exampleInputAmount" placeholder="请输入商品名">
                </div>
            </div>

                        
                    <div class="form-group">
                        <div class="input-group">
                        <div class="input-group-addon">商品分类:</div>
                        <select name="cate_id" class="form-control" id="exampleInputAmount">
                            <?php if (!empty($cate)): ?>
                            <?php foreach ($cate as $val): ?>
                            <option value="<?php echo $val['id'] ?>"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',substr_count($val['path'],',')).'|----'.$val['cname'] ?></option>
                            <?php endforeach ?>
                            <?php else: ?>
                            <?php endif ?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                        <div class="input-group-addon">价格:</div>
                        <input type="text" name="price" class="form-control" id="exampleInputAmount" placeholder="请输入价格">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">库存</div>
                            <input type="text" name="stock" class="form-control" id="exampleInputAmount" placeholder="请输入库存">
                        </div>
                    </div>

                    <label class="radio-inline">
                      <input type="radio" name="state" id="inlineRadio1" value="1" checked> 上架
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="state" id="inlineRadio2" value="0" > 下架
                    </label>

                    <input type="file" name="file" class="mt10">

                    <textarea class="form-control mt10" name="msg" rows="3" placeholder="请输入商品描述"></textarea>

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





