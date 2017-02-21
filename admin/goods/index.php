<?php
    require '../init.php';

  

    //设置搜索条件
    $where = '';
    $name = '';
    $urlname = '';
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $where = "WHERE gname LIKE '%$name%'"; //按商品名查找的SQL条件
        $urlname = "&name=$name";//url传参的参数
    }

    //查询所有商品数量(总记录数)
    $sql = "SELECT count(*) total FROM ".PRE."goods $where";

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

 
// echo $offset.$page;
// 
    //此处多条件WHERE 连接需要改变 
    if ($where != '') {
        $where = "g.gname LIKE '%$name%' AND";
    }
    //5.准备SQL语句
    $sql = "
    SELECT g.id, g.gname, g.cate_id, g.price, g.stock, g.sale, g.is_new, g.is_hot, g.state, g.zan, g.msg, c.cname, i.iname
    FROM ".PRE."goods g,".PRE."category c,".PRE."image i
    WHERE $where g.cate_id = c.id AND g.id = i.goods_id AND cover=1
    ORDER BY g.id
    LIMIT $offset,$num";

    // echo $sql;exit;


    // 6-7 执行sql语句 并 处理执行结果
    $list = query($link,$sql);

    // p($list);exit;

    $rows = mysqli_affected_rows($link);

    //8.关闭连接
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
    <link rel="stylesheet" href="../public/admin.css">
</head>
<body class="bgc">
<div class="container">
    <div class="row">
        <h2 pull-left>商品管理</h2>
        <form class="navbar-form navbar-left pull-right" >
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="按商品名搜索..">
                    </div>
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                  </form>
        <?php if (empty($list)): ?>
            <h2 class="text-center">暂无数据</h2>
        <?php else: ?>
        <?php foreach ($list as $val): ?>
            <table class="table table-bordered table-hover h4">
                <tr>
                    <th class="col-md-1">ID:<?php echo $val['id'] ?></th>
                    <th class="col-md-1">商品名</th>
                    <th class="col-md-3">所属分类</th>
                    <th class="col-md-1">价格</th>
                    <th class="col-md-1">库存</th>
                    <th class="col-md-1">销量</th>
                    <th class="col-md-1">赞量</th>
                    <th class="col-md-1">上架</th>
                    <th class="col-md-1">热销</th>
                    <th class="col-md-1">新品</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $val['gname'] ?></td>
                    <td><?php echo $val['cname'] ?></td>
                    <td><?php echo $val['price'] ?></td>
                    <td><?php echo $val['stock'] ?></td>
                    <td><?php echo $val['sale'] ?></td>
                    <td><?php echo $val['zan'] ?></td>
                    <td>
                        <a href="./action.php?a=state&state=<?php echo $val['state']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['state']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                    <td>
                        <a href="./action.php?a=is_hot&is_hot=<?php echo $val['is_hot']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['is_hot']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                    <td>
                        <a href="./action.php?a=is_new&is_new=<?php echo $val['is_new']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['is_new']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <img src="<?php echo getpath(ADMIN_URL.'../uploads/', $val['iname'], 'b') ?>">
                    </td>
                    <td colspan="5"><?php echo $val['msg'] ?></td>
                    <td colspan="5">
                        <div class="col-md-12 mt30">
                            <a href="./edit.php?id=<?php echo $val['id'] ?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-file">&nbsp;商品信息编辑</span></a>
                        </div>
                        <div class="col-md-12 mt30">
                            <a href="./img.php?goods_id=<?php echo $val['id'] ?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-picture">&nbsp;商品图片编辑</span></a>
                        </div>
                    </td>
                </tr>
            </table>
        <?php endforeach ?>
        <?php endif ?>

        <?php require ADMIN_PATH.'../com/page.php'; ?>
    </div>
</div>


    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

        

