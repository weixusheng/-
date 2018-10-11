<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
</head>

<body class="bgc">
<?php
include("../../function/conn.php");
$grade=$_POST["grade"];
$term=$_POST["term"];
$class_name=$_POST["class_name"];
$course_no=$_POST["course_no"];
$c_credit=$_POST["c_credit"];
$c_stu_num=$_POST["c_stu_num"];
$mon_hour=$_POST["mon_hour"];
$tue_hour=$_POST["tue_hour"];
$wed_hour=$_POST["wed_hour"];
$thu_hour=$_POST["thu_hour"];
$fri_hour=$_POST["fri_hour"];
$sat_hour=$_POST["sat_hour"];
$sun_hour=$_POST["sun_hour"];
$repeat_time=$_POST["repeat_time"];
$major=$_POST["major"];
$course_week_hour=$_POST["course_week_hour"];
$teacher=$_POST["teacher"];
$type=$_POST["type"];
$sql=mysql_query("select ID from tb_course_base where c_id='$course_no';");
$info=mysql_fetch_array($sql);
$ID=$info["ID"];
mysql_query("insert into tb_course1_term (grade,term,c_class,c_id,credit,c_week_hour,c_teacher,c_kind,c_stu_num,mon_hour,tue_hour,wed_hour,thu_hour,fri_hour,sat_hour,sun_hour,repeat_time,major)          values('$grade','$term','$class_name','$course_no','$c_credit','$course_week_hour','$teacher','$type','$c_stu_num','$mon_hour','$tue_hour','$wed_hour','$thu_hour','$fri_hour','$sat_hour','$sun_hour','$repeat_time','$major');");
mysql_query("insert into tb_course2_term (grade,term,c_class,cb_id,credit,c_week_hour,c_teacher,c_kind)          values('$grade','$term','$class_name','$ID','$c_credit','$course_week_hour','$teacher','$type');");
echo "<script>alert('课程添加成功');window.location.href='add_course.php';</script>"; 
?>
</body>
</html>