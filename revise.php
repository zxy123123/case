<!-- 修改密码 -->
<?php require './init.php' ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./public/css/7.css" rel="stylesheet">



<div class="container">
<div class="row">
<div class="col-md-2 col-md-offset-5"><h2 style="color:black;">修改密码</h2>
</div>
</div>
<div class="row">
            <div class="col-md-6 col-md-offset-3">

    <form action="./com/revisedo.php" method="post" >
        <div class="form-group">
           <div class="form-group has-warning has-feedback">
            <div class="input-group">
                <div class="input-group-addon">请输入旧密码:</div>
                    <input type="password" name="pwd" class="form-control" id="pwd" id="exampleInputAmount"placeholder="请输入旧密码..">
                </div>
            </div>

        <div class="form-group">
                <div class="form-group has-warning has-feedback">
                    <div class="input-group">
                            <div class="input-group-addon">请输入新密码:</div>
                                <input type="password" name="npwd" class="form-control" id="repwd" id="exampleInputAmount"placeholder="请输入新密码">
                </div>
            </div>

             <div class="form-group">
            <div class="form-group has-warning has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon">请确认新密码:</div>
                            <input type="password" name="repwd" class="form-control" id="repwd" id="exampleInputAmount"placeholder="再次确认新密码">
                    </div>
            </div>


      <div class="form-group">
            <div class="form-group has-warning has-feedback">
                <div class="input-group pull-left">
                    <input type="text" name="vcode" class="form-control " placeholder="输入验证码">
                </div>
                <div >
                <img src="./com/yzm.php" title="点 我 刷 新" style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()">
                </div>
            </div>
        </div>
        
      <div class="form-group">
        <div class="col-md-offset-2 col-md-7">
          <button type="submit" class="btn col btn-warning col-md-6">完成</button>
        </div>
      </div>

    </form>

</div><!-- END container -->



<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>
