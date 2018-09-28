<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="bgc">
<table width="" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="64" align="center">课程编号</td>
    <td width="64" align="center">课程名称</td>
    <td width="80" align="center">所属教研室</td>
    <td width="64" align="center">课程类型</td>
    <td width="32" align="center">学分</td>
    <td width="43" align="center">类别</td>
    <td width="71" align="center">任课教师</td>
    <td width="73" align="center">总学时</td>
    
  </tr>

<?php
include("../../function/conn.php");
$class_name=$_POST["class_name"];
$term=$_POST["term"];
$sql=mysql_query("select credit,cb_id,c_kind,c_teacher,c_week_hour from tb_course2_term where c_class='$class_name' and term='$term'  " );
$info=mysql_fetch_array($sql);
if($info!=false){
do {
	$cb_id=$info["cb_id"];
	$c_kind=$info["c_kind"];
	$c_teacher=$info["c_teacher"];
	$c_week_hour=$info["c_week_hour"]; 
	$gsql=mysql_query("select c_id,c_longname,c_office,c_type,c_credit from tb_course_base where ID=$cb_id");
	$ginfo=mysql_fetch_array($gsql);
	$c_id=$ginfo["c_id"];
	$c_longname=$ginfo["c_longname"];
	$c_office=$ginfo["c_office"];
	$c_type=$ginfo["c_type"];
	$c_credit=$info["credit"];
?>
  <tr>
  	<td align="center"><?php echo $c_id?>&nbsp;</td>
    <td align="center"><?php echo $c_longname?>&nbsp;</td>
    <td align="center"><?php echo $c_office?>&nbsp;</td>
    <td align="center"><?php echo $c_type?>&nbsp;</td>
    <td align="center"><?php echo $c_credit?>&nbsp;</td>
    <td align="center"><?php echo $c_kind?>&nbsp;</td>
    <td align="center"><?php echo $c_teacher?>&nbsp;</td>
    <td align="center"><?php echo $c_week_hour ?>&nbsp;</td>
  </tr>
<?php
}while($info=mysql_fetch_array($sql));
}
else
{
?>
<tr><td colspan="8" align="center">未找到相应信息</td></tr>
<?php
}
?>
</table>
</body>
</html>