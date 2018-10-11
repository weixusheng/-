<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="../../CSS/teacher.css" rel="stylesheet" />
<link href="../../../css/style.css" rel="stylesheet" type="text/css"/>

<title>无标题文档</title>
<!--<script language="javascript" type="text/javascript">
function cleardis()
{

document.forms['form1'].elements['abc'].disabled = '';
alert('fff');
form1.submit();
}
</script>
--></head>

<body class="bgcc">
<?php
    $c_class=$_POST['class_name'];
	$grade=$_POST['grade_code'];
	$term=$_POST['term'];
	$cb_id=$_POST['subject'];
	include("../../../function/conn.php");
	$getsql=mysql_query("select ID from tb_course2_term where c_class='$c_class' and cb_id='$cb_id' and term='$term' and grade='$grade'",$conn);
    $getinfo=mysql_fetch_array($getsql);
    $c_id=$getinfo['ID'];
	
	$gsql=mysql_query("select tb_s_information.s_no,tb_s_information.s_name,tb_s_information.is_dragon,tb_score.score,tb_score.exam_type,tb_score.can_change from tb_s_information,tb_score where tb_score.s_id=tb_s_information.ID and (tb_s_information.stu_status='0' or stu_status=4) and tb_score.c_id='$c_id' and tb_score.can_change='1'",$conn);
	$ginfo=mysql_fetch_array($gsql);
	if($ginfo==false){
		 echo "<script> alert('没有可修改的正考成绩\\n如需修改，请申请教学秘书授权！');window.parent.location.href='score.php' </script>";
	}else{
?>
<form id="form1" name="form1" method="post" onsubmit="cleardis()"  action="score2.php?c_id=<?php echo $c_id;?>" target="window">
  <table width="600" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="150" align="center" class="boder_style">学生学号</td>
      <td width="150" align="center" class="boder_style">学生姓名</td>
      <td width="150" align="center" class="boder_style">考试成绩</td>
      <td width="150" align="center" class="boder_style">考试状态</td>
    </tr>
    <?php
   $k=1;$j=1;
   do{  ?>
    <tr>
      <td width="150" align="center" class="boder_style"><?php echo $ginfo['s_no']; ?></td>
      <td width="150" align="center" class="boder_style"><?php echo $ginfo['s_name']; if ($ginfo['is_dragon']==1) echo "（龙舟队员）" ; ?></td>
      <td width="150" align="center" class="boder_style">
      <input name="<?php echo 'score'.$k++; ?>" type="text"  size="4" value="<?php 
	  if(substr($c_class,0,3)=='经')
	  {			switch($ginfo['score']) {
					case 95:echo 'A';break;
					case 92:echo 'A-';break;
					case 89:echo 'B+';break;
					case 85:echo 'B';break;
					case 82:echo 'B-';break;
					case 79:echo 'C+';break;
					case 75:echo 'C';break;
					case 72:echo 'C-';break;
					case 69:echo 'D+';break;
					case 65:echo 'D';break;
					case '0':echo 'F';break;
					default:echo '';break;
				  }
		} 
		else echo $ginfo['score']; ?>" id="abc" />
      </td>
      <td width="150" align="center" class="boder_style">
        <select name="<?php echo "select".$j++; ?>" id="select">
          <option value="0" <?php  if($ginfo['exam_type']==0) echo "selected=\"selected\"";?> >正常</option>
          <option value="1" <?php  if($ginfo['exam_type']==1) echo "selected=\"selected\"";?> >缓考</option>
          <option value="2" <?php  if($ginfo['exam_type']==2) echo "selected=\"selected\"";?> >缺考</option>
          <option value="3" <?php  if($ginfo['exam_type']==3) echo "selected=\"selected\"";?> >禁考</option>
        </select></td>
    </tr> <?php
						   
						   }while($ginfo=mysql_fetch_array($gsql));
						?>
   
    <tr>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center"><table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="205" align="right"><input name="submit" type="submit" value="保存" id="submit" /></td>
          <td width="40">&nbsp;</td>
          <td width="205" align="left"><input name="reset" type="reset" value="重置" id="reset" /></td>
        </tr>
      </table></td>
    </tr>
   
  </table>
</form>
<?php
	}
?>
</body>
</html>