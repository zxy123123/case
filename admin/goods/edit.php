   <?php 
    require '../init.php';
    //CONCAT(`path`,`id`,',')  0,1,  mysql的拼接函数
    $id = $_GET['id'];
    $sql = "SELECT * FROM ".PRE."goods WHERE `id`='$id'";
    $result = mysqli_query($link,$sql);
    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
    }
$sql2 = "SELECT `id`,`cname`,`path`,CONCAT(`path`,`id`,',') AS bpath FROM ".PRE."category order by bpath";
$cate = query($link, $sql2);
/*p($row);exit;*/
   /* $sql1= "SELECT `id`,`cname`,`path`,CONCAT(`path`,`id`,',') AS bpath FROM ".PRE."category order by bpath";
    $cate = query($link, $sql1);*/

  /* p($cate);exit;*/
 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="../public/css/7.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/admin.css">
</head>
<body class="bgc">
<div class="container">
    <div class="row">
    <div class="col-md-2 col-md-offset-5"><h2>编辑商品</h2></div>
    </div>
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <form action="./action.php?a=edit" method="post">

    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    <div class="form-group">
     <div class="input-group">
        <div class="input-group-addon">商品名:</div>
        <input type="text" name="gname" class="form-control" id="exampleInputAmount" value="<?php echo $row['gname'] ?>" placeholder="请输入商品名"></div></div>

        <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon">商品分类:</div>
        <select name="cate_id" class="form-control" id="exampleInputAmount">
            <?php if (!empty($cate)): ?>
            <?php foreach ($cate as $val): ?>
           <option value="<?php echo $val['id'] ?>"<?php echo $val['id'] == $row['cate_id']? 'selected':''; ?>><?php echo str_repeat('&nbsp;&nbsp;&nbsp;',substr_count($val['path'],',')).'|----'.$val['cname'] ?></option>
            <?php endforeach ?>
            <?php else: ?>                
            <?php endif ?>
        </select>
        </div>
        </div>
  
        <div class="form-group">
         <div class="input-group">
        <div class="input-group-addon">价格:</div>
        <input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control" id="exampleInputAmount" placeholder="价格">
        </div>
        </div>
        <div class="form-group">
          <div class="input-group">
        <div class="input-group-addon">库存</div>
        <input type="text" name="stock" value="<?php echo $row['stock'] ?>"  class="form-control" id="exampleInputAmount"  placeholder="库存">
        </div>
        </div>
        <label class="radio-inline">
        <input type="radio" name="state" id="inlineRadio2" value="0" > 下架
         </label>
        <label class="radio-inline">
         <input type="radio" name="state" id="inlineRadio1" value="1" checked> 上架
          </label>
       
        
        <textarea class="form-control mt10" name="msg" cols="30" rows="5" placeholder="请修改600字以内的的描述" ><?php echo $row['msg'] ?></textarea><br><br>
        <center><button type="submit" class="mt10 btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;确认添加</span></button></center>
    </form>

</div>
    </div>
    </div>
    <!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>