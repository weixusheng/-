<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body class="bgc">
<?php
include("../../function/conn.php");
	$term=$_POST["term"];
	$class=$_POST["class"];
	$cb_id=$_POST["cb_id"];
	$s_id=$_POST["s_no"];
if(isset($_POST["score_id"])==true){	
	$score_id=$_POST["score_id"];
	$j=count($score_id);
	for($i=0;$i<$j;$i++){
		mysql_query("delete from tb_score where ID='$score_id[$i]';");	
	}
}
mysql_query("call jidian0($s_id)");
echo "<script>alert('操作成功');window.location.href='xuanke.php?class=".$class."&term=".$term."&cb_id=".$cb_id."';</script>";
?>
</body>
</html>