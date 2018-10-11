<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<title>无标题文档</title>
<script type="text/jscript" language="javascript">
function f_tijiao()
{
	if(document.form1.classname.value=="")
	{alert("请输入要添加的班级");
	form1.classname.focus();
	return false;}
	return true;
	}
function f_onload()
{
	form1.classname.focus();
	}
</script>
</head>

<body onload="f_onload()" class="ziye_style">
<form id="form1" name="form1"  onsubmit="return f_tijiao()" method="post" action="class_save.php">
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">班级名称:</td>
    <td width="168">
      <label for="textfield"></label>
      <input type="text" name="classname" id="textfield" />
    </td>
    <td width="158"><input name="input2" type="submit" value="添加" /></td>
  </tr>
</table>   
 </form>
</body>
</html>