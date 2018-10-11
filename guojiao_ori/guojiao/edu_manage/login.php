<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body style="height:200px">
<?php
include("function/conn.php");
$_GET["type"];
$type=$_POST["idtype"];
$username=$_POST["username"];
$password=$_POST["pwd"];
if($type==1){$table="tb_s_password";}
if($type==2){$table="tb_t_password";}
if($type==3){$table="tb_a_password";}
if($type==4||$type==5){$table="tb_gs_password";}
$sql=mysql_query("select no,pwd from $table where no='$username'");
$info=mysql_fetch_array($sql);
if($info['pwd']==$password){
	if($type==1){echo "<script>location.href='student/student_index.php'</script>";}
	if($type==2){echo "<script>location.href='teacher/teacher_index.php'</script>";}
	if($type==3){echo "<script>location.href='teaching_secretary/secretary_index.php?s_no=$username'</script>";}
	if($type==4){echo "<script>location.href='teacher_gs/gs_index.php'</script>";}
	if($type==5){echo "<script>location.href='teacher_gs/gs_index0.php'</script>";}
	$_SESSION["no"]=$username;
}
else{
	echo "<script>alert('密码输入错误！请核对密码');location.href='/sem.nedu.edu.cn'</script>";
}
?>
</body>
</html>