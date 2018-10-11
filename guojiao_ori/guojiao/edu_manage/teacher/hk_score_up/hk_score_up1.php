<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" href="../../css/style.css" rel="stylesheet" />
</head>
<body class="bgcc">
<?php
	$c_class=$_POST['class_name'];
	$term=$_POST['term'];
	$cb_id=$_POST['subject'];	
	include("../../function/conn.php");
	$getsql=mysql_query("select ID from tb_course2_term where cb_id='$cb_id' and c_class='$c_class' and term='$term'",$conn);
	$getinfo=mysql_fetch_array($getsql);
	$c_id=$getinfo['ID'];
	
   $gsql=mysql_query("select s_id from tb_score where c_id='$c_id' and exam_type=1",$conn);
   $ginfo=mysql_fetch_array($gsql);
   if($ginfo=="") echo("<script> alert('没有申请缓考的学生！');window.parent.location.href='hk_score_up.php' </script>"); 
   else{?>
<form id="form1" name="form1" method="post" action="hk_score_up2.php?c_id=<?php echo $c_id;?>" target="window">
  <table width="450" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="150" align="center" class="boder_style">学生学号</td>
      <td width="150" align="center" class="boder_style">学生姓名</td>
      <td width="150" align="center" class="boder_style">缓考成绩</td>
    </tr>
    <?php 
		do{	
		   $s_id=$ginfo["s_id"];	
		   $getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
		   $stuinfo=mysql_fetch_array($getstu);
		   do{
			   if($stuinfo!=NULL){
?>
    <tr>
      <td width="150" align="center" class="boder_style"><?php echo $stuinfo['s_no']; ?></td>
      <td width="150" align="center" class="boder_style"><?php echo $stuinfo['s_name']; if($stuinfo['is_dragon']==1) echo "(龙舟队员)";?></td>
      <td width="150" align="center" class="boder_style"><label for="textfield"></label>
      <input name="<?php echo $s_id; ?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF" /></td>
    </tr><?php
			   }
			}while($stuinfo=mysql_fetch_array($getstu));
						   
		}while($ginfo=mysql_fetch_array($gsql));
	}?>
    <tr>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="205" align="right"><input name="submit" type="submit" value="保存" id="submit" /></td>
          <td width="40">&nbsp;</td>
          <td width="205" align="left"><input name="reset" type="reset" value="重置" id="reset" /></td>
        </tr>
      </table></td>
    </tr>  
  </table>
</form>
</body>
</html>
