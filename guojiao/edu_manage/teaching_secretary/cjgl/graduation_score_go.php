<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
$s_no=$_POST['s_no'];
$type0=$_POST['type'];
if($type0==2){
	echo "<script>location.href='graduation_score_en.php?s_no=".$s_no."'</script>";
}else{
	echo "<script>location.href='graduation_score_cn.php?s_no=".$s_no."'</script>";
}
?>
</body>
</html>