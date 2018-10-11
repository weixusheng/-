<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<body class="bgc" style="text-align:center;">
<?php
	include("../../function/conn.php");
	$term=$_GET["term"];
	$way=$_GET["way"];
	$c_id=$_GET["c_id"];
?>
<p>清除的成绩无法找回，需重新录入。</p>
	<input type="button" name="button" value="确认清空" onclick="location.href='delete_course_score1.php?term=<?php echo $term;?>&c_id=<?php echo $c_id?>&way=<?php echo $way; ?>'" />
</body>
</html>