<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript">
function courseNumCheck(){
	var obj=document.getElementsByName('courseNum');
	if(obj.value==" "){
		alert("输入课程号");
		return false;
		}
	}
</script>
</head>

<body>
  <form action="#" method="post" name="form_courseNum" onsubmit="return courseNumCheck()">
    输入课程号：<input type="text"  name="courseNum" value=""/>
    <input type="submit" value="查询" name="find"/>
   </form>
<br />
<br />
    <?php 
    include("../../function/conn.php");
	if(isset($_POST['courseNum'])){
		$c_id=$_POST['courseNum'];
		$result = mysql_query("select * from tb_course_base where c_id='$c_id'");
		$courseInfo=mysql_fetch_array($result);
		?>
<table width="600" cellspacing="0" cellpadding="2" border="1" bordercolor="#999999">
  <tr >
  <td>课程简称</td>
  <td>课程全称</td>
  <td>英文名称</td>
  <td>所属教研室</td>
  <td>课程类型</td>
  <td>学分</td>
  </tr>
  <tr>
  <td><?php echo $courseInfo['c_shortname'];?></td>
  <td><?php echo $courseInfo['c_longname'];?></td>
  <td><?php echo $courseInfo['c_englishname'];?></td>
  <td><?php echo $courseInfo['c_office'];?></td>
  <td><?php echo $courseInfo['c_type'];?></td>
  <td><?php echo $courseInfo['c_credit'];?></td>
  </tr>
</table>
	<?php
		}
	?>

</body>
</html>