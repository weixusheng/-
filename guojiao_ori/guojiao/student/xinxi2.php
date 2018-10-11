<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

</head>

<body>
<?php
require '../function/conn.php';
require '../function/common.php';
mysql_query("set names utf8");
 $s_no=$_POST["s_no"];
 $s_name=$_POST["s_name"];
 $s_sex=$_POST["s_sex"];
 $s_birthday=$_POST["s_birthday"];
 $s_id_card=$_POST["s_id_card"];
 $s_home=$_POST["s_home"];
 $bank_num=$_POST["bank_num"];
$sql=mysql_query("update tb_s_information set s_name='$s_name',s_sex='$s_sex',s_birthday='$s_birthday',s_id_card='$s_id_card',s_home='$s_home',bank_num='$bank_num' where s_no='$s_no'",$conn);
                echo "<script>alert('修改成功');window.location.href='xinxi.php'</script>";
  
?>
</body>
</html>