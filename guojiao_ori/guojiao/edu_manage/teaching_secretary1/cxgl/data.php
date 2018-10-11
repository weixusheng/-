<?php
$t_id = $_GET["t_id"];//接收年级键值
include("../../function/conn.php");
$result1="";
mysql_query("set names utf8");
if($t_id!=""){//如果传递过来的不为空则执行
	$sql = mysql_query("select t_name from tb_teacher_base where t_no='$t_id'");//查询班级符合属于上边传递过来的年级的字段
	$result = mysql_fetch_array($sql);//执行SQL查询语句
	if($result!="")
		$result1=$result["t_name"];
	else
		$result1="无此教师！";
	}
echo $result1; //返回数据做回显
?>
 