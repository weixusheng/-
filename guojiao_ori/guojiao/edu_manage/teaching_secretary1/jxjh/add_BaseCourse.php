<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<script type="text/javascript" language="javascript">
function tijiao(){
	formElement=document.forms[0];
	if(formElement.Num.value==""){
		alert("请输入课程编号");
		formElement.Num.focus();
		return false;
		}
	if(formElement.ShortName.value==""){
		alert("请输入课程简称");
		formElement.ShortName.focus();
		return false;
		}
	if(formElement.LongName.value==""){
		alert("请输入课程全程");
		formElement.LongName.focus();
		return false;
		}
	if(formElement.EnName.value==""){
		alert("请输入课程英文名称");
		formElement.EnName.focus();
		return false;
		}
	if(formElement.Office.value==""){
		alert("请输入所属学院");
		formElement.Office.focus();
		return false;
		}
	if(formElement.Type.value=="0"){
		alert("请选择课程类型");
		formElement.Type.focus();
		return false;
		}
	if(formElement.Credit.value==""){
		alert("请输入学分");
		formElement.Credit.focus();
		return false;
		}
	if(formElement.TestType.value==""){
		alert("请输入考试类型");
		formElement.TestType.focus();
		return false;
		}
	return true;
	}

</script>
<title>无标题文档</title>
</head>

<body class="ziye_style">
<form action="addCourseBaseSave.php" method="post" name="form1" onsubmit="return tijiao()">
<table border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td>请输入课程编号</td>
    <td><input type="text" name="Num" size="30" id="Num" value=""  /><span id="SpanNum"></span></td>
  </tr>
  <tr>
    <td>请输入课程简称</td>
    <td><input type="text" name="ShortName" size="30"  id="ShortName" /><span id="SpanShortName"></span></td>
  </tr>
  <tr>
    <td>请输入课程全程</td>
    <td><input type="text" name="LongName" size="30" id="LongName" /><span id="SpanLongName"></span></td>
  </tr>
  <tr>
    <td>请输入课程英文名称</td>
    <td><input type="text" name="EnName" size="30" id="EnName" /><span id="SpanEnName"></span></td>
  </tr>
  <tr>
    <td>请输入所属学院</td>
    <td><input type="text" name="Office" size="30"  id="Office" /><span id="SpanOffice"></span></td>
  </tr>
  <tr>
    <td>请选择课程类型</td>
    <td><select name="Type" id="Type">
      <option value="0" selected="selected">--请选择--</option>
      <option value="1">--普通教育课--</option>
      <option value="2">--学科基础课--</option>
      <option value="3">--专业课--</option>
      <option value="4">--实践环节--</option>
    </select><span id="SpanType"></span></td>
  </tr>
  <tr>
    <td>请输入学分</td>
    <td><input type="text" name="Credit" size="30" id="Credit" /><span id="SpanNum"></span></td>
  </tr>
  <tr>
    <td>请输入考试类型</td>
    <td><input type="text" name="TestType"  size="30" id="TestType" /><span id="SpanTestType"></span></td>
  </tr>
  <tr align="center">
  	<td><input name="提交" type="submit"  id="submit0" value="添加" /></td>
    <td><input type="reset"  value="重置" /></td>
  </tr>
</table>
</form>
</body>
</html>