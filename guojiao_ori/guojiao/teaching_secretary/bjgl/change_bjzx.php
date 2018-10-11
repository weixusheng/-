<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include("../../function/conn.php");
$grad=$_GET["graduate"];
if($grad==1)
	$agrad=0;
if($grad==0)
	$agrad=1;
$id=$_GET["id"];
mysql_query("update tb_class set graduate_flag='$agrad' where ID=$id");
echo "<script>window.location.href='bjzx.php'</script>";
?>
</body>
</html>