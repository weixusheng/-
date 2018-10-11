<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
</head>

<body class="bgc">
<?php
include("../../function/conn.php");
$class_name=$_GET["class_name"];
$id=$_GET["id"];
$exam_type=$_GET["exam"];
$can_change=$_GET["can_change"];
$arr=$_POST["shSon"];
$length=count($arr);
for($i=0;$i<$length;$i++){
	$sql=mysql_query("update tb_score set $can_change=1 where ID=$arr[$i]");
}
echo "<script>alert('授权成功!');location.href='exchange_aud.php?class_name=$class_name&id=$id&exam=$exam_type';</script>";
?>
</body>
</html>