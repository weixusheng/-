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
		alert("请输入课程全称");
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
<div style="float:left">
    <div style="padding-left:20px; height:35px; text-align:right">
        <form action="#" method="post" name="queryform" id="queryform">
          <input id="n_num" name="n_num" type="text" value="请输入要查询的课程号"/>
          <input id="enter" name="enter" type="submit" value="查询" />    
        </form>
    </div>


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
    <td>请输入课程全称</td>
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
</div>
<div style="float:left; width:650px; border-left:#FFF solid 2px; padding-left:10px">
<?php
include("../../function/conn.php");
if(isset($_POST['n_num'])) {
	$num0=$_POST['n_num'];
    $query_Recordset2 = "select * from tb_course_base  where c_id='$num0'";
	$Recordset2= mysql_query($query_Recordset2) ;
	$row_Recordset2 = mysql_fetch_array($Recordset2);
	}
else {
	date_default_timezone_set("PRC");
	strtotime(date('Y-m-d H:i:s'));
	$todayBegin=strtotime(date('Y-m-d')." 00:00:00");
	$todayEnd= strtotime(date('Y-m-d')." 23:59:59");
	$query_Recordset2="select * from tb_course_base where  c_addtime < '$todayEnd' AND c_addtime > '$todayBegin'";
	$Recordset2=mysql_query($query_Recordset2);
	$row_Recordset2=mysql_fetch_array($Recordset2);
	}
	if($row_Recordset2['c_id']!=""){
		?>
    <table cellpadding="10" cellspacing="0" border="2" bordercolor="#CCCCCC" width="100%">
    <caption  style="font-size:16px; color:#666">已添加课程</caption>
    <tr style="font-size:16px;">
     <td width="14%">课程编号</td>
     <td width="14%">课程简称</td>
     <td width="14%">课程全称</td>
     <td width="20%">课程英文名称</td>
     <td>课程类型</td>
     <td>学分</td>
     <td>考试类型</td>
    </tr>
        <?php
		do{
	?>
    <tr  style="font-size:14px; color:#666">
     <td><?php echo $row_Recordset2['c_id'];?></td>
     <td><?php echo $row_Recordset2['c_shortname'];?></td>
     <td><?php echo $row_Recordset2['c_longname'];?></td>
     <td><?php echo $row_Recordset2['c_englishname'];?></td>
     <td><?php echo $row_Recordset2['c_type'];?></td>
     <td><?php echo $row_Recordset2['c_credit'];?></td>
     <td><?php echo $row_Recordset2['c_test_type'];?></td>
    </tr>
   <?php
		}while($row_Recordset2 = mysql_fetch_array($Recordset2));
    }?>
    </table>
</div>
</body>
</html>