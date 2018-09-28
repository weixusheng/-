<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript">
function check(){
	if(document.form1.term.value==''){
		alert("请输入重修学期");
		document.form1.term.focus();
		return false;
		}
		return true;
	}
</script>
</head>

<body class="ziye_style">
<?php include("../../function/conn.php");
$sql=mysql_query("select value from tb_system where variable='can_chongxiu'");
$info=mysql_fetch_array($sql);
$sql1=mysql_query("select value from tb_system where variable='chongxiu_term'");
$info1=mysql_fetch_array($sql1);
?>
<form id="form1" name="form1" method="post" action="kaifang_chuli.php" onsubmit="return check()" >
<table border="1" cellspacing="0" cellpadding="0" align="center" width="300" bordercolor="#000000">
  <tr>
    <td align="center" width="40%">学期</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
      <input type="hidden" name="can_chongxiu" <?php if ($info["value"]==1) {echo "value='0'";} else echo "value='1'" ?> />
      <?php if (!(strcmp(0,$info["value"]))) {?>
            <input type="text" name="term" id="term"  size="10"/><?php }else echo $info1["value"]; ?>
   </td>
    <?php if (!(strcmp(0,$info["value"]))) {?><?php }?>
      <td align="center"><input type="submit" name="button" id="button" <?php if ($info["value"]==1) {echo "value='关闭重修报名'";} else echo "value='开启重修报名'" ?> /></td>
  </tr>
</table>
</form>
</body>
</html>