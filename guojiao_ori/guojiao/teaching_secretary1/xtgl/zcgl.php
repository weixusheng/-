<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<link href="../../css/jscal2.css" rel="stylesheet" type="text/css" />
<link href="../../css/steel.css" rel="stylesheet" type="text/css" />
<link href="../../css/border-radius.css" rel="stylesheet" type="text/css" />
<script src="../../JS/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../../JS/jscal1.js" type="text/javascript"></script>
<script src="../../JS/cn.js" type="text/javascript"></script>
<script language="javascript">
function f_load() {
	if(document.form1.term.value=="")
	{
		alert("请输入学期");
		document.form1.term.focus();
		return false;
	}
	if(document.form1.first.value=="")
	{
		alert("请输入第一周周一");
		document.form1.first.focus();
		return false;
	}
}
</script>
</head>

<body class="bgc">
<?php 
include("../../function/conn.php");
if(isset($_POST["term"])==true){
echo  $term=$_POST["term"];
echo  $first=$_POST["first"];
$sql=mysql_query("call zhouci('$term','$first')");

echo "<script language='javascript'> window.location.href='zc.php?xueqi=$term'</script>";}

?>

<form id="form1" name="form1" method="post" action="zcgl.php" onsubmit="return f_load()">
  <div style="padding-left:40px; padding-top:40px">
  <table width="687" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td height="45" colspan="2" align="center">周次管理</td>
    </tr>
    <tr>
      <td width="135" height="50" align="right">学期：</td>
      <td width="552"><label for="term"></label>
      <input type="text" name="term" id="term" class="formstyle" /></td>
    </tr>
    <tr>
      <td height="50" align="right">第一周周一日期：</td>
      <td><label for="first"></label>
          <input type="text" name="first" id="first" class="formstyle" />
          <script type="text/javascript">//<![CDATA[
			  var cal = Calendar.setup({
				onSelect: function(cal) { cal.hide() }
			  });
			  cal.manageFields("first", "first", "%Y-%m-%d");
			//]]></script></td>
    </tr>
    <tr>
      <td height="50" colspan="2"  style="padding-left:500px"><input name="submit" type="submit" value="提交" /></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>