<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" language="javascript">
function f_tijiao(){
if(form1.term.value==-1){
	alert("请选择学期");
	form1.term.focus();
	return false;
  }
    return true;
}
</script>

</head>

<body class="bgc">
<?php
include("../../function/conn.php");
$result = mysql_query("select distinct term from tb_course2_term order by term");

?>
<form name="form1" method="post" action="read_pjjg.php" target="window"  onsubmit="return f_tijiao()">
<select id="term" name="term" >
<option value='-1' selected>——请选择学期——</option>
<?php
while($info=mysql_fetch_array($result)){
$gterm=$info["term"];
$grade0=substr($info["term"],0,4);
$grade1=$grade0+1;
if(substr($info["term"],4,1)==1){
	$term="第一学期";
}else{
	$term="第二学期";
}
   echo "<option value='$gterm'>".$grade0."-".$grade1.$term."</option>\n";
}
?>
</select>
<select name="prf" id="prf">
  <option value='-1'>——请选择专业——</option>
  <option value="电气工程及其自动化">——电      气——</option>
  <option value="国际经济与贸易">——经      贸——</option>
</select>
<span><input name="submit" type="submit" value="查询" /></span>
</form>
</body>
</html>