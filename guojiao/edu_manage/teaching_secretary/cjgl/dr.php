<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../../CSS/style.css" rel="stylesheet" type="text/css"/>
</head>
<body class="ziye_style">
<table>
<tr>
<td align="left" height="50">请选择文件：
	<form action="pldr.php" method="post"  enctype="multipart/form-data" >
           <input name="file" type="file" /><br />
           课程代号：<input name="c_id" type="text" /><br />
           列&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数：<input name="lie" type="text" /><br />
           考试类型：<select name="type">
             <option value="0" selected="selected">正考</option>
             <option value="1">补考</option>
             <option value="2">重考</option>
           </select><br />
           <input type="submit" value="批量导入" name="b" style="width:100px; height:20px;" />
	</form>
	</td>
</tr>
</table>
</html>