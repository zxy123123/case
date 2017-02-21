<?php 
    //此页面会进行 增 删 改
    require '../init.php';

   /* p($_GET);
    p($_POST);*/
    // exit;

    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败鸟....');
    mysqli_set_charset($link,'utf8');

   $a = $_GET['a'];
    switch ($a) {
        case 'edit':
            $name_reg = '/^[a-zA-Z][\w]{3,15}$/i';
            if(!preg_match($name_reg,$_POST['name'])){
                echo '用户名修改有误,以字母开头,长度4-16,允许字母数字下划线组成,不区分大小写<br>';
                 echo '<a href ="./index.php">返回</a>';
                exit;
            }

            $tel_reg = '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/';
            if(!preg_match($tel_reg,$_POST['tel'])){
                echo '手机号码输入有误<br>';
                 echo '<a href ="./index.php">返回</a>';
                exit;
            }
           


            $id = $_POST['id'];
            echo '正在编辑ID'.$id.'<br>';
            $set = '';
            foreach ($_POST as $key => $val) {
                $set .= "`$key`='$val',";
            }
            $set = rtrim($set,',');
            $sql = "UPDATE ".PRE."user SET $set WHERE `id`='$id'";
            $result = mysqli_query($link,$sql);
            if ($result && mysqli_affected_rows($link)>0) {
                echo '编辑成功';
                echo '<br>3秒后跳转到首页 或点击此处: <a href="./index.php">回首页</a>';
                echo '<meta http-equiv="refresh" content="3;./index.php">';
            }else{
               admin_redirect('编辑失败!','./index.php',3);
            }
            break;

            case 'add':
            echo '正在添加用户....';
            $keys = '';
            $values = '';

            $name_reg = '/^[a-zA-Z][\w]{3,15}$/i';
            if(!preg_match($name_reg,$_POST['name'])){
                echo '用户名填入有误,以字母开头,长度4-16,允许字母数字下划线组成,不区分大小写<br>';
                 echo '<a href ="./index.php">返回</a>';
                exit;
            }

            $tel_reg = '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/';
            if(!preg_match($tel_reg,$_POST['tel'])){
                echo '手机号码输入有误<br>';
                 echo '<a href ="./index.php">返回</a>';
                exit;
            }
            //遍历得到的post 生成SQL语句的条件
            foreach ($_POST as $key => $val) {
                $keys .= "`$key`,";
                $values .= "'$val',";
            }
            //抹去右边的逗号
            $keys = rtrim($keys,',');
            $values = rtrim($values,',');


            //5
            $sql = "INSERT INTO ".PRE."user ($keys) VALUES($values)";
            //6
            $result = mysqli_query($link,$sql);
            //7
          
            if ($result && mysqli_affected_rows($link)>0) {
                admin_redirect('添加成功!','./index.php',3);
            }else{
               admin_redirect('添加失败!','./index.php',3);
            }
            break;

        case 'del':
            //删除动作
            $id = $_GET['id'];
            $name = $_SESSION['admin']['name'];
            if ($name != 'admin') {
                admin_redirect('您没有权限操作,请联系admin用户!');
                exit;
            }

            echo '我要删除ID'.$id.'<br>';
            //5
            $sql = "DELETE FROM ".PRE."user WHERE `id`='$id'";
            //6
            $result = mysqli_query($link,$sql);
            //7
            if ($result && mysqli_affected_rows($link)>0) {
                echo '删除成功! 3秒后跳转到首页 或点击此处立即跳转<a href="./index.php">回首页</a>';
                echo '<meta http-equiv="refresh" content="3;index.php">';
            }else{
                admin_redirect('删除失败!');
            }
            break;
        }
        



    //8.关闭连接
    mysqli_close($link);



