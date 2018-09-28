<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
include("../../function/conn.php");
$classname=$_POST["classname"];
$grade=substr($classname,7,2);
mysql_query("insert into tb_class (grade_code, class_name, graduate_flag)
							 values('$grade','$classname','0');");
							echo "<script> alert('班级添加成功'); window.location.href='add_class.php' </script>"
?>
</body>
</html>