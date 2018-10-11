<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include("../../function/conn.php");
$t_no=$_POST["t_no"];
$t_name=$_POST["t_name"];
$t_sex=$_POST["t_sex"];
$t_ID_no=$_POST["t_ID_no"];
$t_profession=$_POST["t_profession"];
$pro_level=$_POST["pro_level"];
$t_office=$_POST["t_office"];
$t_collage=$_POST["t_collage"];
  mysql_query(" insert into tb_teacher_base (t_no,t_name,t_sex,t_id_card,t_office,t_profession,t_collage,pro_leval)
   values('$t_no','$t_name','$t_sex','$t_ID_no','$t_office','$t_profession','$t_collage','$pro_level');",$conn);
   mysql_query("insert into tb_t_password(no,pwd) values('$t_no','$t_no');"); 
  echo "<script> alert('教师信息添加成功');window.location.href='add_tea_info.php'; </script>";  ?>                                                                                                                         
</body>
</html>