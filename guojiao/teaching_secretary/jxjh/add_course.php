<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<script type="text/javascript" language="javascript"> 
function f_onload()
{
	form1.grade.focus();
	}
function f_tijiao()
{
	if(document.form1.grade.value=="")
	{alert("请填写课程年级");
	form1.grade.focus();
	return false;
	}
	if(document.form1.term.value=="")
	{alert("请选择课程学期");
	form1.term.focus();
	return false;
	}
	if(document.form1.major.value=="")
	{alert("请填写课程年级");
	form1.major.focus();
	return false;
	}
	if(document.form1.class_name.value=="")
	{alert("请填写教学班名称");
	form1.class_name.focus();
	return false;
	}
	if(document.form1.course_no.value=="")
	{alert("请选择课程编号");
	form1.course_no.focus();
	return false;
	}
	/*if(document.form1.course_name.value=="")
	{alert("请填写课程名称");
	form1.course_name.focus();
	return false;
	}*/
/*	if(document.form1.course_hour.value=="")
	{alert("请填写课程总学时");
	form1.course_hour.focus();
	return false;
	}
	if(document.form1.course_credit.value=="")
	{alert("请填写课程学分");
	form1.course_credit.focus();
	return false;
	}*/
	if(document.form1.course_week_hour.value=="")
	{alert("请填写课程周学时");
	form1.course_week_hour.focus();
	return false;
	}
	if(document.form1.mon_hour.value=="")
	{alert("请填写周一学时");
	form1.mon_hour.focus();
	return false;
	}
	if(document.form1.tue_hour.value=="")
	{alert("请填写周二学时");
	form1.tue_hour.focus();
	return false;
	}
	if(document.form1.wed_hour.value=="")
	{alert("请填写周三学时");
	form1.wed_hour.focus();
	return false;
	}
	if(document.form1.thu_hour.value=="")
	{alert("请填写周四学时");
	form1.thu_hour.focus();
	return false;
	}
	if(document.form1.fri_hour.value=="")
	{alert("请填写周五学时");
	form1.fri_hour.focus();
	return false;
	}
	if(document.form1.sat_hour.value=="")
	{alert("请填写周六学时");
	form1.sat_hour.focus();
	return false;
	}
	if(document.form1.sun_hour.value=="")
	{alert("请填写周日学时");
	form1.sat_hour.focus();
	return false;
	}
	
	if(document.form1.teacher.value=="")
	{alert("请填写任课教师");
	form1.teacher.focus();
	return false;
	}
	if(document.form1.c_stu_num.value=="")
	{alert("请填写选课人数");
	form1.c_stu_num.focus();
	return false;
	}
	/*if(document.form1.course_type.value=="")
	{alert("请选择课程分类");
	form1.course_type.focus();
	return false;
	}*/
	if(document.form1.repeat_time.value=="")
	{alert("请填写重复课系数");
	form1.repeat_time.focus();
	return false;
	}
		return true;	}
</script>
</head>

<body onload="f_onload()" class="ziye_style">
<?php
date_default_timezone_set('PRC');
$y=date('Y')-1;
?>
<form id="form1" name="form1" method="post" action="course_save.php" onsubmit="return f_tijiao()">
<table width="571" border="0" cellspacing="0" cellpadding="0" class="trstyle">
  <tr>
    <td colspan="3" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="111" align="right">年级：</td>
    <td colspan="3" align="left"><label for="textfield"></label>
      <input  class="formstyle" type="text" name="grade" id="textfield" /></td>
  </tr>
  <tr>
    <td align="right">学期：</td>
    <td colspan="3" align="left"><label for="select"></label>
      <select name="term" id="select" class="selectstyle">
        <option selected="selected">--请选择--</option>
        <?php
		for($i=1;$i<=6;$i++){
			if($i%2==0)$xueqi='2';
			else $xueqi='1';
		?>
        <option value="<?php echo $y.$xueqi?>">--<?php echo $y.$xueqi;?>--</option>
        <?php
			if($i%2==0)$y++;
		}
		?>
      </select></td>
  </tr>
   <tr>
    <td width="111" align="right">专业：</td>
    <td colspan="3" align="left"><label for="textfield"></label>
      <input  class="formstyle" type="text" name="major" id="textfield" /></td>
  </tr>
  <tr>
    <td align="right">教学班名称：</td>
    <td colspan="3" align="left"><label for="textfield2"></label>
      <input  class="formstyle" type="text" name="class_name" id="textfield2" /></td>
  </tr>
  <tr>
    <td align="right">课程编号：</td>
    <td colspan="3" align="left"><label for="textfield3"></label>
      <input class="formstyle" type="text" name="course_no" id="textfield3" /></td>
  </tr> 
  <tr>
    <td align="right">学分：</td>
    <td colspan="3" align="left"><label for="textfield"></label>
      <input  class="formstyle" type="text" name="c_credit" id="textfield"/></td>
  </tr>
     <tr>
    <td align="right">类别：</td>
    <td colspan="3" align="left"><select name="type" id="select3" class="selectstyle">
      <option selected="selected">--请选择--</option>
      <option value="必修">--必修--</option>
      <option value="选修">--选修--</option>
    </select></td>
  </tr>
   <tr>
    <td width="111" align="right">重复课系数：</td>
    <td colspan="3" align="left"><label for="textfield"></label>
      <input  class="formstyle" type="text" name="repeat_time" id="textfield" /></td>
  </tr>
   <tr>
    <td align="right">选课人数：</td>
    <td colspan="3" align="left"><label for="textfield"></label>
      <input  class="formstyle" type="text" name="c_stu_num" id="textfield" /></td>
  </tr>
  <tr>
    <td align="right">任课教师：</td>
    <td colspan="3" align="left"><input class="formstyle" type="text" name="teacher" id="textfield8" /></td>
  </tr>
	<tr>
    <td colspan="4" >
    <table width="575" border="0" cellspacing="0" cellpadding="0" class="trstyle">
  <tr>
    <td width="113" align="right">周一学时：</td>
    <td width="80"><input name="mon_hour" type="text" id="textfield7" size="4"  width="54"/></td>
     <td width="116" align="right">周五学时：</td>
    <td width="266"><input name="fri_hour" type="text" id="textfield7" size="4"  width="54"/></td>
  </tr>
  <tr>
    <td align="right">周二学时：</td>
    <td><input name="tue_hour" type="text" id="textfield7" size="4"  width="54"/></td>
    <td align="right">周六学时：</td>
    <td><input name="sat_hour" type="text" id="textfield7" size="4"  width="54"/></td>
  </tr>
  <tr>
    <td height="32" align="right">周三学时：</strong></td>
    <td><input name="wed_hour" type="text" id="textfield7" size="4"  width="54"/></td>
   <td align="right" >周日学时：</td>
    <td><input name="sun_hour" type="text" id="textfield7" size="4"  width="54"/></td>
  </tr>
  <tr>
    <td align="right">周四学时：</td>
     <td><input name="thu_hour" type="text" id="textfield7" size="4"  width="54"/></td>
    <td align="right">周总学时：</td>
    <td><input name="course_week_hour" type="text" id="textfield4" size="4" width="54" /></td>
  </tr>
</table>
	</td>
  </tr>
  

 <!-- /*<tr>
    <td align="right">课程名称:</td>
    <td colspan="3" align="left"><label for="textfield4"></label>
      <input type="text" name="course_name" id="textfield4" />
      <label for="textfield5"></label>
      <label for="textfield6"></label></td>
  </tr>*/-->
<!--  <tr>
    <td align="right">总学时:</td>
    <td colspan="3" align="left"><input type="text" name="course_hour" id="textfield5" /></td>
  </tr>-->
 <!-- <tr>
    <td align="right">学分:</td>
    <td colspan="3" align="left"><input type="text" name="course_credit" id="textfield6" /></td>
  </tr>-->
 <!-- <tr>
    <td align="right">周学时：</td>
    <td><input type="text" name="course_week_hour" id="textfield7"  width="70" "/></td>


    <td colspan="3" align="left"><table width="381" border="0">
      <tr>
        <td width="151" align="right">周一学时：</td>
        <td width="52"><input type="text" name="mon_hour" id="textfield7"  width="54" "/></td>
        <td width="87" align="right">周五学时：</td>
        <td width="73"><input type="text" name="fri_hour" id="textfield7"  width="54" "/></td>
      </tr>
      <tr>
        <td align="right">周二学时：</td>
        <td><input type="text" name="tue_hour" id="textfield7"  width="54" "/></td>
        <td align="right">周六学时：</td>
        <td><input type="text" name="sta_hour" id="textfield7"  width="54" "/></td>
      </tr>
      <tr>
        <td height="47" align="right">周三学时：</strong></td>
        <td><input type="text" name="wed_hour" id="textfield7"  width="54" "/></td>
        <td align="right" >周日学时：</td>
        <td><input type="text" name="sun_hour" id="textfield7"  width="54" "/></td>
      </tr>
      <tr>
        <td align="right">周四学时：</td>
        <td><input type="text" name="thu_hour" id="textfield7"  width="54" "/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>-->
  
  <!-- <tr>
    <td align="right">选课人数:</td>
    <td colspan="3" align="left"><input type="text" name="student_amount" id="textfield9" /></td>
  </tr>-->
 <!--  <tr>
    <td align="right">课程分类:</td>
    <td colspan="3" align="left"><select name="course_type" id="select2">
      <option selected="selected">--请选择--</option>
      <option value="学科基础课程">--学科基础课程--</option>
      <option value="普通教育课程">--普通教育课程--</option>
      <option value="专业课程">--专业课程--</option>
      <option value="实践环节">--实践环节--</option>
    </select></td>
  </tr>-->
   <tr>
     <td>&nbsp;</td>
     <td width="80">&nbsp;</td>
     <td width="87"><input type="submit" name="button2" value="提交" /></td>
     <td width="297"><input type="reset" name="button3" value="重置" /></td>
   </tr>
</table>

</form></body>
</html>