<?php 
    require '../init.php';

    // 表单不为空,如果有空值,回之
    foreach ($_POST as $key => $val) {
        if ($val == '') {
            redirect('请完善表单信息!');
            exit;
        }
    }

    //验证码的检测
    //检测用户名和密码的合法性
    
    //接收用户数据
    $name = $_POST['name'];
    $pwd = md5($_POST['pwd']);
    $vcode = $_SESSION['vcode'];
    $vc = $_POST['vcode'];
    // p($vc);
    // exit;
    //sql
    $sql = "SELECT `id`,`name`,`pwd`,`logincount`FROM ".PRE."user WHERE `name`='$name'";

    $row = query($link, $sql);

    if ($row) {
        //如果有数据,说明用户存在
        $row = $row[0];

        $num = $row['logincount'] +1;
             echo $sql = "UPDATE ".PRE."user SET  `logincount`='$num' WHERE `name`='$name' ";
            execute($link,$sql);
        // p($row);
        //如果有数据,就进行密码比对
        if (($row['pwd'] == $pwd) && ($vc == $vcode)) {
            //密码一致,登录成功了!清除密码和就验证码
            unset($row['pwd']);
            unset($_SESSION['vcode']);

            //将用户的ID,name放在session
            $_SESSION['home'] = $row;
            redirect('登录成功!',URL.'index.php',1);
            exit;
        }else{
            //密码不一致
            redirect('密码错误或验证码错误!!');
        }
    }else{
        //用户名不存在
        redirect('用户名不存在!');
        exit;
    }

