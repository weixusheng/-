<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
.noborder {
	border:none;
}

</style>
<script type="text/javascript" language="javascript">
function tijiao(){
	inputElement=document.getElementsByTagName("input");
	for(var i=0;i<inputElement.length-1;i++){
		if(inputElement[i].value==""){
			alert("请输入成绩");
			inputElement[i].focus();
			return false;
			}
		}
	}
</script>
</head>

<body class="bgc" style="padding-top:10px;">
<?php
include("../function/conn.php");
$class=$_POST["class"];
?>
<form action="grd_save.php" method="post" onsubmit="return tijiao();" >
<table border="1" cellspacing="0" cellpadding="5" width="600">
  <tr>
    <th scope="col">序号</th>
    <th scope="col">学号</th>
    <th scope="col">姓名</th>
    <th scope="col">班级</th>
    <th scope="col">毕业设计题目</th>
    <th scope="col">成绩</th>
  </tr>
<?php
$i=1;
$sql=mysql_query("select id,s_no,s_name,grd_dsg,t_name,score from graduation_design where class='$class'");
if($sql!=""){
$info=mysql_fetch_array($sql);
	echo "<div style='padding:10px 0px;'><input type='submit' value='确认提交'></div>";
	do{
		echo "<tr align='center'>
		<td>$i</td>
		<td>$info[s_no]</td>
		<td>$info[s_name]</td>
		<td>$class</td>
		<td>$info[grd_dsg]</td>
		<td><input type='text' size='3' name='grade[]' value='$info[score]' /><input type='hidden' name='score_id[]' value='$info[id]'></td></tr>";
	$i++;
	}while($info=mysql_fetch_array($sql));
}else{
	echo "<tr align='center'><td colspan='6'>无毕业设计名单</td></tr>";
	}
?>
<input  type="hidden" value="修改" name="way" />
<input  type="hidden" value="change_bs_form.php" name="way1" />
</table>
</form>
</body>
</html>