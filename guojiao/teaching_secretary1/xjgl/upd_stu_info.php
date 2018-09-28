<!DOCTYPE html PUBLIC "-//W3C//DTD s_noTML 1.0 Transitional//EN" "http://www.w3.org/TR/s_notml1/DTD/s_notml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/s_notml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="bgc">
<?php 
include("../../function/conn.php");
$id=$_POST["ID"];
$s_no=$_POST["s_no"];
$s_name=$_POST["s_name"];
$s_sex=$_POST["s_sex"];
$s_bir=$_POST["s_bir"];
$s_id=$_POST["s_id"];
$s_home=$_POST["s_home"];
$s_pol=$_POST["s_pol"];
$s_class=$_POST["s_class"];
$s_ent=$_POST["s_ent"];
$nation=$_POST["nation"];
$bank_id=$_POST["bank_id"];
$is_dragon=$_POST["is_dragon"];
mysql_query("UPDATE tb_s_information SET s_no='$s_no',s_name='$s_name',s_sex='$s_sex',s_birthday='$s_bir',s_id_card='$s_id',s_home='$s_home',s_politics='$s_pol',s_class='$s_class',nation='$nation',is_dragon='$is_dragon',bank_num='$bank_id' where ID=$id",$conn);
echo "<script>alert('修改成功');window.location.href='rea_stu_info.php?class_name=".$s_class."'</script>";
?>
</body>
</html>