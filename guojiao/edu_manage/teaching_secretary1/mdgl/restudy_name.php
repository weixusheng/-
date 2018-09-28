<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<style type="text/css">
* {
	font-size:10pt;
}
tr td {
	height:22px;
}
caption { 
	font-size:14pt;
}
</style>
</head>
<body class=" ziye_style">
 <?php 
include("../../function/conn.php");
$grade=$_GET["grade"];;
$term=$_POST["term"];
?>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
 <tr>
   <td align="center"><table width="100%" border="1" cellspacing="0" cellpadding="0">
     <caption>
       <?php echo $grade."级重修名单" ?>
       </caption>
     <tr>
       <td width="4%" align="center">序号</td>
       <td width="8%" height="33" align="center">学生院系</td>
       <td align="center" width="4%">年级</td>
       <td align="center" width="4%">学号</td>
       <td align="center" width="5%">姓名</td>
       <td align="center" width="6%">班级</td>
       <td align="center" width="9%">专业</td>
       <td align="center" width="7%">课程编号</td>
       <td align="center" width="8%">课程名称</td>
       <td align="center" width="9%">课程类别</td>
       <td align="center" width="7%">课程性质</td>
       <td align="center" width="4%">总学时</td>
       <td align="center" width="4%">学分</td>
       <td align="center" width="7%">原学年学期</td>
       <td align="center" width="7%">开课学院</td>
       <td align="center" width="11%">银行账号</td>
     </tr>
     <?php
$diangqi="电气工程及其自动化";
$jingmao="国际经济与贸易";
$sql=mysql_query("select term,s_class,s_no,s_name,c_name,c_no,c_kind,credit,score from stu_info where term='$term' and grade='$grade' and ((exam_type=2 or exam_type=3 or (bk_score<60 and bk_score is not null) ) or ((exam_type=2 or exam_type=3 or score<60) and major='$jingmao' and substr(c_no,1,2)=16))");
$info=mysql_fetch_array($sql);
$i=0;
do{	
$i++;
$s_no=$info["s_no"];
$c_id=$info["c_no"];
$s_class=$info["s_class"];
$sql1=mysql_query("select bank_num from tb_s_information where s_no='$s_no';");
$info1=mysql_fetch_array($sql1);
$bank_num=$info1["bank_num"];
$sql2=mysql_query("select ID from tb_course_base where c_id='$c_id';");
$info2=mysql_fetch_array($sql2);
$cb_id=$info2["ID"];
$sql3=mysql_query("select c_week_hour from tb_course2_term where ID='$cb_id';");
$info3=mysql_fetch_array($sql3);
$c_week_hour=$info3["c_week_hour"];
//$c_teacher=$info3["c_teacher"];//
$sql4=mysql_query("select c_type,c_office from tb_course_base where c_id='$c_id';"); 
$info4=mysql_fetch_array($sql4);
$c_type=$info4["c_type"];
$c_office=$info4["c_office"];
$sql5=mysql_query("select speciality from tb_class where class_name='$s_class';");
$info5=mysql_fetch_array($sql5);
$speciality=$info5["speciality"];
if($s_no=="")
{
	 ?>
     <tr>
       <td height="30" colspan="15" align="center">无重修名单</td>
     </tr>
     <?php 
}
else 
{?>
     <tr>
       <td align="center"><?php echo $i; ?></td>
       <td align="center"> 经济管理学院</td>
       <td align="center"><?php echo $grade; ?>&nbsp;</td>
       <td align="center"><?php echo $info["s_no"]; ?>&nbsp;</td>
       <td align="center"><?php echo $info["s_name"]; ?>&nbsp;</td>
       <td align="center"><?php echo $info["s_class"]; ?>&nbsp;</td>
       <td align="center"><?php echo $speciality;?></td>
       <td align="center"><?php echo $info["c_no"]; ?>&nbsp;</td>
       <td align="center"><?php echo $info["c_name"]; ?>&nbsp;</td>
       <td align="center"><?php echo $c_type; ?>&nbsp;</td>
       <td align="center"><?php echo $info["c_kind"]; ?>&nbsp;</td>
       <td align="center"><?php echo $c_week_hour; ?>&nbsp;</td>
       <td align="center"><?php echo $info["credit"]; ?>&nbsp;</td>
       <td align="center"><?php echo $info["term"]; ?>&nbsp;</td>
       <td align="center"><?php echo $c_office; ?>&nbsp;</td>
       <td align="center"><?php echo $bank_num;?>&nbsp;</td>
     </tr>
     <?php
}
}while($info=mysql_fetch_array($sql));
?>
   </table></td>
 </tr>
</table>
<br />
<br />
<br />
</body>
</html>