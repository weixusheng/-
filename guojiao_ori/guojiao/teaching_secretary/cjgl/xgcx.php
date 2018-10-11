<?php
include("../../function/conn.php");
if(isset($_POST['sno'])){
	$s_no=$_POST['sno'];
	echo "学号".$s_no;	
	$sql=mysql_query("select ID,s_class,s_name from tb_s_information where s_no='$s_no'");
	$info=mysql_fetch_array($sql);
	$s_id=$info['ID'];
	$s_class=$info['s_class'];
	echo "的班级是".$s_class."姓名为".$info['s_name'].".ID为".$s_id."<br/>";
}
if(isset($_POST['cname'])){
	$c_name=$_POST['cname'];
	$asql=mysql_query("select ID,c_id,c_longname from tb_course_base where c_longname like '%$c_name%'");
	$ainfo=mysql_fetch_array($asql);
	do {
		echo "课程编号为".$ainfo['c_id']."的课程名为".$ainfo['c_longname'];
		$cb_id=$ainfo['ID'];
		$bsql=mysql_query("select ID,c_class from tb_course2_term where cb_id=$cb_id and c_class='$s_class'");
		$binfo=mysql_fetch_array($bsql);
		if($binfo!=false){
		echo "相应的学期课程信息表中的ID为".$binfo['ID']."<br/>";
		}else{
			echo "无相应ID<br/>";
		}
	}while($ainfo=mysql_fetch_array($asql));
	echo "<br/>请在下方文本框输入你要查找的学生ID和学期课程信息表中的ID";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form name="form1" action="#" method="post">
学号：<input name="sno" type="text" />
科目名:<input name="cname" type="text" />
<input name="button1" type="submit" value="查询" />
</form>
<form name="form2" action="#" method="post">
学生ID：<input name="sid" type="text" />
科目ID:<input name="cid" type="text" />
<input name="button1" type="submit" value="查询" />
</form>
<?php
if(isset($_POST['cid'])&&isset($_POST['sid'])){
	$c_id=$_POST['cid'];
	$s_id=$_POST['sid'];
	$csql=mysql_query("select ID from tb_score where s_id=$s_id and c_id=$c_id");
	$cinfo=mysql_fetch_array($csql);
	echo "<br/><br/>成绩表中的ID为".$cinfo['ID'];;
}
?>
</body>
</html>