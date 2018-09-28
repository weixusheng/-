<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
</head>

<body class="ziye_style">
<?php
  //error_reporting(0); 
  include("../../function/conn.php");
  date_default_timezone_set("PRC");
				$year=date("Y");
				$mon=date("m");
				if($mon<=7){
					$grade=$year-1;
				}
				else {
					$grade=$year;
				}
  $grade=$grade-3;
   ?>
<table width="80%" border="1" cellspacing="0" cellpadding="0">
  <caption>
  东北电力大学经济管理学院<?php echo $grade; ?>级毕业生无学位名单
  </caption>
  <tr>
    <td align="center">序号</td>
    <td align="center">学号</td>
    <td align="center">姓名</td>
    <td align="center">已得总学分</td>
    <td align="center">平均学分绩点</td>
    <td align="center">课程首次考试不及格门数</td>
  </tr>
  <?php
 	//初始化临时表
	$sql0=mysql_query("drop table if exists temp");
	$sql00=mysql_query("create table temp(sno varchar(20) not null,name varchar(20) not null,num int,jidian float,all_credit float);");
 	//条件1  首次考试不及格科目超过16科，并将结果存入临时表
	$sql01=mysql_query("insert into temp(sno,name,num) select s_no,s_name,count(*) from stu_info where score<60 and grade='$grade' group by s_name having count(*)>16;");
	//条件2  平均学分绩点<65
	$sql02=mysql_query("insert into temp(sno,name,jidian) select s_no,s_name,sum(point*upload_credit)/sum(upload_credit) as jidian from jiangji where grade_code='$grade' group by s_name having jidian<65;");
	//条件3  总学分要求
	//从数据库查出各专业最低要求学分
	$sql03=mysql_query("select variable,value from tb_system where variable in('lowest_credit_jingmao','lowest_credit_dianqi')");
	$info03=mysql_fetch_array($sql03);
	$lowest_credit_jingmao=$info03['value'];;
	$info03=mysql_fetch_array($sql03);
	$lowest_credit_dianqi=$info03['value'];
	$sql04=mysql_query("insert into temp(sno,name,all_credit) SELECT s_no,s_name,sum(tm_credit) as all_credit from jiangji where grade_code='$grade' and major='国际经济与贸易' GROUP by s_name having all_credit<$lowest_credit_jingmao");
	$sql04=mysql_query("insert into temp(sno,name,all_credit) SELECT s_no,s_name,sum(tm_credit) as all_credit from jiangji where grade_code='$grade' and major='电气工程及其自动化' GROUP by s_name having all_credit<$lowest_credit_dianqi");
	
	//查询temp表中的结果
	$sql05=mysql_query("select * from temp order by sno");
	$info05=mysql_fetch_array($sql05);
	$num=0;   //序号用来计数
	do{
		$num++;
?>
  <tr>
    <td align="center" width="10%"><?php  echo $num; ?>&nbsp;</td>
    <td align="center" width="20%"><?php  echo $info05['sno']; ?>&nbsp;</td>
    <td align="center" width="20%"><?php  echo $info05['name']; ?>&nbsp;</td>
    <td align="center" width="10%"><?php  echo $info05['all_credit']; ?>&nbsp;</td>
    <td align="center" width="10%"><?php  echo $info05['jidian']; ?>&nbsp;</td>
    <td align="center" width="10%"><?php  echo $info05['num']; ?>&nbsp;</td>
  </tr>
  <?php
		}while($info05=mysql_fetch_array($sql05));
if($num==0){
?>
  <tr>
    <td colspan="8" align="center">无无学位名单</td>
  </tr>
  <?php	 
	}
  ?>
</table>
<br />
**表中为空的，表示该项满足要求；<br/>
**表中可能有重复学生信息，表明该生有多项未达到要求
<br />
<br />
</body>
</html>