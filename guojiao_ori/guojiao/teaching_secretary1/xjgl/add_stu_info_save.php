<!DOCTYPE html PUBLIC "-//W3C//DTD s_noTML 1.0 Transitional//EN" "http://www.w3.org/TR/s_notml1/DTD/s_notml1-transitional.dtd">
<html s_namelns="http://www.w3.org/1999/s_notml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include("../../function/conn.php"); 
$s_no=$_POST["s_no"];
$s_name=$_POST["s_name"];
$s_sex=$_POST["s_sex"];
$s_bir=$_POST["s_bir"];
$s_id=$_POST["s_id"];
$s_class=$_POST["s_class"];
$s_home=$_POST["s_home"];
$s_pol=$_POST["s_pol"];
$s_ent=$_POST["s_ent"];
$nation=$_POST["nation"];
$bank_num=$_POST["bank_num"];
$is_dragon=$_POST["is_dragon"];
if($is_dragon=="是") 
$is_dragon="0";
else
$is_dragon="1";
$s_pwd=substr($s_no,-6,6);
//if(substr($s_class,0,3)=="电"){$zhuanye="电气工程及其自动化";}
//if(substr($s_class,0,3)=="经"){$zhuanye="国际经济与贸易";}
mysql_query("insert into tb_s_information(s_no,s_name,s_sex,s_birthday,s_id_card,s_home,s_politics,s_class,now_class,s_entrance_date,nation,bank_num,is_dragon) values('$s_no','$s_name','$s_sex','$s_bir','$s_id','$s_home','$s_pol','$s_class','$s_class','$s_ent','$nation','$bank_num','$is_dragon')",$conn);
echo "<script>alert('添加成功');window.location.href='add_stu_info.php'</script>";
mysql_query("insert into tb_s_password(no,pwd) values('$s_no','$s_pwd');")
?>
</body>
</html>