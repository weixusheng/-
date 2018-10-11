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
	if($way==0){
		mysql_query("UPDATE tb_score SET score = NULL where c_id = '$c_id' and s_term='$term';");
	}else if($way==1){
		mysql_query("UPDATE tb_score SET bk_score = NULL where c_id = '$c_id' and s_term='$term';");
	}else if($way==2){
		mysql_query("UPDATE tb_score SET ck1_score = NULL where c_id = '$c_id' and s_term='$term';");
	}else if($way==3){
		mysql_query("UPDATE tb_score SET ck2_score = NULL where c_id = '$c_id' and s_term='$term';");
	}else if($way==4){
		mysql_query("UPDATE tb_score SET ck3_score = NULL where c_id = '$c_id' and s_term='$term';");
	}
?>
清空完成
</body>
</html>