<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
c
</head>

<body class="ziye_style">
<?php
	$s_no=$_GET['s_no'];
	$s_class=$_POST['s_class'];
	$stu_status=$_POST['stu_status'];
	echo $down_term=$_POST['down_term'];
	include('../../function/conn.php');
	
	if($_POST['stu_status']=='4')
	{
		$sql=mysql_query("select class_name from tb_class where ID=$s_class");
	$info=mysql_fetch_array($sql);
	$class_name=$info['class_name'];
	
	    $sql1=mysql_query("select  class1,class2 from tb_s_information where s_no='$s_no'");
	$info1=mysql_fetch_array($sql1);
	$class1=$info1['class1'];
	$class2=$info1['class2'];
	if($class1=='') 
	{
		mysql_query("update tb_s_information set class1='$class_name',stu_status='$stu_status',down_term1='$down_term'  where s_no='$s_no'");
		mysql_query("call jiangji_stu('$s_no','$s_class','$down_term')");
	echo "<script>alert('修改成功！');location.href='change_class.php'</script>";	
		}
	else
	{
		mysql_query("update tb_s_information set class2='$class_name',stu_status='$stu_status',down_term2='$down_term'  where s_no='$s_no'");
		mysql_query("call jiangji_stu('$s_no','$s_class','$down_term')");
	echo "<script>alert('修改成功！');location.href='change_class.php'</script>";	
		}
		}
else
{
	mysql_query("update tb_s_information set stu_status='$stu_status'  where s_no='$s_no'");
	echo "<script>alert('修改成功！');location.href='change_class.php'</script>";	
	}

?>
</body>
</html>