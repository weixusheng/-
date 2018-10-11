<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include("../../function/conn.php");
$term=$_POST["term"];
$class=$_POST["class"];
$course=$_POST["course"];
$sql=mysql_query("select ID from tb_course2_term where term='$term' and c_class='$class' and cb_id in(select ID from tb_course_base where c_longname like '%$course%')");
$info=mysql_fetch_array($sql);
do {
	echo $id=$info["ID"];
}while($info=mysql_fetch_array($sql))
?>
</body>
</html>