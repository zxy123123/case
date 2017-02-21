<?php


    header("content-type:text/html;charset=utf-8");
    require '../../config.php';
    $id = $_GET['id'];
    // echo '<pre>';
    //     print_r($id);
    // echo '</pre>';

    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接又失败了!!');
    mysqli_set_charset($link,'utf8');

    $sql = "SELECT * FROM ".PRE."admin_user WHERE `id`='$id'";
    $result = mysqli_query($link,$sql);
    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
    }
   /* echo '<pre>';
        print_r($row);
    echo '</pre>';*/



 ?>

 <!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user-list</title>

    <!-- Bootstrap -->
    <link href="../public/css/7.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../public/js/html5shiv.min.js"></script>
    <script src="../public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../public/admin.css">
    <title>Document</title>
</head>
<body class="bgc">
    
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-md-offset-5"><h2 style="color:black;">编辑管理员</h2></div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="./action-1.php?a=edit" method="post">
                      
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                        <div class="input-group">
                              <div class="input-group-addon">用户名:</div>
                     <input type="text" name="name" class="form-control" id="exampleInputAmount" value="<?php echo $row['name'] ?>" placeholder="请输入用户名">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"> 密码&nbsp;</div>
                          <input type="password" name="pwd" class="form-control" value="<?php echo $row['pwd'] ?>" id="exampleInputAmount" placeholder="请输入新密码">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                              <div class="input-group-addon">手机号</div>
                              <input type="text" name="tel" value="<?php echo $row['tel'] ?>" class="form-control" id="exampleInputAmount" placeholder="请输入手机号">
                        </div>
                    </div>

                  <center><button type="submit" class="mt10 btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;点击完成</span></button></center>
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

