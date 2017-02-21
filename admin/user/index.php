<?php 
    require '../init.php';

    $where = '';
    $urlname = '';
    $name = '';
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $where = "WHERE `name` LIKE '%$name%'";//SQL查询条件
        $urlname = "&name=$name";//url的参数
    }

        //分页开始
        //总记录数
         $sql = "SELECT count(*) total FROM s47_user $where";
        $row = query($link, $sql);
        $total = $row[0]['total'];
        //每页显示数
        $num = 5;
        //总页数
    $allpage = ceil($total / $num);


       //获取页码
        $page = isset($_GET['page'])?(int)$_GET['page']:1;
        //限制页码范围
    //页码:不能小于1 不能大于$allpage
    $page = max(1,$page);//[0,1]
    $page = min($page,$allpage);//[接收的页数,总页数]

        //获取偏移量
        $offset = ($page-1) * $num;//(当前页-1) * 每页显示数
        //获取上一页/下一页
        $prev = $page - 1;
        $next = $page + 1;

        //控制数组页码的显示
    $start = max($page - 2, 1);
    $end = min($page + 2, $allpage);

    $pageurl = 'index.php';
    //产生数字链接
    $num_link = '';
    for ($i = $start; $i <= $end; $i++) {
        if ($page == $i) {
            $num_link .= '<li class="active"><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
            continue;
        }
        $num_link .= '<li><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
    }
    echo '<hr>'; 

    //5.SQL语句
    $sql = "SELECT `id`,`name`,`tel`,`sex`,`email`,`logincount` FROM ".PRE."user $where LIMIT $offset,$num";
    //处理结果集
    $user_list = query($link,$sql);

    //显示当前页查询到的记录数量
    $rows = mysqli_affected_rows($link);


    //8.关闭MYSQL连接
    mysqli_close($link);
 
    // p($user_list);exit;
?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
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
</head>
<body class="bgc">
    <div class="container">
        <div class="row zt">
            <h1>用户信息表</h1>
            <nav class="navbar">
              <div class="container-fluid">
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="./index.php">用户列表</a></li>
                    <li><a href="./add.php">添加前台用户</a></li>
                  </ul>
                  <form class="navbar-form navbar-left" >
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="按用户名搜索..">
                    </div>
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                  </form>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>

            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>手机号</th>
                    <th>邮箱</th>
                    <th>登录次数</th>
                    <th>操作</th>
                </tr>

                <?php if (empty($user_list)): ?>

                    <tr>
                        <td colspan="7"><h3 class="text-center">暂无数据</h3></td>
                    </tr>

                <?php else: ?>
                <?php foreach ($user_list as $key => $val): ?>
                    <tr>
                        <td><?php echo $val['id'] ?></td>
                        <td><?php echo $val['name'] ?></td>
                        <td>
                        <?php
                        switch ($val['sex']) {
                            case 2:
                                echo '保密';
                                break;
                            case 1:
                                echo '男';
                                break;
                            case 0:
                                echo '女';
                                break;
                            
                        }
                        ?>
                        </td>
                        <td><?php echo $val['tel'] ?></td>
                        <td><?php echo $val['email'] ?></td>
                        <td><?php echo $val['logincount'] ?></td>
                        <td>
                            <a href="./edit.php?id=<?php echo $val['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-wrench">&nbsp;编辑</span></a>
                            <a href="./action.php?a=del&id=<?php echo $val['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash">&nbsp;删除</span></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
               </table>
               <?php require ADMIN_PATH.'../com/page.php'; ?>
        </div>
    </div>


    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

        

