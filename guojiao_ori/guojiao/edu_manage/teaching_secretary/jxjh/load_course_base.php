<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" language="javascript">
function check(){
	if(document.forms[0].file.value==""){
		alert("请选择你的文件");
		document.forms[0].file.focus();
		return false;
		}
		return true;  
	}
</script>
</head>

<body class="ziye_style">
<table>
<tr>
<td align="left" height="50">请选择文件（课程基本信息）：
	<form action="load_course_base_save.php" method="post"  enctype="multipart/form-data" onsubmit="return check()" >
		   <input name="file" type="file" />
           <input type="submit" value="批量导入" name="b" style="width:100px; height:20px;" />
	</form>
	</td>
</tr>
</table>
</body>
</html>