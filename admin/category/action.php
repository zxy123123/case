<?php 
    //此页面会进行 增 删 改
    require '../init.php';

   /* p($_GET);
    p($_POST);*/
    // exit;

     $a = $_GET['a'];
    switch ($a) {
        case 'display':
            //是否显示分类
            $id = $_GET['id'];
            $display = $_GET['display']==1?0:1;
            $sql = "UPDATE ".PRE."category SET `display`='$display' WHERE id='$id'";
            execute($link, $sql);
            header("location:".$_SERVER['HTTP_REFERER']);
            exit;
            
            break;

        case 'edit':
        $id = $_POST['id'];
           echo '正在编辑..<br>';
          $set = '';
            foreach ($_POST as $key => $val) {
                $set .= "`$key`='$val',";
            }
            $set = rtrim($set,',');

            $sql = "UPDATE ".PRE."category SET $set WHERE `id`='$id'";
            $result = mysqli_query($link,$sql);
            if ($result && mysqli_affected_rows($link)>0) {
                echo '编辑成功';
                echo '<br>3秒后跳转到首页 或点击此处: <a href="./index.php">回首页</a>';
                echo '<meta http-equiv="refresh" content="3;./index.php">';
            }else{
                echo '编辑失败,请重试';
                //失败,应该回到之前页面(来之前的页面)
                echo '<meta http-equiv="refresh" content="3;'.$_SERVER['HTTP_REFERER'].'">';
            }
            break;

               case 'add':
            echo '正在添加分类..<br>';
            $name = $_POST['cname'];
            $pid = $_POST['pid'];
            $path = $_POST['path'];

            if (empty($name)) {
                admin_redirect('分类名不得为空!!!');
                exit;
            }
            $sql = "INSERT INTO ".PRE."category (`cname`,`pid`,`path`) VALUES('$name','$pid','$path')";
            if (execute($link, $sql)) {
                admin_redirect('添加成功','./index.php');
               /* exit;*/
            }else{
                admin_redirect('添加失败');
                exit;
            }
            break;

        case 'del':
            //删除要满足以下条件
            //1. 当前分类下木有子分类
            //2. 当前分类下还有商品,也不能删除(将来自己做)
            //3. 可选 ,顶级分类不许删除
            $id = $_GET['id'];
            $pid = $_GET['pid'];
            $path = $_GET['path'];

            //顶级分类不可删除
            if ($pid != 0 && $path != '0,') {
                //判断有无子分类
                //子类的规律是:自己的path拼接上自己的ID再加上逗号
                $cons = $path.$id.',';
              $sql = "SELECT `id` FROM ".PRE."category WHERE path like '$cons%'";
                $list = query($link, $sql);
                if (!empty($list)) {
                    admin_redirect('不能删除,该类下还有子类');
                    exit;
                }
                //2. 当前分类下还有商品,也不能删除(将来自己做)
                //删除分类
                $sql = "DELETE FROM ".PRE."category WHERE id='$id'";
                if (execute($link,$sql)) {
                     admin_redirect('删除成功');
                     exit;
                }else{
                    admin_redirect('删除失败');
                    exit;
                }
            }else{
                admin_redirect('顶级分类不得删除!');
                exit;
            }            
            break;
    }

    //8.关闭连接
    mysqli_close($link);



