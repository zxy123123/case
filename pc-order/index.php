<?php
    require '../init.php';

  // p($_SESSION);
  // exit;

    //设置搜索条件
    $where = '';
    $name = '';
    $urlname = '';
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $where = "AND `oname` LIKE '%$name%'"; //按名字查找的SQL条件
        $urlname = "&name=$name";//url传参的参数
    }


//查询所有商品数量(总记录数)
    $sql = "SELECT count(*) total FROM ".PRE."order o WHERE o.user_id = {$_SESSION['home']['id']} $where";


    $row = query($link,$sql);
    $total = $row[0]['total'];
    
    //定义每一页显示的数量
    $num = 4;
    //总页数
    $allpage = ceil($total / $num);

    // p($_GET['page']);

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
    $pageurl = 'index.php';
    
    //产生分页数字链接
    $num_link = '';
    for ($i = $start; $i <= $end; $i++) {
        if ($page == $i) {
            $num_link .= '<li class="active"><a href="'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
            continue;
        }
        $num_link .= '<li><a href="'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
    }
$sql = "
        SELECT `id`,`ordernum`,`oname`,`address`,`phone` 
        FROM ".PRE."order o
        WHERE o.user_id = {$_SESSION['home']['id']} $where LIMIT $offset,$num"; 
// v($sql);exit;
     $list = query($link,$sql);
 // var_dump(count($list));
 // exit;
// var_dump($list);exit;
 // p($list);


$rows = mysqli_affected_rows($link);

mysqli_close($link);

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
    <link rel="stylesheet" href="./public/home.css">
</head>
<body id="bgbz">
<div class="container">
    <div class="row">
            <h2 pull-left>订单管理</h2>
<form class="navbar-form navbar-left pull-right" >
              <div class="form-group">

            <input type="text" name="name" class="form-control" placeholder="按收货人搜索">
        </div>
            <button type="submit" class="btn btn-default btn-warning"><span class="glyphicon glyphicon-search"></span></button>
    </form>
    <body>
    
         
   <table class="table table-bordered table-hover h4">
        <tr>
            <th class="col-md-1">ID</th>
            <th class="col-md-2">订单编号</th>
            <th class="col-md-2">收货人</th>
            <th class="col-md-2">收货地址</th>
            <th class="col-md-2">电话</th>
        </tr>

        <?php if (empty($list)): ?>
            <tr>
                <td colspan="5"><h3 class="text-center">暂无数据</h3>
                </td>

        <?php else: ?>
        <?php foreach ($list as $val): ?>
        <tr>
        <td><?php echo $val['id'] ?></td>
        <td><a href="./action.php?ordernum=<?php echo $val['ordernum']?>"><?php echo $val['ordernum'] ?></a></td>
        <td><?php echo $val['oname'] ?></td>
        <td><?php echo $val['address'] ?></td>
        <td><?php echo $val['phone'] ?></td>
        </tr>
   <?php endforeach; ?>
<?php endif ?>
    </table>
<?php require PATH.'./com/page.php'; ?>
    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

        

