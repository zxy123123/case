<?php
require '../init.php';

// p($_GET);
$on = $_GET['on'];
$gid = $_GET['gid'];
$say = $_GET['say'];
$od = $_GET['od'];
// p($od);
// exit;
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
 <link href="../public/css/7.css" rel="stylesheet">
<body>
<table align="center" width="500" border="0" cellpadding="2" cellspacing="0">
<caption align="center">商家回复</caption>
<form action="./action.php?on=<?php echo $on?>&gid=<?php echo $gid?>&say=<?php echo $say?>&od=<?php echo $od?>" method="post">
<tr>
<th>回复</th>
    <td>
        <textarea name="hf" rows="4" cols="40"></textarea>
    </td>
</tr>

<tr>
    <td colspan="2" align="center">
        <button type="submit" class="btn btn-primary col-md-2 col-md-offset-2">提交</button>
        <button type="submit" class="btn btn-primary col-md-2 col-md-offset-1">重写</button>
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






















