<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="ziye_style">
<table width="" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" width="80">排名</td>
    <td align="center" width="100">任课教师</td>
    <td align="center" width="190">课程名称</td>
    <td align="center" width="80">得分</td>
    <td align="center" width="80">评教人数</td>
  </tr>
<?php
include("../../function/conn.php");
$term=$_POST["term"];
$prf=$_POST["prf"];
date_default_timezone_set("PRC");
$year=date("Y");
$mon=date("m");
if($mon<9)
$year=$year-1;
for($j=0;$j<4;$j++)
{
	$g_year=$year-$j;
	echo "<tr>"."<td colspan='5' height='40' align='center'>"."<strong>".$g_year."级"."</strong>"."</td>"."</tr>";
	$sql=mysql_query("select cb_id,c_teacher from tb_course2_term where c_class in(select class_name from tb_class where speciality=
'$prf' and grade_code='$g_year') and term='$term' group by cb_id,c_teacher");
	$info=mysql_fetch_array($sql);
	do {	
		$c_teacher=$info['c_teacher'];
		$cb_id=$info["cb_id"];
		$gsql=mysql_query("select c_longname from tb_course_base where ID='$cb_id'");
		$ginfo=mysql_fetch_array($gsql);
		$c_longname=$ginfo["c_longname"];
		$hsql=mysql_query("select avg(sum_evaluate) as avg,count(*) as num from tb_evaluate where c_id in (SELECT ID FROM tb_course2_term WHERE cb_id='$cb_id' and `c_teacher`='$c_teacher' and grade='$g_year')");
		$hinfo=mysql_fetch_array($hsql);
		$avg=$hinfo["avg"];
		$num=$hinfo["num"];
		mysql_query("insert into tb_red_evaluate(grade,teacher,class_name,credit,zongren) values('$g_year','$c_teacher','$c_longname','$avg
','$num')");
	}while($info=mysql_fetch_array($sql));
	
	//以下用来循环读取新表中的数据，并排名
	$i=1;
	$wsql=mysql_query("select teacher,class_name,credit,zongren from tb_red_evaluate where grade='$g_year' order by credit desc");
	$winfo=mysql_fetch_array($wsql);
	do {
		$c_teacher=$winfo["teacher"];
		$c_longname=$winfo["class_name"];
		$avg=$winfo["credit"];
		$num=$winfo["zongren"];
	 ?>	
	 <tr>
		<td align="center"><?php echo $i?>&nbsp;</td>
		<td align="center"><?php echo $c_teacher?>&nbsp;</td>
		<td align="center"><?php echo $c_longname?>&nbsp;</td>
		<td align="center"><?php echo number_format($avg,2);?>&nbsp;</td>
        <td align="center"><?php echo $num;?>&nbsp;</td>
	  </tr>
	<?php
	 $i++;
	}while($winfo=mysql_fetch_array($wsql));
}
mysql_query("TRUNCATE TABLE `tb_red_evaluate`");
?>
</table>
</body>
</html>