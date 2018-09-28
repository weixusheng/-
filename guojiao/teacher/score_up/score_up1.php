<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="../../css/teacher.css" rel="stylesheet" />
<link type="text/css" href="../../css/style.css" rel="stylesheet" />
<title>无标题文档</title>
</head>

<body class="bgcc">
<?php
     $c_class=$_POST['class_name'];
	 $grade=$_POST['grade_code'];
	 $term=$_POST['term'];
	 $cb_id=$_POST['subject'];
	include("../../function/conn.php");
	$getsql=mysql_query("select ID from tb_course2_term where c_class='$c_class' and cb_id='$cb_id' and term='$term' and grade='$grade'",$conn);
    $getinfo=mysql_fetch_array($getsql);
    $c_id=$getinfo['ID'];

   $gsql=mysql_query("select s_id from tb_score where c_id='$c_id' and s_term='$term'",$conn);
   $ginfo=mysql_fetch_array($gsql);


		?>
<form id="form1" name="form1" method="post" action="score_up2.php?c_id=<?php echo $c_id;?>&class_name=<?php echo $c_class;?>&term=<?php echo $term;?>" target="window">

  <table width="600" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="150" align="center" class="boder_style">学生学号</td>
      <td width="150" align="center" class="boder_style">学生姓名</td>
      <td width="150" align="center" class="boder_style">考试状态</td>
      <td width="150" align="center" class="boder_style">考试成绩</td>
    </tr>
    <?php
	   $k=1;$j=1;$s=1;$flag=0;
		do{
		   $s_id=$ginfo['s_id'];
		   $getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and now_class='$c_class' and (stu_status=0 or stu_status=4)",$conn);
		   $stuinfo=mysql_fetch_array($getstu);
		   do{
			   if($stuinfo!=NULL){
		?>
		<tr>
		  <td width="150" align="center" class="boder_style"><?php echo $stuinfo['s_no']; ?></td>
		  <td width="150" align="center" class="boder_style"><?php echo $stuinfo['s_name'];if($stuinfo['is_dragon']==1) echo "(龙舟队员)";?></td>
		  <td width="150" align="center" class="boder_style" valign="middle">
		  <span style="overflow:hidden;padding:0px; margin:0px; height:20px; width:65px; display:block;">
		  <?php
			$se_sql=mysql_query("select exam_type from tb_score where s_id='$s_id' and c_id ='$c_id'and s_term='$term'");
			$se_info=mysql_fetch_array($se_sql);
			if($se_info['exam_type']!=''){
			?>
          <select name="<?php echo "select".$j++; ?>" id="select">
          <option value="0" <?php  if($se_info['exam_type']==0) echo "selected=\"selected\"";?> >正常</option>
          <option value="1" <?php  if($se_info['exam_type']==1) echo "selected=\"selected\"";?> >缓考</option>
          <option value="2" <?php  if($se_info['exam_type']==2) echo "selected=\"selected\"";?> >缺考</option>
          <option value="3" <?php  if($se_info['exam_type']==3) echo "selected=\"selected\"";?> >禁考</option>

        </select>
          <?php
			} else{
				?>
           <select name="<?php echo "select".$j++; ?>" id="select" style="background:#BCCCDD; padding:0px; margin:-4px;width:70px;">
			<option value="0" selected="selected">正常</option>
			<option value="1">缓考</option>
			<option value="2">缺考</option>
            <option value="3">禁考</option>
		  </select></span>
          <?php } ?></td><td width="150" align="center" class="boder_style">
		  <?php
			
			$sql=mysql_query("select score from tb_score where s_id='$s_id' and c_id ='$c_id' and s_term='$term'");
			$info=mysql_fetch_array($sql);
			if($info['score']!=''){
				$flag=1;
		  ?><input name="<?php echo "score".$k++; ?>" value="<?php 	  
		  if(substr($c_class,0,3)=='经')
	      {			switch($info['score']) {
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
		  else echo $info['score']; ?>" type="text" id="score" size="4"  style="background:#BCCCDD; border:1px solid #FFF" readonly="readonly" onclick="alert('不允许修改,请到修改成绩中修改')"/>
		  <?php
		  } else{
		  ?><input name="<?php echo "score".$k++; ?>" type="text" id="score" size="4"  style="background:#BCCCDD; border:1px solid #FFF" tabindex="<?php echo $s=$s+2;?>" />
		  <?php }?></td>
		</tr> <?php
			   }
	    }while($stuinfo=mysql_fetch_array($getstu));
		}while($ginfo=mysql_fetch_array($gsql));
						?>
   
    <tr height="20">
      <td colspan="4" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center"><table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="205" align="right"><input name="submit" type="submit" value="预览" id="submit" <?php if($flag) echo "disabled='disabled'"?> /></td>
          <td width="40">&nbsp;</td>
          <td width="205" align="left"><input name="reset" type="reset" value="重置" id="reset" <?php if($flag) echo "disabled='disabled'"?> /></td>
        </tr>
      </table></td>
    </tr>
   
  </table>
</form>
</body>
</html>