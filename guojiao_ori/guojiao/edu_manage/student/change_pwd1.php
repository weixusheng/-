<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	include("../function/conn.php");
?>
<?php //echo "原密码：".$_POST['pwd']."<br>";?>
<?php //echo "新密码：".$_POST['npwd']."<br>";?>
<?php //echo "密码确认：".$_POST['qrpwd']; ?>
<?php 
      $s_no=$_SESSION["no"];
	  $pwd=$_POST['pwd']; 
      $npwd=$_POST['npwd'];
      $db_pwd=mysql_query("select pwd from tb_s_password where no='$s_no'");
      $goin=mysql_fetch_array($db_pwd);
	  $ypwd=$goin['pwd'];
	  ?>
<?php if($pwd==$ypwd)
		{
			mysql_query("update tb_s_password set pwd='$npwd' where no='$s_no'"); 
			echo("<script> alert('修改成功！');window.location.href='change_pwd.php' </script>");
	
		}
	  else
		{
     		echo("<script> alert('原密码错误，修改失败！');window.location.href='change_pwd.php' </script>");	
		}
	
	 ?>
</body>
</html>