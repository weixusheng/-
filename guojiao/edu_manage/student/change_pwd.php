<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../css/style.css">
<title>无标题文档</title>
<style type="text/css">
.guide{ color:#999;
       font-size:12px;}
</style>

<script language="javascript" type="text/jscript">
function checkform(){
	if(document.form1.pwd.value=="")
	{ alert("请输入原密码！");
	  form1.pwd.select();
	  return false;
	}

   if(document.form1.npwd.value=="")
	{ alert("请输入新密码！");
	  form1.npwd.select();
	  return false;
	}
   if(document.form1.qrpwd.value=="")
	{ alert("请输入密码确认！");
	  form1.qrpwd.select();
	  return false;
	}
   if((form1.npwd.value!=form1.qrpwd.value)
       &&(form1.npwd.value!="")
	   &&(form1.qrpwd.value!=""))
	{ alert("两次输入的密码不一致！请重新输入！");
	   form1.npwd.select();
	   return false;
	}
	return true;
}
</script>
</head>

<body style="height:400px" class="bgcc">
<?php
		$s_no=$_SESSION["no"];
		include("../function/conn.php");
	 ?>
<p>&nbsp;</p>
<form id="form1"  name="form1" method="post" action="change_pwd1.php" onsubmit="return checkform()">
<div>
<table width="451" border="0" cellspacing="0" cellpadding="0"  >
   <tr>
    <td>原密码：</td></tr>
   <tr>
    <td><label for="pwd"></label>
      <input name="pwd" type="password" id="pwd" maxlength="15" /></td></tr>
   <tr>
    <td height="36"></td></tr>
  <tr>
    <td height="36">新密码：</td>
  </tr>
  <tr>
    <td>
      <input name="npwd" type="password" id="npwd" maxlength="15" /></td>
  </tr>
  <tr>
    <td height="25"  class="guide">登录密码不超过15个字符</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
  </tr>
  <tr>
    <td height="36">密码确认：</td>
  </tr>
  <tr>
    <td>
      <input name="qrpwd" type="password" id="qrpwd" maxlength="15" /></td>
  </tr>
  <tr>
    <td height="25" class="guide">再输入一次密码，确保密码正确</td>
  </tr>
  <tr>
    <td height="37" >&nbsp;</td>
  </tr>
  <tr>
    <td height="25" class="guide"><table width="451" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="68"><input type="submit" name="button1" id="button1" value="确认修改" /></td>
        <td width="36">&nbsp;</td>
        <td width="348"><input type="reset" name="button2" id="button2" value="重置" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</form>

</body>
</html>