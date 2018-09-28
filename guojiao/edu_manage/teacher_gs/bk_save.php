<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include("../function/conn.php");
$grade=$_POST["grade"];
$way1=$_POST["way1"];
$score_id=$_POST["score_id"];
$way=$_POST["way"];
	for($i=0;$i<count($grade);$i++){
		mysql_query("update tb_score set ck3_score='$grade[$i]' where ID=$score_id[$i];");
		}
	echo "<script type='text/javascript'>alert('成绩".$way."成功');window.location.href='{$way1}_bk_class.php';</script>";


?>
</body>
</html>