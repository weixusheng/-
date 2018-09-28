<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
<style>
.top{
	display:inline-block;
	margin-left:20px;
	margin-top:10px;
}
</style>
</head>
<?php
date_default_timezone_set("PRC");
$year=date("Y");
if(date("M")>12) $year1=$year;
else $year1=$year-1;
?>
<body class="bgc" style="margin:20px;">
<form action="show_rank.php" name="form1" method="post">
<div>
	<div class="top"><span>年级：</span><select name="grade"><option>请选择年级</option><option value="<?php echo $year-4?>"><?php echo $year-4?>级</option><option value="<?php echo $year-3?>"><?php echo $year-3?>级</option><option value="<?php echo $year-2?>"><?php echo $year-2?>级</option><option value="<?php echo $year-1?>"><?php echo $year-1?>级</option><option value="<?php echo $year?>"><?php echo $year?>级</option></select></div>	
    <div class="top"><span>专业：</span><select name="major"><option>请选择专业</option><option>国际经济与贸易</option><option>电气工程及其自动化</option></select></div>
    <div></div>
    <div class="top"><span>学期：</span></div>
    <div class="top"><input name="term[]" type="checkbox" value="<?php echo $year1-3?>1" /><?php echo $year1-3?>1</div>
    <div class="top"><input name="term[]" type="checkbox" value="<?php echo $year1-3?>2" /><?php echo $year1-3?>2</div>
    <div class="top"><input name="term[]" type="checkbox" value="<?php echo $year1-2?>1" /><?php echo $year1-2?>1</div>
    <div class="top"><input name="term[]" type="checkbox" value="<?php echo $year1-2?>2" /><?php echo $year1-2?>2</div>
    <div></div>
    <div class="top" style="margin-left:89px;"><input name="term[]" type="checkbox" value="<?php echo $year1-1?>1" /><?php echo $year1-1?>1</div><div class="top"><input name="term[]" type="checkbox" value="<?php echo $year1-1?>2" /><?php echo $year1-1?>2</div><div class="top"><input name="term[]" type="checkbox" value="<?php echo $year1?>1" /><?php echo $year1?>1</div>
    <div class="top"><input name="term[]" type="checkbox" value="<?php echo $year1?>2" /><?php echo $year1?>2</div>
</div>
<div><input name="" type="submit"/></div>
</form>
</body>
</html>