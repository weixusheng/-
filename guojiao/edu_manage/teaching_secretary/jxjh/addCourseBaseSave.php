<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include("../../function/conn.php");
$Num=$_POST["Num"];
$ShortName=$_POST["ShortName"];
$LongName=$_POST["LongName"];
$EnName=$_POST["EnName"];
$Office=$_POST["Office"];
$Type=$_POST["Type"];
date_default_timezone_set("PRC");
$time=strtotime(date('Y-m-d H:i:s'));
switch($Type){
	case '1':$Type="基础教育课";break;
	case '2':$Type="学科基础课";break;
	case '3':$Type="专业课";break;
	case '4':$Type="实践环节";break;
	default:$Type="";break;
	}
$Credit=$_POST["Credit"];
$TestType=$_POST["TestType"];
mysql_query("insert into tb_course_base(c_id,c_shortname,c_longname,c_englishname,c_office,c_type,c_credit,c_test_type,c_addtime) values('$Num','$ShortName','$LongName','$EnName','$Office','$Type','$Credit','$TestType','$time');");
echo "<script>alert('课程添加成功');window.location.href='add_BaseCourse.php';</script>";
?>
</body>
</html>