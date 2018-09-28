<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body class="bgcc">
	  <table width="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td width="150" align="center" class="boder_style">学生学号</td>
		  <td width="150" align="center" class="boder_style">学生姓名</td>
          <td width="150" align="center" class="boder_style">考试状态</td>
		  <td width="150" align="center" class="boder_style">补考成绩</td>
		</tr>
<?php
	$c_class=$_POST['class_name'];
	$cb_id=$_POST['subject'];
	include("../../function/conn.php");
	$c_idsql=mysql_query("select c_id from tb_course_base where ID='$cb_id'");
	$getc_id=mysql_fetch_array($c_idsql);
	if(substr($getc_id['c_id'],0,2)=='16'&&substr($c_class,0,3)=='经') echo("<script> alert('该班级的此科目不需要补考！');window.parent.location.href='bk_score_up.php' </script>");
	else{
	$s_term=$_POST['term'];
	$getsql=mysql_query("select ID from tb_course2_term where cb_id='$cb_id' and c_class='$c_class' and term='$s_term'",$conn);
	$getinfo=mysql_fetch_array($getsql);
	$c_id=$getinfo['ID'];?>
	<form id="form1" name="form1" method="post" action="bk_score_up2.php?&c_id=<?php echo $c_id;?>" target="window">
	<?php 
	$gsql=mysql_query("select s_id from tb_score where score is not NULL and score<60 and c_id='$c_id' and exam_type!=2 and exam_type!=3",$conn);
	$ginfo=mysql_fetch_array($gsql);
	if($ginfo["s_id"]=="") echo("<script> alert('没有参加补考的学生！');window.parent.location.href='bk_score_up.php' </script>");
	else{
		$flag=0;
		do{	
		   $s_id=$ginfo["s_id"];	
		   $getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
		   $stuinfo=mysql_fetch_array($getstu);
		   do{
			   if($stuinfo!=NULL){
			?>
		<tr>
		  <td width="150" align="center"><?php echo $stuinfo['s_no']; ?></td>
		  <td width="150" align="center"><?php echo $stuinfo['s_name']; if($stuinfo['is_dragon']==1) echo "(龙舟队员)";?></td>
		  
		  <?php
		  $sql=mysql_query("select bk_score,bk_type from tb_score where s_id='$s_id' and c_id='$c_id'");
		  $info=mysql_fetch_array($sql);
		  ?>
          <td width="150" align="center">
		  				<?php 
						  if($info['bk_type']!=""){ ?>
							  <select name="<?php echo "select".$s_id; ?>" id="select">
							  <option value="0" <?php  if($info['bk_type']==0) echo "selected=\"selected\"";?> >正常</option>
							  <option value="2" <?php  if($info['bk_type']==2) echo "selected=\"selected\"";?> >缺考</option>
							  </select>
					      <?php }else{?>
                           <select name="<?php echo "select".$s_id; ?>" id="select" style="background:#BCCCDD; padding:0px; margin:-4px;width:70px;">
                            <option value="0" selected="selected">正常</option>
                            <option value="2">缺考</option>
                          </select>
                          <?php } ?>
           </td>
          <td width="150" align="center"><label for="textfield"></label>
          <?php
		  if($info['bk_score']=='') {
		  ?>
		  <input name="<?php echo $s_id; ?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF"/>
		  <?php } 
		  else { $flag=1;?><input name="<?php echo $s_id; ?>" value="<?php 
				  if(substr($c_class,0,3)=='经')
				  {			switch($info['bk_score']) {
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
				  else echo $info['bk_score'];?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF" readonly="readonly" onclick="alert('不允许修改')"/>
		  <?php }
		  ?></td>
		</tr><?php
		}
		   
		 }while($stuinfo=mysql_fetch_array($getstu));
		
	  }while($ginfo=mysql_fetch_array($gsql));
	}
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
          <td width="205" align="right"><input name="submit" type="submit" value="保存" id="submit" <?php if($flag){ echo "disabled='disabled'"; }?>/></td>
          <td width="40">&nbsp;</td>
          <td width="205" align="left"><input name="reset" type="reset" value="重置" id="reset" <?php if($flag){ echo "disabled='disabled'" ;}?>/></td>
        </tr>
      </table></td>
    </tr>
    
   </form>
  </table>
<?php } ?>
</body>
</html>
