<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php  
include("../../function/conn.php");
if($_POST["can_pingjiao"]==1){
	$term=$_POST['term'];
	mysql_query("update tb_system set value='1' where variable='can_pingjiao'");
	mysql_query("update tb_system set value='$term' where variable='pingjiao_term'");
	echo "<script>alert('开启评教成功');window.location.href='can_pingjiao.php'</script>";
	}else 	{
		mysql_query("update tb_system set value='0' where variable='can_pingjiao'");
		mysql_query("update tb_system set value=NULL where variable='pingjiao_term'");
	    echo "<script>alert('关闭评教成功');window.location.href='can_pingjiao.php'</script>";
	}

?>
</body>
</html>
