<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>�ޱ����ĵ�</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body class="ziye_style">
<?php
include("../../function/conn.php");
mysql_query("set names gbk");
$s_no = isset($_GET['s_no'])?$_GET['s_no']:$_POST['s_no'];
if(isset($_POST['submit1'])){
	$topic=$_POST['topic'];
	$t_name=$_POST['t_name'];
	$topic=mysql_escape_string($topic);
	$sql=mysql_query("update graduation_design set grd_dsg='$topic',t_name='$t_name' where s_no='$s_no'");
	echo "<script>alert('�޸ĳɹ���');location.href='update_topic.php'</script>";
}
$sql1=mysql_query("select * from graduation_design where s_no='$s_no'");
$info1=mysql_fetch_array($sql1);
?>
<form name="form1" method="post" action="update_topic_save.php">
<table width="80%" align="center" border="1" cellpadding="0" cellspacing="0">
	<tr><td>�༶:</td><td><?php echo $info1['s_no'];?><input name="s_no" type="hidden" value="<?php echo $info1['s_no']?>" /></td></tr>
    <tr><td>������</td><td><?php echo $info1['s_name'];?></td></tr>
    <tr><td>�༶��</td><td><?php echo $info1['class'];?></td></tr>
    <tr><td>��Ŀ��</td><td><input type="text" name="topic" value="<?php echo $info1['grd_dsg'];?>" style="width:80%"/></td></tr>
    <tr><td>��ʦ��</td><td><input type="text" name="t_name" value="<?php echo $info1['t_name'];?>" /></td></tr>
    <tr><td colspan="2"><input type="submit" name="submit1" value="����" /></td></tr>
</table>
</form>
</body>
</html>