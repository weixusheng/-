<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/teacher_class_score.css" rel="stylesheet" type="text/css"/>

</head>

<body class="bgc">
<?php  
$term=$_POST["term"];
$class=$_POST["class_name"];
$cb_id=$_POST["subject"];
include("../../function/conn.php");
$sql=mysql_query("select speciality,grade_code from tb_class where class_name='$class';");
$info=mysql_fetch_array($sql);
$speciality=$info["speciality"];
$grade_code=$info["grade_code"];
$sql=mysql_query("select c_longname,c_credit from tb_course_base where ID='$cb_id';");
$info=mysql_fetch_array($sql);
$course=$info["c_longname"];
$c_credit=$info["c_credit"];
$sql=mysql_query("select c_week_hour,c_teacher from tb_course2_term where cb_id='$cb_id';");
$info=mysql_fetch_array($sql);
$c_week_hour=$info["c_week_hour"];
$c_teacher=$info["c_teacher"];
?>
<table width="800" cellspacing="0" cellpadding="0" class="course_zhubiao" style="border:none; height:auto;" align="center">
<caption><span class="caption">东北电力大学&nbsp;&nbsp;&nbsp;&nbsp;学生考核成绩登录表</span><br />
<span class="title">年级:［<?php echo $grade_code; ?>］</span><span class="title">学院:［国际交流学院］</span><span class="title">专业:［<?php echo $speciality; ?>］</span><span class="title">班级:［<?php echo $class; ?>］</span><span class="title">学年学期:［<?php echo $term; ?>］</span><br />
</caption>
<?php  
$sql=mysql_query("select s_id,score,bk_score,ck_score from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class') and c_id in (select ID from tb_course2_term where cb_id='$cb_id');");
?>
<tr>
<td valign="top" style="border-right:1px solid #000; border-bottom:1px solid #000">
  <table width="400" cellspacing="0" cellpadding="0" class="course_left">
  <tr height="25">
  <td>课程名称</td>
  <td colspan="5"><?php echo $course; ?></td>
  <td>周学时</td>
  </tr>
  <tr height="25">
    <td width="100">学号</td>
    <td width="80">姓名</td>
    <td width="40">平时</td>
    <td width="40">期中</td>
    <td width="40">实验</td>
    <td width="40">期末</td>
    <td width="60">总成绩</td>
    </tr>
 <?php
for($i=0;$i<30;$i++){
$e_score="";
$info=mysql_fetch_array($sql);
$s_id=$info["s_id"];
$score=$info["score"];
$bk_score=$info["bk_score"];
$ck_score=$info["ck_score"];
$sql1=mysql_query("select s_no,s_name from tb_s_information where ID='$s_id';");
$info1=mysql_fetch_array($sql1);
$s_no=$info1["s_no"];
$s_name=$info1["s_name"];
if($bk_score==NULL) $e_score=$score;
elseif($ck_score==NULL) $e_score=$bk_score;
else $e_score=$ck_score;
?>
<tr height="25">
    <td>&nbsp;<?php echo $s_no; ?></td>
    <td>&nbsp;<?php echo $s_name; ?></td>
    <td>&nbsp;<?php if($info1==true) echo"--";?></td>
    <td>&nbsp;<?php if($info1==true) echo"--";?></td>
    <td>&nbsp;<?php if($info1==true) echo"--";?></td>
    <td>&nbsp;<?php if($info1==true) echo"--";?></td>
    <td class="course_left1">&nbsp;<?php echo $e_score; ?></td>
</tr>
<?php
}	

?>
<tr height="25">
<td rowspan="7">成绩总结</td>
<td colspan="3">应参加考试人数</td>
<td colspan="3">人</td>
</tr>
<tr height="25">
<td colspan="3">实际参加考试人数</td>
<td colspan="3">人</td>
</tr>
<tr height="25">
<td colspan="3">&nbsp;</td>
<td colspan="3">人&nbsp;&nbsp;&nbsp;&nbsp;%</td>
</tr>
<tr height="25">
<td colspan="3">&nbsp;</td>
<td colspan="3">人&nbsp;&nbsp;&nbsp;&nbsp;%</td>
</tr>
<tr height="25">
<td colspan="3">&nbsp;</td>
<td colspan="3">人&nbsp;&nbsp;&nbsp;&nbsp;%</td>
</tr>
<tr height="25">
<td colspan="3">&nbsp;</td>
<td colspan="3">人&nbsp;&nbsp;&nbsp;&nbsp;%</td>
</tr>
<tr height="25">
<td colspan="3">&nbsp;</td>
<td colspan="3">人&nbsp;&nbsp;&nbsp;&nbsp;%</td>
</tr>
</table>
  </td>
  <td valign="top" style="border-right:1px solid #000; border-bottom:1px solid #000; border-right:none">
  <table width="400" cellspacing="0" cellpadding="0" class="course_right">
  <tr height="25">
  <td><?php echo $c_week_hour; ?></td>
   <td>学分</td>
  <td><?php echo $c_credit; ?></td>
  <td colspan="2">任课教师</td>
  <td colspan="2">&nbsp;<?php echo $c_teacher; ?></td>
  </tr>
  <tr height="25">
    <td width="100">学号</td>
    <td width="80">姓名</td>
    <td width="40">平时</td>
    <td width="40">期中</td>
    <td width="40">实验</td>
    <td width="40">期末</td>
    <td width="60">总成绩</td>
    </tr>
  <?php 
for($i=30;$i<60;$i++)
{
$info=mysql_fetch_array($sql);
$s_id=$info["s_id"];
$score=$info["score"];
$bk_score=$info["bk_score"];
$ck_score=$info["ck_score"];
$sql1=mysql_query("select s_no,s_name from tb_s_information where ID='$s_id';");
$info1=mysql_fetch_array($sql1);
$s_no=$info1["s_no"];
$s_name=$info1["s_name"];
if($bk_score==false) $e_score=$score;
elseif($ck_score==false) $e_score=$bk_score;
?>
<tr height="25">
    <td height="">&nbsp;<?php echo $s_no; ?></td>
    <td>&nbsp;<?php echo $s_name; ?></td>
    <td>&nbsp;<?php if($info1==true) echo"--";?></td>
    <td>&nbsp;<?php if($info1==true) echo"--";?></td>
    <td>&nbsp;<?php if($info1==true) echo"--";?></td>
    <td>&nbsp;<?php echo $e_score; ?></td>
    <td>&nbsp;<?php echo $e_score; ?></td>
</tr>
<?php
}	
?>
<tr height="181">
  <td colspan="7" >
  <?php
$sql2=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score<'60' and bk_score=NULL;");
$info2=mysql_fetch_array($sql2);
if($info2==false)echo "无补考名单";
else{
	$num=0;
	echo "补考名单：";
	do{
		$s_id=$info2["s_id"];
		$sql=mysql_query("select s_name from tb_s_iofomation where ID='$s_id';");
		$info=mysql_fetch_array($sql);
		$s_name=$info["s_name"];
		if($num==4||($num-4)/6==0) echo "<br/>";
 		echo $s_name."&nbsp;&nbsp;";
		$num++;
		}while($info2=mysql_fetch_array($sql2));
	}
	echo "<br/>";
$sql2=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and exam_type=1;");
$info2=mysql_fetch_array($sql2);
if($info2==false)echo "无缓考名单";
else{
	$num=0;
	echo "缓考名单：";
	do{
		$s_id=$info2["s_id"];
		$sql=mysql_query("select s_name from tb_s_iofomation where ID='$s_id';");
		$info=mysql_fetch_array($sql);
		$s_name=$info["s_name"];
		if($num==4||($num-4)/6==0) echo "<br/>";
 		echo $s_name."&nbsp;&nbsp;";
		$num++;
		}while($info2=mysql_fetch_array($sql2));
	}
		echo "<br/>";

$sql2=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and exam_type=2;");
$info2=mysql_fetch_array($sql2);
if($info2==false)echo "无缺考名单";
else{
	$num=0;
	echo "缺考名单：";
	do{
		$s_id=$info2["s_id"];
		$sql=mysql_query("select s_name from tb_s_iofomation where ID='$s_id';");
		$info=mysql_fetch_array($sql);
		$s_name=$info["s_name"];
		if($num==4||($num-4)/6==0) echo "<br/>";
 		echo $s_name."&nbsp;&nbsp;";
		$num++;
		}while($info2=mysql_fetch_array($sql2));
	}
		echo "<br/>";
  
   ?></td>
</tr>
</table>
</td>
</tr>
<tr height="25">
<td colspan="2">
<table width="802" cellpadding="0" cellspacing="0" class="course_bottom">
  <tr height="25">
    <td width="99" style="border-right-width:0px;">备注</td>
    <td>&nbsp;</td>
  </tr>
</table>

</td>
</tr>
</table>
<span class="span">阅卷人：</span><span class="span">录入人：</span><span class="span">复核人：</span><span class="span">日期：</span>
</body>
</html>