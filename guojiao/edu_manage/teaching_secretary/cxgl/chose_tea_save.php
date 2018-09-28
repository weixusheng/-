<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include("../../function/conn.php");
$max=$_POST["max"];
for($i=1;$i<=$max;$i++) {
$cb_id=$_POST["ID".$i];
$t_no=$_POST["t_no".$i];
$asql=mysql_query("select ID from tb_course2_term where cb_id='$cb_id'");
$ainfo=mysql_fetch_array($asql);
do {
$c_id=$ainfo["ID"];
$sql=mysql_query("select ID from selc_tea_ls where c_id='$c_id'");
$info=mysql_fetch_array($sql);
do{
	$id=$info["ID"];
	mysql_query("update tb_chongxiu set cx_teacher='$t_no' where ID='$id'");
}while($info=mysql_fetch_array($sql));
}while($ainfo=mysql_fetch_array($asql));
}
mysql_query("TRUNCATE TABLE `selc_tea_ls`");
echo "<script>alert('选择成功');location.href='chose_tea.php';</script>"
?>
</body>
</html>