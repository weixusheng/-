<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<title>无标题文档</title>
</head>
<body class="bgc">
<?php 
	include("../../function/conn.php");
	$term=$_GET["xueqi"];
	$sql=mysql_query("select * from tb_week where term='$term'");
	$info=mysql_fetch_array($sql);
?>
<div style="padding-left:40px; padding-top:40px">
<table width="759" border="1" cellspacing="0" cellpadding="0">
<tr>

  <td height="47" colspan="3" align="center"><?php echo $term;?>学期周次信息</td>
</tr>
  <tr>
    <td width="148" height="43" align="center">周次</td>
    <td width="393" align="center">周次日期</td>
    <td width="218" align="center">是否为考试周</td>
  </tr>
   <?php
   do{?>
  <tr>
    <td height="50" align="center">第<?php echo $info["week_num"];?>周</td>
    <td align="center"><?php echo $info["begin_date"]."至".$info["end_date"];?></td>
    <td align="center"><?php if($info["is_test_week"]==1) echo "是";else echo "否";?></td>
  </tr>
 <?php }while($info=mysql_fetch_array($sql));?>
</table>
</div>
</body>
</html>