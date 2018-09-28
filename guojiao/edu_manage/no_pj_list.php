<?php
include("function/conn.php");
$class_name=$_POST["class_name"];
$sql=mysql_query("select s_name,s_no from tb_s_information where s_class='$class_name' and id not in (select s_id from tb_evaluate)");
$info=mysql_fetch_array($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<table width="300" align="center" bgcolor="#CCCCCC" border="1" cellpadding="0" cellspacing="0">
<?php
do{
?>
<tr>
<td align="center"><?php echo $class_name;?></td>
<td align="center"><?php echo $info["s_no"];?></td>
<td align="center"><?php echo $info["s_name"];?></td>
</tr>
<?
}while($info=mysql_fetch_array($sql));
?>
</table>
</body>
</html>