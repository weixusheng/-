<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
<style>
.border_style {
	border-bottom:1px dotted #88AA99;
	}
</style>
</head>

<body class="bgcc">
<form action="score_save.php" method="post">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>毕业年份</th>
    <th>学号</th>
    <th>姓名</th>
    <th>班级</th>
    <th>题目</th>
    <th>教师</th>
    <th>成绩</th>
    <th>评语</th>
  </tr>
<?php
	date_default_timezone_set("PRC");$year=date("Y");
	include("../../function/conn.php");
	$i=0;
	$sql=mysql_query("select s_no,tpc_id from gra_tpc_selection");
	$info=mysql_fetch_array($sql);
	do {
		
		$s_no=$info["s_no"];
		$tpc_id=$info["tpc_id"];
		$gsql=mysql_query("select t_num,topic_name from graduation_design where ID='$tpc_id'");
		$ginfo=mysql_fetch_array($gsql);
		$t_no=substr($ginfo['t_num'],5,4);
		$tpc_name=$ginfo["topic_name"];
		$hsql=mysql_query("select t_name from tb_teacher_base where t_no='$t_no'");
		$hinfo=mysql_fetch_array($hsql);
		$tsql=mysql_query("select s_name,s_class from tb_s_information where s_no='$s_no'");
		$tinfo=mysql_fetch_array($tsql);
?>
  <tr>
  	<td align="center" class="border_style"><?php echo $year?>&nbsp;</td>
    <td align="center" class="border_style"><?php echo $s_no?>&nbsp;</td>
    <td align="center" class="border_style"><?php echo $tinfo['s_name']?>&nbsp;</td>
    <td align="center" class="border_style"><?php echo $tinfo['s_class']?>&nbsp;</td>
    <td align="center" class="border_style"><?php echo $tpc_name?>&nbsp;</td>
    <td align="center"class="border_style"><?php echo $hinfo['t_name']?>&nbsp;</td>
    <td align="center" class="border_style" width="70"><input name="<?php echo "score".$i?>" type="text" size="4" style="background:#BCCCDD; border:1px solid #FFF"/></td>
    <td align="center" class="border_style"><input name="<?php echo "comment".$i?>" type="text" style="background:#BCCCDD; border:1px solid #FFF"/></td>
		<input name="<?php echo "s_no".$i?>" type="hidden" value="<?php echo $s_no?>" />
        <input name="eee" type="hidden" value="<?php echo $i?>" />
  <tr>
<?php
	$i++;
	}while($info=mysql_fetch_array($sql))
?>
  <tr>
  	<td colspan="8"><input name="" type="submit" value="提交" /></td>
  </tr>
</table>
</form>
</body>
</html>