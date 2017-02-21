<?php 
    //此页面会进行 增 删 改
    require '../init.php';

  /*  p($_GET);
    p($_POST);*/
    // exit;
    /*p($_SESSION);*/
    
    $aaa='admin';
    if($_SESSION['admin']['name'] !== $aaa){
        
        admin_redirect('你不是admin没有权限','./index-1.php',3);
        exit;
    }
    // exit;

    $a = $_GET['a'];
/*    echo '<pre>';
        print_r($a);
    echo '</pre>';
    exit;*/

    switch ($a) {
        case 'edit':
            $name_reg = '/^[a-zA-Z][\w]{3,15}$/i';
            if(!preg_match($name_reg,$_POST['name'])){
                echo '用户名修改有误,以字母开头,长度4-16,允许字母数字下划线组成,不区分大小写<br>';
                 echo '<a href ="./index-1.php">返回</a>';
                exit;
            }

            $tel_reg = '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/';
            if(!preg_match($tel_reg,$_POST['tel'])){
                echo '手机号码输入有误<br>';
                 echo '<a href ="./index-1.php">返回</a>';
                exit;
            }

            $id = $_POST['id'];
            echo '正在编辑ID为'.$id.'的家伙..<br>';
            $set = '';
            foreach ($_POST as $key => $val) {
                $set .= "`$key`='$val',";
            }
            $set = rtrim($set,',');
            $sql = "UPDATE ".PRE."admin_user SET $set WHERE `id`='$id'";
          
            $result = mysqli_query($link,$sql);
            if ($result && mysqli_affected_rows($link)>0) {
                echo '编辑成功';
                echo '<br>3秒后跳转到首页 或点击此处: <a href="./index-1.php">回首页</a>';
                echo '<meta http-equiv="refresh" content="3;./index-1.php">';
            }else{
                echo '编辑失败,请重试';
                //失败,应该回到之前页面(来之前的页面)
                echo '<meta http-equiv="refresh" content="3;'.$_SERVER['HTTP_REFERER'].'">';
            }
            break;


case 'add':
            echo '正在添加用户....';
            $keys = '';
            $values = '';
            $_POST['pwd'] = md5($_POST['pwd']);
            // p($_POST);
            $name_reg = '/^[a-zA-Z][\w]{3,15}$/i';
            if(!preg_match($name_reg,$_POST['name'])){
                echo '用户名填入有误,以字母开头,长度4-16,允许字母数字下划线组成,不区分大小写<br>';
                 echo '<a href ="./index-1.php">返回</a>';
                exit;
            }

            $tel_reg = '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/';
            if(!preg_match($tel_reg,$_POST['tel'])){
                echo '手机号码输入有误<br>';
                 echo '<a href ="./index-1.php">返回</a>';
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
            $sql = "INSERT INTO ".PRE."admin_user ($keys) VALUES($values)";
            //6
            $result = mysqli_query($link,$sql);
            //7
            if ($result && mysqli_affected_rows($link)>0) {
                echo '添加成功 ID为'.mysqli_insert_id($link);
                echo '<br>3秒后跳转到首页 或点击此处: <a href="./index-1.php">回首页</a>';
                echo '<meta http-equiv="refresh" content="3;./index-1.php">';
            }else{
                echo '添加失败,请重试';
                //添加失败,应该回到添加页面(来之前的页面)
                echo '<meta http-equiv="refresh" content="3;'.$_SERVER['HTTP_REFERER'].'">';
            }
            break;



           
            case 'del':
            //删除动作
            $id = $_GET['id'];
            $type = $_GET['type'];
            /*echo '<pre>';
                print_r($type);
                exit;*/
            /*echo '</pre>';*/


            echo '我要删除ID为'.$id.'的家伙<br>';
            //5
            $sql = "DELETE FROM ".PRE."admin_user WHERE `id`='$id'";

           if($type == 0){
                    echo '不能删除admin!';
                    echo '<meta http-equiv="refresh" content="3;index-1.php">';
                    exit;}
            $id = execute($link,$sql);
            /*$type = execute($link,$sql);*/
            // $result = mysqli_query($link,$sql);
            //7
            if ( execute($link,$sql)) {
                    admin_redirect('删除成功 ID:'.$id, './index-1.php',2);
                    exit;
            }else{
                echo '删除失败!';
                echo '<meta http-equiv="refresh" content="3;index-1.php">';
            }
            break;
    }

    //8.关闭连接
    mysqli_close($link);



