<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
</head>

<body class="bgc">
<?php
class timer {   
var $StartTime = 0;   
var $StopTime = 0;   
var $TimeSpent = 0;   
function start(){   
$this->StartTime = microtime();   
}   
 
function stop(){   
$this->StopTime = microtime();   
}   
 
function spent() {   
if ($this->TimeSpent) {   
return $this->TimeSpent;   
} else {   
$StartMicro = substr($this->StartTime,0,10);   
$StartSecond = substr($this->StartTime,11,10);   
$StopMicro = substr($this->StopTime,0,10);   
$StopSecond = substr($this->StopTime,11,10);   
$start = floatval($StartMicro) + $StartSecond;   
$stop = floatval($StopMicro) + $StopSecond;   
$this->TimeSpent = $stop - $start;   
return round($this->TimeSpent,8).'秒';   
}  
}
}
$timer = new timer;
$timer->start();//

include("../../function/conn.php");
$class_name=$_GET["class_name"];
$id=$_GET["id"];
$exam_type=$_GET["exam"];
$verify_type=$_GET["verify"];
$arr=$_POST["shSon"];
$str=implode(',',$arr);
$length=count($arr);
for($i=0;$i<$length;$i++){
	$sql=mysql_query("update tb_score set $verify_type=1 where ID=$arr[$i]");
}
$timer->stop();  

echo "<script>alert('审核成功!');location.href='auditing_score.php?class_name=$class_name&id=$id&exam=$exam_type';</script>";
?>
</body>
</html>