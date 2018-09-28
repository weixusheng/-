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
<form action="bk_save.php" method="post" onsubmit="return tijiao();">
<table border="1" cellspacing="0" cellpadding="5" width="600">
  <tr>
    <th scope="col">序号</th>
    <th scope="col">学号</th>
    <th scope="col">姓名</th>
    <th scope="col">班级</th>
    <th scope="col">科目</th>
    <th scope="col">成绩</th>
  </tr>
<?php
$i=1;
$sql=mysql_query("select a.ID,a.ck3_score,b.s_no,b.s_name,d.c_longname  from tb_score a,tb_s_information b,tb_course2_term c,tb_course_base d where a.eff_score<60 and b.now_class='$class' and a.s_id=b.ID and a.c_id=c.ID and c.cb_id=d.ID; ");
if($sql!=""){
$info=mysql_fetch_array($sql);
	do{
		echo "<tr align='center'>
		<td>$i</td>
		<td>$info[s_no]</td>
		<td>$info[s_name]</td>
		<td>$class</td>
		<td>$info[c_longname]</td>
		<td><input type='text' size='8' name='grade[]' value='$info[ck3_score]' /><input type='hidden' name='score_id[]' value='$info[ID]'></td></tr>";
	$i++;
	}while($info=mysql_fetch_array($sql));
	echo "<tr><td colspan='6'><div style='padding:0px 10px;'><input type='submit' value='确认修改'></div></td></tr>";	
}else{
	echo "<tr align='center'><td colspan='6'>无补考名单</td></tr>";
	}
?>
<input  type="hidden" value="修改" name="way" />
<input  type="hidden" value="modefy" name="way1" />
</table>
</form>
</body>
</html>