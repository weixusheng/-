<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
</head>

<body class="bgc">
  <?php
	include("../../function/conn.php");
	for($i=0;$i<$_POST["eee"];$i++) {
		$s_no=$_POST["s_no".$i];
		$score=$_POST["score".$i];
		$comment=$_POST["comment".$i];
		mysql_query("update gra_tpc_selection set score='$score',comment='$comment' where s_no='$s_no'");
		echo "<script>alert('导入成功');location.href='add_score.php'</script>";
	}
  ?>
</body>
</html>