<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
include("../../function/conn.php");
$id=$_POST["id"];
$t_no=$_POST["t_no"];
$t_name=$_POST["t_name"];
$t_sex=$_POST["t_sex"];
$t_ID_no=$_POST["t_ID_no"];
$t_profession=$_POST["t_profession"];
$t_office=$_POST["t_office"];
mysql_query("update tb_teacher_base set t_no='$t_no',
                                        t_name='$t_name',
										t_sex='$t_sex',
										t_id_card='$t_ID_no',
										t_profession='$t_profession',
										t_office='$t_office' where ID='$id';");
echo "<script>alert('教师信息修改成功');window.location.href='read_tea_info.php';</script>";
   ?>
</body>
</html>