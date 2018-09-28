<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
body {
	font-size:13px;
}
td {
	text-align:center;
}
</style>
<script language=javascript>  
function doPrint() {  
bdhtml=window.document.body.innerHTML;    
sprnstr="<!--startprint-->";    
eprnstr="<!--endprint-->";  
prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);    
prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));    
window.document.body.innerHTML=prnhtml;    
window.print(); 
}
</SCRIPT>
</head>

<body class="bgc" style="text-align:center;">
<?php
error_reporting(0);
include("../../function/conn.php");
$way=$_POST["way"];  
$term=$_POST["term"];
$class=$_POST["class_name"];
$cb_id=$_POST["subject"];
$sql=mysql_query("select ID,speciality,grade_code from tb_class where class_name='$class';");
$info=mysql_fetch_array($sql);
$major=$info["speciality"];
$grade_code=$info["grade_code"];
$class_id=$info["ID"];
$sql=mysql_query("select c_longname,c_credit from tb_course_base where ID='$cb_id';");
$info=mysql_fetch_array($sql);
$course=$info["c_longname"];

$sql_as=mysql_query("select ID,c_week_hour,c_teacher,credit from tb_course2_term where cb_id='$cb_id' and c_class='$class' and term='$term';");
$info_as=mysql_fetch_array($sql_as);
$c_week_hour=$info_as["c_week_hour"];
$c_credit=$info_as["credit"];
$c_teacher=$info_as["c_teacher"];
$c_id=$info_as["ID"];
?>
<input type="button" name="button1" value="导为Excel" onclick="location.href='../export_course_score.php?term=<?php echo $term;?>&classes0=<?php echo $class_id?>&cb_id=<?php echo $cb_id?>&way=<?php echo $way; ?>'" />
<input type="button" name="button2" value="全部清空" onclick="location.href='delete_course_score.php?term=<?php echo $term;?>&c_id=<?php echo $c_id?>&way=<?php echo $way; ?>'" />
<!--startprint-->
<table width="600" cellspacing="0" cellpadding="0" class="course_zhubiao" align="center" style="border:none; height:auto;">
<caption><span class="caption">东北电力大学&nbsp;&nbsp;&nbsp;&nbsp;学生考核成绩登录表（正考）</span><br />
年级:［<?php echo $grade_code; ?>］学院:［经济管理学院］专业:［<?php echo $major; ?>］班级:［<?php echo $class; ?>］学年学期:［<?php echo $term; ?>］<br />
</caption>
<?php  
$sql=mysql_query("select ID,s_name,s_no from tb_s_information where now_class='$class' and (stu_status='0' or stu_status='1' or stu_status='4');");
?>
<tr>
<td valign="top" style="border-right:1px solid #000; border-bottom:1px solid #000">
  <table width="320" cellspacing="0" cellpadding="0" class="course_left">
  <tr height="30">
  <td>课程名称</td>
  <td colspan="5" align="left"><?php echo $course; ?></td>
  <td>学时</td>
  </tr>
  <tr height="25">
    <td width="100">学号</td>
    <td width="80">姓名</td>
    <td width="50">平时</td>
    <td width="50">期中</td>
    <td width="40">实验</td>
    <td width="40">期末</td>
    <td width="60">总成绩</td>
    </tr>
 <?php
for($i=0;$i<30;$i++){
$info=mysql_fetch_array($sql);
$s_id=$info["ID"];
$s_name=$info["s_name"];
$s_no=$info["s_no"];
$sql1=mysql_query("select score,bk_score,ck1_score,ck2_score,ck3_score from tb_score where s_id='$s_id' and s_term='$term' and c_id='$c_id';");
$info1=mysql_fetch_array($sql1);
switch($way){
	case '0':$score=$info1["score"];break;
	case '1':$score=$info1["bk_score"];break;
	case '2':$score=$info1["ck1_score"];break;
	case '3':$score=$info1["ck2_score"];break;
	case '4':$score=$info1["ck3_score"];break;
	}
?>
<tr height="20">
    <td>&nbsp;<?php echo $s_no; ?></td>
    <td>&nbsp;<?php echo $s_name; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="course_left1">&nbsp;<?php if($major=="国际经济与贸易"){
							switch($score){
								case "95":$score="A";break;
								case "92":$score="A-";break;
								case "89":$score="B+";break;
								case "85":$score="B";break;
								case "82":$score="B-";break;
								case "79":$score="C+";break;
								case "75":$score="C";break;
								case "72":$score="C-";break;
								case "69":$score="D+";break;
								case "65":$score="D";break;
								case "0":$score="F";break;
								case "":$score="";break;	
								}
							}echo $score; ?>
   </td>
</tr>
<?php
}	
?>
<?php
switch ($way){
	case '0':
			$asql=mysql_query("select count(ID) as all_num from tb_s_information where now_class='$class' and stu_status='0';");
			$dsql=mysql_query("select count(ID) as shiji_num from tb_score where exam_type='0' and s_term='$term' and c_id='$c_id';");
			$sql3=mysql_query("select count(ID) as part from tb_score where s_term='$term' and c_id='$c_id' and score>=90");
			$info3=mysql_fetch_array($sql3);
			$part1=$info3["part"];
			$sql4=mysql_query("select count(ID) as part from tb_score where s_term='$term' and c_id='$c_id' and score<90 and score>=80;");
			$info4=mysql_fetch_array($sql4);
			$part2=$info4["part"];
			$sql5=mysql_query("select count(ID) as part from tb_score where s_term='$term' and c_id='$c_id' and score<80 and score>=70;");
			$info5=mysql_fetch_array($sql5);
			$part3=$info5["part"];
			$sql6=mysql_query("select count(ID) as part from tb_score where s_term='$term' and c_id='$c_id' and score<70 and score>=60;");
			$sql7=mysql_query("select count(ID) as part from tb_score where s_term='$term' and c_id='$c_id' and score<60 and exam_type!='2' and exam_type!='3';");
			break;
	case '1':
			$asql=mysql_query("select count(ID) as all_num from tb_score where s_term='$term' and bk_score is not NULL  and c_id='$c_id';");
			$dsql=mysql_query("select count(ID) as shiji_num from tb_score where s_term='$term' and bk_type!='2' and bk_score is not NULL  and c_id='$c_id';");
			$sql6=mysql_query("select count(ID) as part from tb_score where s_term='$term' and c_id='$c_id' and bk_score<70 and bk_score=60;");
			$sql7=mysql_query("select count(ID) as part from tb_score where s_term='$term' and c_id='$c_id' and bk_score<60 and bk_type!='2';");
			$part1=0;$part2=0;$part3=0;
			break;
}



$ainfo=mysql_fetch_array($asql);
$all_num=$ainfo["all_num"];
$dinfo=mysql_fetch_array($dsql);
$info6=mysql_fetch_array($sql6);
$part4=$info6["part"];
$info7=mysql_fetch_array($sql7);
$part5=$info7["part"];
if($all_num==0)
$temp=0;
else
{
  $part1_a=number_format($part1/$all_num*100,2);
  $part2_a=number_format($part2/$all_num*100,2);
  $part3_a=number_format($part3/$all_num*100,2);
  $part4_a=number_format($part4/$all_num*100,2);
  $part5_a=number_format($part5/$all_num*100,2);
	}

?>
<tr height="27">
<td rowspan="7">成绩总结</td>
<td colspan="3">应参加考试人数</td>
<td colspan="3"><?php echo $all_num; ?>&nbsp;人</td>
</tr>
<tr height="20">
<td colspan="3">实参加考试人数</td>
<td colspan="3"><?php echo $dinfo["shiji_num"];?>&nbsp;人</td>
</tr>
<tr height="20">
<td colspan="3">90—100(含90)</td>
<td colspan="3"><?php echo $part1; ?>&nbsp;人&nbsp;&nbsp;<?php if($all_num==0) echo 0; else echo $part1_a; ?>&nbsp;%</td>
</tr>
<tr height="20">
<td colspan="3">80—90（含80）</td>
<td colspan="3"><?php echo $part2; ?>&nbsp;人&nbsp;&nbsp;<?php if($all_num==0) echo 0; else echo $part2_a; ?>&nbsp;%</td>
</tr>
<tr height="20">
<td colspan="3">70—80（含70）</td>
<td colspan="3"><?php echo $part3; ?>&nbsp;人&nbsp;&nbsp;<?php if($all_num==0) echo 0; else echo $part3_a; ?>&nbsp;%</td>
</tr>
<tr height="20">
<td colspan="3">60—70（含60）</td>
<td colspan="3"><?php echo $part4; ?>&nbsp;人&nbsp;&nbsp;<?php if($all_num==0) echo 0; else echo $part4_a; ?>&nbsp;%</td>
</tr>
<tr height="20">
<td colspan="3">&lt;60</td>
<td colspan="3"><?php echo $part5; ?>&nbsp;人&nbsp;&nbsp;<?php if($all_num==0) echo 0; else echo $part5_a; ?>&nbsp;%</td>
</tr>
</table>
  </td>
  <td valign="top" style="border-right:1px solid #000; border-bottom:1px solid #000; border-right:none">
  <table width="320" cellspacing="0" cellpadding="0" class="course_right">
  <tr height="30">
  <td><?php echo $c_week_hour; ?></td>
   <td>学分</td>
  <td><?php echo $c_credit; ?></td>
  <td colspan="2">任课教师</td>
  <td colspan="2">&nbsp;<?php echo $c_teacher; ?></td>
  </tr>
  <tr height="25">
    <td width="100">学号</td>
    <td width="80">姓名</td>
    <td width="50">平时</td>
    <td width="50">期中</td>
    <td width="40">实验</td>
    <td width="40">期末</td>
    <td width="60">总成绩</td>
    </tr>
  <?php 
for($i=30;$i<60;$i++)
{
$info=mysql_fetch_array($sql);
$s_id=$info["ID"];
$s_name=$info["s_name"];
$s_no=$info["s_no"];
$sql1=mysql_query("select score,bk_score,ck1_score,ck2_score,ck3_score from tb_score where s_id='$s_id' and s_term='$term' and c_id='$c_id';");
$info1=mysql_fetch_array($sql1);
switch($way){
	case '0':$score=$info1["score"];break;
	case '1':$score=$info1["bk_score"];break;
	case '2':$score=$info1["ck1_score"];break;
	case '3':$score=$info1["ck2_score"];break;
	case '4':$score=$info1["ck3_score"];break;
	}
?>
<tr height="20">
    <td height="">&nbsp;<?php echo $s_no; ?></td>
    <td>&nbsp;<?php echo $s_name; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;<?php if($major=="国际经济与贸易"){
							switch($score){
								case "95":$score="A";break;
								case "92":$score="A-";break;
								case "89":$score="B+";break;
								case "85":$score="B";break;
								case "82":$score="B-";break;
								case "79":$score="C+";break;
								case "75":$score="C";break;
								case "72":$score="C-";break;
								case "69":$score="D+";break;
								case "65":$score="D";break;
								case "0":$score="F";break;
								case "":$score="";break;	
								}
							}echo $score; ?></td>
</tr>
<?php
}
?>
<tr height="147">
  <td colspan="7" align="left" valign="top" style="line-height:18px; text-align:left;">
  <?php
 if($way==0){
	$sql2=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where now_class='$class') and c_id='$c_id' and score<'60'  and exam_type!='2' and exam_type!='3';");
	$info2=mysql_fetch_array($sql2);
	if($info2==false)echo "";
	else{
		$num=0;
		echo "补考名单："."<br/>";
		do{
			$num++;
			$s_id=$info2["s_id"];
			$sql=mysql_query("select s_name from tb_s_information where ID='$s_id';");
			$info=mysql_fetch_array($sql);
			$s_name=$info["s_name"];
			if($num%7==0) echo "<br/>";
			echo $s_name."&nbsp;&nbsp;";
			}while($info2=mysql_fetch_array($sql2));
		}
		echo "<br/>";
	$sql2=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where now_class='$class') and c_id='$c_id' and exam_type=1;");
	$info2=mysql_fetch_array($sql2);
	if($info2==false)echo "";
	else{
		$num=0;
		echo "缓考名单：<br/>";
		do{
			$num++;
			$s_id=$info2["s_id"];
			$sql=mysql_query("select s_name from tb_s_information where ID='$s_id';");
			$info=mysql_fetch_array($sql);
			$s_name=$info["s_name"];
			if($num%7==0) echo "<br/>";
			echo $s_name."&nbsp;&nbsp;";
			}while($info2=mysql_fetch_array($sql2));
		}
			echo "<br/>";
	
	$sql2=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where now_class='$class') and c_id='$c_id' and exam_type=2;");
	$info2=mysql_fetch_array($sql2);
	if($info2==false)echo "";
	else{
		$num=0;
		echo "缺考名单：<br/>";
		do{
			$num++;
			$s_id=$info2["s_id"];
			$sql=mysql_query("select s_name from tb_s_information where ID='$s_id';");
			$info=mysql_fetch_array($sql);
			$s_name=$info["s_name"];
			if($num%7==0) echo "<br/>";
			echo $s_name."&nbsp;&nbsp;";
			}while($info2=mysql_fetch_array($sql2));
		}
			echo "<br/>";
	 $sql2=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where now_class='$class') and c_id='$c_id' and exam_type=3;");
	$info2=mysql_fetch_array($sql2);
	if($info2==false)echo "";
	else{
		$num=0;
		echo "禁考名单：<br/>";
		do{
			$num++;
			$s_id=$info2["s_id"];
			$sql=mysql_query("select s_name from tb_s_information where ID='$s_id';");
			$info=mysql_fetch_array($sql);
			$s_name=$info["s_name"];
			if($num%7==0) echo "<br/>";
			echo $s_name."&nbsp;&nbsp;";
			}while($info2=mysql_fetch_array($sql2));
		}
			echo "<br/>";
}
?>&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr height="25">
<td colspan="2" style="border:none;">
    <table width="641" border="0" cellpadding="0" cellspacing="0" class="course_bottom">
      <tr height="25">
        <td width="72" style="border-width:1px; border-right-width:0px;">备注</td>
        <td width="569" style="border-width:1px;">&nbsp;</td>
      </tr>
    </table>

</td>
</tr>
</table>
<div style="margin:0; padding:0; text-align:center">
<span class="span" style="text-align:center">阅卷人：</span><span class="span">录入人：</span><span class="span">复核人：</span><span class="span">日期：</span>
</div>
<!--endprint-->

<a href="javascript:;" onClick="doPrint()">打印</a> 
</body>
</html>