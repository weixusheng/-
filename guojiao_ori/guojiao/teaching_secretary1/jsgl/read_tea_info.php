<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<title>无标题文档</title>
</head>

<body class="ziye_style">
<table width="850" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="90" align="center">教师工号</td>
    <td width="90" align="center">教师姓名</td>
    <td width="80" align="center">教师性别</td>
    <td width="170" align="center">身份证号</td>
    <td width="110" align="center">教师职称</td>
    <td width="220" align="center">所属教研室</td>
    <td width="45" align="center">&nbsp;</td>
  </tr><?php
  include("../../function/conn.php");
  $sql=mysql_query("select * from tb_teacher_base");
  $array=mysql_fetch_array($sql);
  do{
	  $id=$array["ID"];
	  $t_no=$array["t_no"];
	  $t_name=$array["t_name"];
	  $t_sex=$array["t_sex"];
	  $t_id_card=$array["t_id_card"];
	  $t_office=$array["t_office"];
	  $t_profession=$array["t_profession"]; ?>
	 
  <tr>
    <td align="center"><?php echo $t_no; ?>&nbsp;</td>
    <td align="center"><?php echo $t_name; ?>&nbsp;</td>
    <td align="center"><?php echo $t_sex; ?>&nbsp;</td>
	<td align="center"><?php echo "&nbsp;".$t_id_card; ?>&nbsp;</td>
	<td align="center"><?php echo $t_profession; ?>&nbsp;</td>
	<td align="center"><?php echo $t_office; ?>&nbsp;</td>
    <td align="center"><a href="change_tea_info.php?id=<?php echo $id?>">修改</a>&nbsp;</td>
 </tr><?php }
 while($array=mysql_fetch_array($sql));
 ?> 
 
</table>
</body>
</html>