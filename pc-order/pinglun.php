<?php
require '../init.php';
$on=$_GET['on'];
$gid = $_GET['gid'];
$od = $_GET['od'];
// p($_SESSION);
// exit;
// var_dump($od);
// exit;

$sql = "SELECT `status` FROM s47_order WHERE `id`='$od'";
// echo $sql;
$row = query($link,$sql);
$row = $row['0']['status'];
// p($row);
// exit;

if($row!=2){
    redirect('非评价状态');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
    <link href="../public/css/7.css" rel="stylesheet">
<body>
<table align="center" width="500" border="0" cellpadding="2" cellspacing="0">
<caption align="center">商品评价</caption>
<form action="pinglundo.php?gid=<?php echo $gid?>&on=<?php echo $on?>&od=<?php echo $od?>" method="post">
<tr>
<th>评价</th>
    <td>    
        <textarea name="pl" rows="4" cols="40"></textarea>
    </td>
</tr>

<tr>
    <td colspan="2" align="center">
        <button type="submit" class="btn btn-warning col-md-2 col-md-offset-2">提交</button>
        <button type="submit" class="btn btn-warning col-md-2 col-md-offset-1">重写</button>
    </td>
</tr>
</form>
</table>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>