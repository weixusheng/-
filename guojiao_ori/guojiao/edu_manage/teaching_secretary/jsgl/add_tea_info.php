<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<script type="text/javascript" language="javascript">
function f_onload()
{form1.t_no.focus();}
function f_tijiao()
{
	/*if(document.form1.t_no.value=="")
	{alert("请输入教师工号");
	form1.t_no.focus();
	return false;}
	if(document.form1.t_name.value=="")
	{alert("请输入教师姓名");
	form1.t_name.focus();
	return false;}
	if(document.form1.t_sex.value=="")
	{alert("请选择性别");
	form1.t_sex.focus();
	return false;}
	if(document.form1.t_profession.value=="")
	{alert("请填写教师职称");
	form1.t_profession.focus();
	return false;}
    if(document.form1.t_office.value=="")
	{alert("请填写所属教研室");
	form1.t_office.focus();
	return false;}
	if(document.form1.t_collage=="")
	{alert("请填写所属学院");
	form1.t_collage.focus();
	return false;
	} if(document.form1.pro_level=="")
	{alert("请选择教师等级");
	form1.pro_level.focus();
	return false;*/
	} 
	
	  //  return true;}

</script>
</head>

<body onload="f_onload()" class="ziye_style">
<form id="form1" name="form1" method="post" action="add_tea_info_save.php" onsubmit="return f_tijiao()">
  <table width="400" border="0" class="trstyle">
    <tr>
      <td colspan="2" align="right">教师工号：</td>
      <td colspan="3" align="left"><input name="t_no" type="text" class="formstyle"/></td>
    </tr>
    <tr>
      <td colspan="2" align="right">教师姓名：</td>
      <td colspan="3" align="left"><input name="t_name" type="text" class="formstyle"/></td>
    </tr>
    <tr>
      <td colspan="2" align="right">教师性别：</td>
      <td colspan="3" align="left"><select name="t_sex" size="1" class=" selectstyle">
        <option selected="selected" value="">--请选择--</option>
        <option value="男">--男--</option>
        <option value="女">--女--</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="right">身份证号：</td>
      <td colspan="3" align="left">
      <input name="t_ID_no" type="text" class="formstyle"/></td>
    </tr>
    <tr></tr>
    <tr>
      <td colspan="2" align="right">教师职称：</td>
      <td colspan="3" align="left">
        <select name="t_profession" class="selectstyle">
          <option selected="selected" value="">--请选择--</option>
          <option value="教授">--教授--</option>
          <option value="副教授">--副教授--</option>
          <option value="实验师">--实验师--</option>
          <option value="高级工程师">--高级工程师--</option>
          <option value="讲师">--讲师--</option>
          <option value="助教">--助教--</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="right">教师等级：</td>
      <td colspan="3" align="left">
        <select name="pro_level" class="selectstyle">
          <option selected="selected" value="">--请选择--</option>
          <option value="2">--初级--</option>
          <option value="1">--中级--</option>
          <option value="0">--高级--</option>
      </select>
      </td>      
    </tr>
    <tr>
      <td colspan="2" align="right">所属教研室：</td>
      <td colspan="3" align="left"><input name="t_office" type="text" class="formstyle"/></td>
    </tr><tr>
      <td colspan="2" align="right">所属学院：</td>
      <td colspan="3" align="left"><input name="t_collage" type="text" class="formstyle"/></td>
    </tr>
    <tr>
      <td width="11" height="24">&nbsp;</td>
      <td width="84">&nbsp;</td>
      <td width="85">&nbsp;&nbsp;&nbsp;<input type="submit" name="button3" id="button3" value="提交" /></td>
      <td width="67"><input type="reset" name="button2" id="button2" value="重置" /></td>
      <td width="131">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>