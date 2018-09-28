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
$grade="20".substr($classname,6,2);
$zhuanye0=substr($classname,0,3);
if($zhuanye0=="电"){$zhuanye="电气工程及其自动化";}

else {
if($zhuanye0=="经"){$zhuanye="国际经济与贸易";}
}
mysql_query("insert into tb_class (grade_code, class_name,speciality,graduate_flag)
							 values('$grade','$classname','$zhuanye','0');");
							echo "<script> alert('班级添加成功'); window.location.href='add_class.php' </script>"
?>
</body>
</html>