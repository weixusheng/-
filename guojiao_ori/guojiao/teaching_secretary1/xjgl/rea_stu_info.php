<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="bgc">
<?php
	if(isset($_POST["class_name"])||isset($_GET["class_name"])){
		isset($_POST["class_name"])?$class_name=$_POST["class_name"]:$class_name=$_GET["class_name"];
	}
	else{
		$class_name="";
	}
?>
<?php
include("../../function/conn.php");
$sql=mysql_query("select * from tb_s_information where s_class='$class_name'"); 
$array=mysql_fetch_array($sql);
if($array==false){
	echo "无相应信息";
}
else{
	
?>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="10%">学号</th>
    <th width="10%">姓名</th>
    <th width="7%">性别</th>
    <th width="10%">出生年月日</th>
    <th width="15%">身份证号</th>
    <th width="5%">民族</th>
    <th width="10%">籍贯</th>
    <th width="10%">政治面貌</th>
    <th width="9%">班级</th>
    <th width="10%">入学时间</th>
    <td width="4%">&nbsp;</td>
   </tr>
<?php
do {
	$id=$array["ID"];
	$s_no=$array["s_no"];
	$s_name=$array["s_name"];
	$s_sex=$array["s_sex"];
	$s_bir=$array["s_birthday"];
	$s_id=$array["s_id_card"];
	$s_home=$array["s_home"];
	$s_pol=$array["s_politics"];
	$s_class=$array["s_class"];
	$s_ent=$array["s_entrance_date"];
	$nation=$array["nation"];
?>
   <tr>
	<td align="center">&nbsp;<?php echo $s_no;?>&nbsp;</td>
	<td align="center">&nbsp;<?php echo $s_name;?>&nbsp;</td>
	<td align="center">&nbsp;<?php echo $s_sex;?>&nbsp;</td>
	<td align="center">&nbsp;<?php echo $s_bir;?>&nbsp;</td>
	<td align="center">&nbsp;<?php echo $s_id;?>&nbsp;</td>
    <td align="center">&nbsp;<?php echo $nation;?>&nbsp;</td>
	<td align="center">&nbsp;<?php echo $s_home;?>&nbsp;</td>
	<td align="center">&nbsp;<?php echo $s_pol;?>&nbsp;</td>
	<td align="center">&nbsp;<?php echo $s_class;?>&nbsp;</td>
	<td align="center">&nbsp;<?php echo $s_ent;?>&nbsp;</td>
    <td><a href="change_stu_info.php?id=<?php echo $id?>">修改</td>
   </tr> 
<?php
}while($array=mysql_fetch_array($sql));
}
?>
</table>

</body>
</html>