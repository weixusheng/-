<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<table width='200' border='1' cellspacing='0' cellpadding='0'>
	<tr>
		<td>学年学期</td><td>学号</td><td>姓名</td><td>班级</td><td>课程编号</td><td>课程名称</td><td>学时</td><td>学分</td><td>成绩</td><td>考试性质</td><td>考试状态</td>
	</tr>
<?php 
include("function/conn.php");
$sql=mysql_query("select * from stu_info where grade='2012' and major='国际经济与贸易'");
$info=mysql_fetch_array($sql);
do {
	$c_no=$info['c_no'];
	$gsql=mysql_query("select ID from tb_course_base where c_id='$c_no'");
	$ginfo=mysql_fetch_array($gsql);
	$cb_id=$ginfo['ID'];	
	$asql=mysql_query("select c_week_hour from tb_course2_term where cb_id='$cb_id'");
	$ainfo=mysql_fetch_array($asql);
?>
		<tr>
            <td><?php echo $info['term']?></td>
            <td><?php echo $info['s_no']?></td>
            <td><?php echo $info['s_name']?></td>
            <td><?php echo $info['s_class']?></td>
            <td><?php echo $info['c_no']?></td>
            <td><?php echo $info['c_name']?></td>
            <td><?php echo $ainfo['c_week_hour']?></td>
            <td><?php echo $info['credit']?></td>
            <td><?php echo $info['bk_score']?></td>
            <td><?php echo "重考"?></td>
            <td><?php echo $info['exam_type']?></td>
		</tr>

<?php
}while($info=mysql_fetch_array($sql))
?>
    <tr>
    </tr>
</table>

<body>
</body>
</html>