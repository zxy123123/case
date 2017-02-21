<?php
    header("content-type:text/html;charset=utf-8");
    require '../init.php';
    $id = $_GET['id'];

    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接又失败了!!');
    mysqli_set_charset($link,'utf8');

   $sql = "SELECT `id`,`cname`  FROM ".PRE."category WHERE `id`='$id'";
    $result = mysqli_query($link,$sql);
    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
       /* p($row);*/



    /*    echo "$sql";
        exit;*/
    }
/*    echo '<pre>';
        print_r($row);
    echo '</pre>';

exit;*/

 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>编辑分类</h2>
    <form action="./action.php?a=edit" method="post">
        <!-- 隐藏域用于传递用户的ID 以便action页面知道是编辑谁 -->
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        
        分类名:
        <input type="text" name="cname" value="<?php echo $row['cname'] ?>"><br><br>
        <input type="submit" value="保存编辑">
    </form>
</body>
</html>