<?php 
    require '../init.php';

    //接收PID
    $pid = empty($_GET['pid'])?0:$_GET['pid'];
    //SQL
    $sql = "SELECT `id`,`cname`,`pid`,`path`,`display` FROM ".PRE."category WHERE `pid`='$pid'";
    $list = query($link, $sql);
    // p($list);exit;
    

    /*$where = '';
    $urlname = '';
    $name = '';
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $where = "WHERE `name` LIKE '%$name%'";//SQL查询条件
        $urlname = "&name=$name";//url的参数
    }*/

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
        <div class="row zt">
            <h1>分类管理</h1>
            
            <table class="table table-bordered table-hover">
               <tr>
                <th>ID</th>
                <th>分类名</th>
                <th>pid</th>
                <th>path</th>
                <th>是否显示</th>
                <?php 
                $sql = "SELECT `pid` FROM ".PRE."category WHERE `id`='$pid'";
                $row = query($link, $sql);
                $ppid = $row[0]['pid'];
                 ?>
                <th>相关操作 &nbsp;&nbsp;&nbsp;
                <a href="./index.php?pid=<?php echo $ppid ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-share-alt">&nbsp;返回</span></a>

                </th>
            </tr>
            <?php if (empty($list)): ?>
                <tr>
                    <td colspan="6">
                        <h3 class="text-center">
                            <label class="label label-danger">暂无数据</label>
                        </h3>
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($list as $val): ?>
                    <tr>
                        <td><?php echo $val['id'] ?></td>
                        <td><?php echo $val['cname'] ?></td>
                        <?php 
                        //根据PID查询出父级的ID,名称
                        if ($val['pid'] != 0) {
                            $sql = "SELECT `cname` FROM ".PRE."category WHERE `id`='".$val['pid']."'";
                            $row = query($link, $sql);
                            $pname = $row[0]['cname'];
                            // p($row);
                        }
                         ?>
                        <td><?php echo isset($pname)?$pname:$val['pid']; ?></td>
                        <td><?php echo $val['path'] ?></td>
                        <td>
                            <a href="./action.php?a=display&display=<?php echo $val['display']?>&id=<?php echo $val['id'] ?>">
                            <?php echo $val['display']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                            </a>
                        </td>
                        <td>
                            <!-- 查看子类,当前类的ID就变为PID,所以传递的是PID -->
                            <a href="./index.php?pid=<?php echo $val['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open">&nbsp;查看子类</span></a>

                            <!-- 添加子类,当前类的ID就变为PID,所以传递的是PID -->
                            <a href="./add.php?pid=<?php echo $val['id'] ?>&path=<?php echo $val['path'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus">&nbsp;添加子类</span></a>

                            <!-- 编辑 自己做-->
                            <a href="./edit.php?id=<?php echo $val['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-wrench">&nbsp;编辑</span></a>

                            <!-- 删除 -->
                            <a href="./action.php?a=del&id=<?php echo $val['id'] ?>&pid=<?php echo $val['pid'] ?>&path=<?php echo $val['path'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash">&nbsp;删除</span></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>

                
               </table>
        </div>
    </div>


    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

        

