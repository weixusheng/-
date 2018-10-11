<!DOCTYPE html PUBLIC "-//W3C//DTD s_noTML 1.0 Transitional//EN" "http://www.w3.org/TR/s_notml1/DTD/s_notml1-transitional.dtd">
<html s_namelns="http://www.w3.org/1999/s_notml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<link href="../../css/jscal2.css" rel="stylesheet" type="text/css" />
<link href="../../css/steel.css" rel="stylesheet" type="text/css" />
<link href="../../css/border-radius.css" rel="stylesheet" type="text/css" />
<script src="../../JS/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../../JS/jscal1.js" type="text/javascript"></script>
<script src="../../JS/cn.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
function f_load()
{document.form1.s_no.focus();
	}
function xueji() {
	if(document.form1.s_no.value=="")
	{
		alert("请输入学号");
		document.form1.s_no.focus();
		return false;
	}
	if(document.form1.s_name.value=="")
	{
		alert("请输入姓名");
		document.form1.s_name.focus();
		return false;
	}
	if(document.form1.s_sex.value=="")
	{
		alert("请选择性别");
		document.form1.s_sex.focus();
		return false;
	}
	if(document.form1.s_bir.value=="")
	{
		alert("请选择出生年月日");
		document.form1.s_bir.focus();
		return false;
	}
	if(document.form1.s_id.value=="")
	{
		alert("请输入身份证号");
		document.form1.s_id.focus();
		return false;
	}
	if(document.form1.s_class.value=="")
	{
		alert("请选择班级");
		document.form1.s_class.focus();
		return false;
	}
	if(document.form1.s_home.value=="")
	{
		alert("请填写籍贯");
		document.form1.s_home.focus();
		return false;
	}
	if(document.form1.s_ent.value=="")
	{
		alert("请输入入学日期");
		document.form1.s_ent.focus();
		return false;
	}
	if(document.form1.bank_num.value=="")
	{
		alert("请输入银行卡号");
		document.form1.bank_num.focus();
		return false;
	}
	if(document.form1.is_dragon.value=="")
	{
		alert("请选择是否龙舟队");
		document.form1.is_dragon.focus();
		return false;
	}
}
</script>
</head>

<body class="ziye_style" onLoad="f_load()">
<form id="form1" name="form1" method="post" action="add_stu_info_save.php" onSubmit="return xueji()">
  <table width="685" border="0" cellspacing="0" cellpadding="0" class="trstyle">
    <tr>
      <td width="152" height="24" align="right">学号：</td>
      <td colspan="2"><label for="s_no"></label>
      <input type="text" name="s_no" id="s_no" class="formstyle" /></td>
    </tr>
    <tr>
      <td align="right">姓名：</td>
      <td colspan="2"><label for="s_name"></label>
      <input type="text" name="s_name" id="s_name" class="formstyle"/></td>
    </tr>
    <tr>
      <td align="right">性别：</td>
      <td colspan="2" valign="middle"><label for="select"></label>
        <select name="s_sex" id="s_sex" class="selectstyle">
          <option selected="selected" value="">－－请选择－－</option>
          <option value="男">－－男－－</option>
          <option value="女">－－女－－</option>
      </select></td>
    </tr>
    <tr>
      <td align="right">出生年月日：</td>
      <td colspan="2"><label for="s_bir"></label>
      <input type="text" name="s_bir" id="s_bir" class="formstyle" />
      <script type="text/javascript">//<![CDATA[
			  var cal = Calendar.setup({
				onSelect: function(cal) { cal.hide() }
			  });
			  cal.manageFields("s_bir", "s_bir", "%Y-%m-%d");
			//]]></script>
      </td>
    </tr>
    <tr>
      <td align="right">身份证号：</td>
      <td colspan="2"><label for="s_id"></label>
      <input type="text" name="s_id" id="s_id" class="formstyle" /></td>
    </tr>
    <tr>
      <td align="right">民族：</td>
      <td colspan="2"><label for="nation"></label>
      <input type="text" name="nation" id="nation" class="formstyle" /></td>
    </tr>
    <tr>
      <td align="right">班级：</td>
      
      <td colspan="2"><label for="s_class"></label>
        <select name="s_class" id="s_class" class="selectstyle" >
        <option value="">－－请选择－－</option>
        <?php
			include("../../function/conn.php");
			$gsql=mysql_query("select class_name from tb_class where graduate_flag='0'");
			$ginfo=mysql_fetch_array($gsql);
			do{
	  	?>
          <option value="<?php echo $ginfo["class_name"]?>">－－<?php echo $ginfo["class_name"]?>－－</option>
		<?php
			}while($ginfo=mysql_fetch_array($gsql));
        ?>
      </select></td>
    </tr>
    <tr>
      <td align="right">籍贯：</td>
      <td colspan="2"><label for="s_home"></label>
      <input type="text" name="s_home" id="s_home" class="formstyle" /></td>
    </tr>
    <tr>
      <td align="right">政治面貌：</td>
      <td colspan="2"><label for="s_pol"></label>
        <select name="s_pol" id="s_pol" class="selectstyle" >
          <option value="">－－群众－－</option>
          <option value="共青团员">－－共青团员－－</option>
          <option value="中共预备党员">－－中共预备党员－－</option>
          <option value="共产党员">－－共产党员－－</option>
      </select></td>
    </tr>
    <tr>
      <td align="right">入学日期：</td>
      <td colspan="2"><label for="s_ent"></label>
      <input type="text" name="s_ent" id="s_ent" class="formstyle" />
       <script type="text/javascript">//<![CDATA[
			  var cal = Calendar.setup({
				onSelect: function(cal) { cal.hide() }
			  });
			  cal.manageFields("s_ent", "s_ent", "%Y-%m-%d");
			//]]></script>
      </td>
    </tr>
    <tr>
      <td align="right"><p>银行卡号：</p></td>
      <td colspan="2"><label for="bank_num"></label>
      <input type="text" name="bank_num" id="bank_num" class="formstyle"></td>
    </tr>
    <tr>
      <td align="right">是否龙舟队：</td>
      <td colspan="2" valign="middle"><label for="select"></label>
      <select name="is_dragon" id="is_dragon" class="selectstyle">
          <option selected="selected" value="">－－请选择－－</option>
          <option value="1">－－是－－</option>
          <option value="0">－－否－－</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="132">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="button" id="button" value="提交" /></td>
      <td width="401"><input type="reset" name="button2" id="button2" value="重置" /></td>
    </tr>
  </table>
</form>
</body>
</html>