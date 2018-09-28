<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>
<body bgcolor="#CCCCCC">
    <?php
include("../../function/conn.php");
$sql=mysql_query("select class_name from tb_class where graduate_flag=0");
$info=mysql_fetch_array($sql);
?>
<form action="dcj.php" method="post"  enctype="multipart/form-data">
<table border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="399" height="50">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期:<input name="term" type="text" id="term" /></td>
  </tr>
  <tr>
    <td width="342" height="50">课程编号:<input name="c_id" type="text" id="c_id" /></td>
  </tr>
  <tr>
    <td width="229" height="50">班&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级:<select name="class" id="class">
      <option>——请选择班级——</option>
      <?php
do {
	$class=$info["class_name"];
?>
<option><?php echo $class?></option>
<?php
}while($info=mysql_fetch_array($sql))
?>
</select></td>
  </tr>
  <tr>
  	<td height="50">选择工作簿:<input name="gzb" type="text" id="gzb" /></td>
  </tr>
  <tr>
    <td height="50"> <input name="file" type="file" /></td>
  </tr>
  <tr>
     <td height="50">考试类型:<select name="type" id="type">
       <option>——请选择考试类型——</option>
       <option value="1">——正考——</option>
       <option value="2">——补考——</option>
       <option value="3">——重修——</option>
     </select></td>
  </tr>
  <tr>
    <td height="50"> <input type="submit" value="批量导入"/></td>
  </tr>
</table>
</form>
</body>
</html>