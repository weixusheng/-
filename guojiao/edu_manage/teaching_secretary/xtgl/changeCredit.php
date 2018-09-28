<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<title>无标题文档</title>
<script type="text/javascript">
window.onsubmit=function(){
	inputEle=document.getElementsByTagName("input");
	for(var i=0;i<inputEle.length-2;i++){
		if(inputEle[i].value==""){
			alert("请输入此专业最低学分");
			inputEle[i].onfcous();
			return false;
			}
		}
	}
</script>
</head>
<body class="bgc">
<?php 
	include("../../function/conn.php");
	if(isset($_POST['dq'])==true){
		mysql_query("update tb_system set value={$_POST['jm']} where variable='lowest_credit_jingmao';");
		mysql_query("update tb_system set value={$_POST['dq']} where variable='lowest_credit_dianqi';");
		echo "<script>alert('更新成功');window.location.href='changeCredit.php'</script>";
		}	
	$sql=mysql_query("select value from tb_system where variable in ('lowest_credit_jingmao','lowest_credit_dianqi');");
	$info=mysql_fetch_array($sql);
	$info1=mysql_fetch_array($sql);
?>
<div style="padding-left:40px; padding-top:40px">
<form action="changeCredit.php" method="post">
<table width="759" border="1" cellspacing="0" cellpadding="0">

  <tr>
    <td width="" height="50" align="center">国际经济与贸易专业最低学分：</td>
    <td width="" align="center">
      <input type="text" name="jm" id="jm" style="width:200px; height:25px;" value="<?php echo $info['value'];  ?>" /></td>
  </tr>
  <tr>
    <td height="50" align="center">电气工程及其自动化专业最低学分：</td>
    <td align="center"><input type="text" name="dq" id="dq" style="width:200px; height:25px;"  value="<?php echo $info1['value'];  ?>" /></td>
  </tr>
 <tr>
    <td height="50" colspan="2" align="center">
    <input name="dq2" type="submit" id="dq2" style="width:100px; height:25px;" value="提  交" /></td>
    </tr></table>
</form>
</div>
</body>
</html>