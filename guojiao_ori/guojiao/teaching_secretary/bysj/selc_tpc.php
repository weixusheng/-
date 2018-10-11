<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
<script>
	function dd() {
		if(document.form1.s_no.value=='') {
			alert("请输入学号");
			form1.s_no.focus();
			return false;
		} else {
			form1.submit();
		}
	}
</script>
</head>

<body onload="form1.s_no.focus()" class="bgcc">
<form name="form1" action="selc_tpc_save.php" method="post"><table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>请输入学生学号：<input name="s_no" type="text" id="s_no" /><?php if(isset($_GET["s_name"])) {echo $_GET["s_name"]."选课成功";}?></td>
  </tr>
  <?php
 date_default_timezone_set("PRC");$year=date("Y");
  include("../../function/conn.php");
  $sql=mysql_query("select ID,topic_name from graduation_design where lim_num>selcd_num");
  $info=mysql_fetch_array($sql);
  do {
	  $tpc_id=$info["ID"];
	  $tpc_name=$info["topic_name"];
	  if($info!=false){
  ?>
  <tr>
  	<td>
  	    <input type="radio" name="tpc" value="<?php echo $tpc_id?>" id="tpc" onclick="return dd()"/><?php echo $tpc_name?>
  	</td>
  </tr>
  <?php
 
  }}while($info=mysql_fetch_array($sql))
  ?>
</table>
</form>
</body>
</html>