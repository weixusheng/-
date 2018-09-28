<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="bgc">
<table border="1" cellspacing="0" cellpadding="0" width="98%">
  <tr>
    <th>题目</th>
    <th>题目方向</th>
    <th>题目简介</th>
    <th>指导教师</th>
    <th>学生学号</th>
    <th>学生姓名</th>
    <th>班级</th>
    <th>限制人数</th>
    <th>成绩</th>
  </tr>

<?php
	include("../../function/conn.php");
	$t_num=$_POST["t_no"];
	$sql=mysql_query("select ID,t_num,topic_name,tpc_direction,tpc_intrd,lim_num from graduation_design where t_num='$t_num'");
	$info=mysql_fetch_array($sql);
	do {
		$tpc_id=$info["ID"];
		$t_no=substr($info["t_num"],4,4);
		$topic_name=$info["topic_name"];
		$tpc_direction=$info["tpc_direction"];
		$tpc_intrd=$info["tpc_intrd"];
		$lim_num=$info["lim_num"];
		$gsql=mysql_query("select t_name from tb_teacher_base where t_no='$t_no'");
		$ginfo=mysql_fetch_array($gsql);
		$tsql=mysql_query("select s_no,score from gra_tpc_selection where tpc_id='$tpc_id'");
		$tinfo=mysql_fetch_array($tsql);
		$s_no=$tinfo["s_no"];
		$score=$tinfo["score"];
		$hsql=mysql_query("select s_name,s_class from tb_s_information where s_no='$s_no'");
		$hinfo=mysql_fetch_array($hsql);
		$s_name=$hinfo["s_name"];
		$s_class=$hinfo["s_class"];
?>
<tr>
    <td width="12%"><?php echo $topic_name?>&nbsp;</td>
    <td width="7%"><?php echo $tpc_direction?>&nbsp;</td>
    <td width="45%"><?php echo $tpc_intrd?>&nbsp;</td>
    <td width="7%"><?php echo $ginfo["t_name"]?>&nbsp;</td>
    <td width="7%"><?php echo $s_no?>&nbsp;</td>
    <td width="7%"><?php echo $s_name?>&nbsp;</td>
    <td width="6%"><?php echo $s_class?>&nbsp;</td>
    <td width="3%"><?php echo $lim_num?>&nbsp;</td>
    <td width="5%"><?php if($score!=''){echo $score;}
	else {echo "暂无";}?></td>

  </tr>
<?php
}while($info=mysql_fetch_array($sql))
?>
</table>
</body>
</html>