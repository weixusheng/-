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
	if(document.form1.t_no.value=="")
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
    return true;
	} 
</script>
</head>

<body class="ziye_style">
<?php
$id=$_GET["id"];
include("../../function/conn.php");
$sql=mysql_query("select * from tb_teacher_base where ID=$id;");
$array=mysql_fetch_array($sql);
 $t_no=$array["t_no"];
 $t_name=$array["t_name"];
 $t_sex=$array["t_sex"];
 $t_id_card=$array["t_id_card"];
 $t_office=$array["t_office"];
 $t_profession=$array["t_profession"];
?>
<form id="form1" name="form1" method="post" action="update_tea_info.php" onsubmit="return f_tijiao()">
  <table width="400" border="0" class=" trstyle">
    <tr>
      <td colspan="2" align="right">教师工号：</td>
      <td colspan="3" align="left"><?php echo $t_no; ?><input name="t_no" type="hidden" value="<?php echo $t_no; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right">教师姓名：</td>
      <td colspan="3" align="left"><input class="formstyle" name="t_name" type="text" value="<?php echo $t_name; ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="right">教师性别：</td>
      <td colspan="3" align="left"><select name="t_sex" size="1" class="selectstyle">
        <option selected="selected" value="" <?php if (!(strcmp("", $t_sex))) {echo "selected=\"selected\"";} ?>>--请选择--</option>
        <option value="男" <?php if (!(strcmp("男", $t_sex))) {echo "selected=\"selected\"";} ?>>--男--</option>
        <option value="女" <?php if (!(strcmp("女", $t_sex))) {echo "selected=\"selected\"";} ?>>--女--</option>
      </select>
 
      <input type="hidden" name="id" id="hiddenField" value="<?php echo $id; ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="right">身份证号：</td>
      <td colspan="3" align="left">
      <input  class="formstyle" name="t_ID_no" type="text" value="<?php echo $t_id_card; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right">教师职称：</td>
      <td colspan="3" align="left">
        <label for="select"></label>
        <select name="t_profession" id="select" class="selectstyle">
          <option value="" <?php if (!(strcmp("", $t_profession))) {echo "selected=\"selected\"";} ?>>--请选择--</option>
          <option value="教授" <?php if (!(strcmp("教授", $t_profession))) {echo "selected=\"selected\"";} ?>>--教授--</option>
          <option value="副教授" <?php if (!(strcmp("副教授", $t_profession))) {echo "selected=\"selected\"";} ?>>--副教授--</option>
          <option value="实验师" <?php if (!(strcmp("实验师", $t_profession))) {echo "selected=\"selected\"";} ?>>--实验师--</option>
          <option value="高级工程师" <?php if (!(strcmp("高级工程师", $t_profession))) {echo "selected=\"selected\"";} ?>>--高级工程师--</option>
<option value="讲师" <?php if (!(strcmp("讲师", $t_profession))) {echo "selected=\"selected\"";} ?>>--讲师--</option>
          <option value="助教" <?php if (!(strcmp("助教", $t_profession))) {echo "selected=\"selected\"";} ?>>--助教--</option>
       </select></td>
    </tr>
    <tr>
      <td colspan="2" align="right">
      所属教研室：</td>
      <td colspan="3" align="left"><input  class="formstyle" name="t_office" type="text" value="<?php echo $t_office; ?> " /></td>
    </tr>
    <tr>
      <td width="34" height="24">&nbsp;</td>
      <td width="62">&nbsp;</td>
      <td width="42"><input type="submit" name="button2" id="button2" value="修改" /></td>
      <td width="50">&nbsp;</td>
      <td width="190">&nbsp;</td>
    </tr>
  </table>
 
 <!-- <input type="text" name="id" id="textfield" value="<?php echo $id; ?>"/>-->
</form>
</body>
</html>