<!DOCTYPE html PUBLIC "-//W3C//DTD s_noTML 1.0 Transitional//EN" "http://www.w3.org/TR/s_notml1/DTD/s_notml1-transitional.dtd">
<html s_namelns="http://www.w3.org/1999/s_notml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<link href="../../css/jscal2.css" rel="stylesheet" type="text/css" />
<link href="../../css/steel.css" rel="stylesheet" type="text/css" />
<link href="../../css/border-radius.css" rel="stylesheet" type="text/css" />
<script src="../../JS/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../../JS/jscal1.js" type="text/javascript"></script>
<script src="../../JS/cn.js" type="text/javascript"></script>

</head>

<body class="ziye_style">
<?php 
$id=$_GET["id"];
include("../../function/conn.php");
$sql=mysql_query("select * from tb_s_information where ID=$id"); 
$array=mysql_fetch_array($sql);
$s_no=$array["s_no"];
$s_name=$array["s_name"];
$s_sex=$array["s_sex"];
$s_bir=$array["s_birthday"];
$s_id=$array["s_id_card"];
$s_home=$array["s_home"];
$s_pol=$array["s_politics"];
$s_class=$array["s_class"];
$s_ent=$array["s_entrance_date"];
$s_gra=$array["s_graduate"];
$nation=$array["nation"];
$bank_num=$array["bank_num"];
$is_dragon=$array["is_dragon"];
if($is_dragon=="0")
$is_dragon="否";
else $is_dragon="是";
?>
<form id="form1" name="form1" method="post" action="upd_stu_info.php" onSubmit="return xueji()">
  <table width="685" border="0" cellspacing="0" cellpadding="0" class="trstyle">
    <tr>
      <td width="152" height="24" align="right">学号：</td>
      <td colspan="2"><label for="s_no"></label>
      <input type="text" name="s_no" id="s_no" value="<?php echo "$s_no"?>" class="formstyle" /></td>
    </tr>
    <tr>
      <td align="right">姓名：</td>
      <td colspan="2"><label for="s_name"></label>
      <input type="text" name="s_name" id="s_name" value="<?php echo "$s_name"?>" class="formstyle"/></td>
    </tr>
    <tr>
      <td align="right">性别：</td>
      <td colspan="2" valign="middle"><label for="select"></label>
        <select name="s_sex" id="s_sex" class="selectstyle">
          <option selected="selected" value="" <?php if (!(strcmp("", $s_sex))) {echo "selected=\"selected\"";} ?>>－－请选择－－</option>
          <option value="男" <?php if (!(strcmp("男", $s_sex))) {echo "selected=\"selected\"";} ?>>－－男－－</option>
          <option value="女" <?php if (!(strcmp("女", $s_sex))) {echo "selected=\"selected\"";} ?>>－－女－－</option>
      </select></td>
    </tr>
    <tr>
      <td align="right">出生年月日：</td>
      <td colspan="2"><label for="s_bir"></label>
      <input type="text" name="s_bir" id="s_bir" value="<?php echo "$s_bir"?>" class="formstyle" />
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
      <input type="text" name="s_id" id="s_id" value="<?php echo $s_id?>" class="formstyle" /></td>
    </tr>
    <tr>
      <td align="right">民族：</td>
      <td colspan="2"><label for="nation"></label>
      <input type="text" name="nation" id="nation" value="<?php echo $nation;?>" class="formstyle" /></td>
    </tr>
    <tr>
      <td align="right">班级：</td>
      <td colspan="2"><label for="s_class"></label>
        <select name="s_class" id="s_class" class="selectstyle" >
          <option value="" selected="selected" <?php if (!(strcmp("", $s_class))) {echo "selected=\"selected\"";} ?>>－－请选择－－</option>
          <?php
		  	$gsql=mysql_query("select class_name from tb_class where graduate_flag='0'");
			$ginfo=mysql_fetch_array($gsql);
			do{
		  ?>
          <option value="<?php echo $ginfo["class_name"]?>" <?php if (!(strcmp($ginfo["class_name"], $s_class))) {echo "selected=\"selected\"";} ?>>－－<?php echo $ginfo["class_name"]?>－－</option>
          <?php
			}while($ginfo=mysql_fetch_array($gsql));
		  ?>
      </select></td>
    </tr>
    <tr>
      <td align="right">籍贯：</td>
      <td colspan="2"><label for="s_home"></label>
      <input type="text" name="s_home" id="s_home" value="<?php echo "$s_home"?>" class="formstyle" /></td>
    </tr>
    <tr>
      <td align="right">政治面貌：</td>
      <td colspan="2"><label for="s_pol"></label>
        <select name="s_pol" id="s_pol" class="selectstyle" >
          <option value="" selected="selected" <?php if (!(strcmp("", $s_pol))) {echo "selected=\"selected\"";} ?>>－－群众－－</option>
          <option value="共青团员" <?php if (!(strcmp("共青团员", $s_pol))) {echo "selected=\"selected\"";} ?>>－－共青团员－－</option>
          <option value="中共预备党员" <?php if (!(strcmp("中共预备党员", $s_pol))) {echo "selected=\"selected\"";} ?>>－－中共预备党员－－</option>
          <option value="共产党员" <?php if (!(strcmp("共产党员", $s_pol))) {echo "selected=\"selected\"";} ?>>－－共产党员－－</option>
      </select></td>
    </tr>
    <tr>
      <td align="right">入学日期：</td>
      <td colspan="2"><label for="s_ent"></label>
      <input type="text" name="s_ent" id="s_ent" value="<?php echo "$s_ent"?>" class="formstyle" />
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
      <td colspan="2"><label for="textfield"></label>
      <input type="text" name="bank_id" id="bank_id" class="formstyle" value="<?php echo"$bank_num";?>"></td>
    </tr>
    <tr>
      <td align="right">是否龙舟队：</td>
      <td colspan="2">
      
      <select name="is_dragon" id="is_dragon" class="selectstyle">
          <option selected="selected" value="" <?php if (!(strcmp("", $is_dragon))) {echo "selected=\"selected\"";} ?>>－－请选择－－</option>
          
          <option value="1" <?php if (!(strcmp("是", $is_dragon))) {echo "selected=\"selected\"";} ?>>－－是－－</option>
          <option value="0" <?php if (!(strcmp("否", $is_dragon))) {echo "selected=\"selected\"";} ?>>－－否－－</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><input type="hidden" name="ID" id="ID" value="<?php echo "$id"?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="132">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="button" id="button" value="修改" /></td>
      <td width="401"><input type="reset" name="button2" id="button2" value="重置" /></td>
    </tr>
  </table>
</form>
</body>
</html>