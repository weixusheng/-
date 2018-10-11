<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>
<body  class="bgcc">
<?php
	$flag=0;//标记是否存在符合条件的重修学生
	$term=$_POST['term'];
	$c_id=$_POST['subject'];	
	include("../../../function/conn.php");
	$gsql=mysql_query("select s_id from tb_chongxiu where chongxiu_term='$term' and c_id='$c_id'",$conn);
	$ginfo=mysql_fetch_array($gsql);
	/*echo "<script> alert('没有可修改的重修成绩\\n如需修改，请申请教学秘书授权！');window.parent.location.href='ck_score.php' </script>";*/
	 ?>
<form id="form1" name="form1" method="post" action="ck_score2.php?term=<?php echo $term;?>&c_id=<?php echo $c_id;?>" target="window">
  <table width="450" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="150" align="center">学生学号</td>
      <td width="150" align="center">学生姓名</td>
      <td width="150" align="center">重考成绩</td>
    </tr>
    <?php
    do{  
		   $s_id=$ginfo['s_id'];
		   $get_can_change=mysql_query("select ck1_can_change,ck2_can_change,ck3_can_change,ck1_score,ck2_score,ck3_score from tb_score where s_id='$s_id' and c_id='$c_id'");
		   $can_change_info=mysql_fetch_array($get_can_change);
		   if($can_change_info['ck1_can_change']==0&&$can_change_info['ck2_can_change']==0&&$can_change_info['ck3_can_change']==0)
			   continue;
		   else{
				   $flag=1;
				   $getstu=mysql_query("select ID,s_no,s_name,is_dragon,now_class from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
				   $stuinfo=mysql_fetch_array($getstu);
				   if($stuinfo!=''){
					   $c_class=$stuinfo['now_class'];
			?>
			<tr>
			  <td width="150" align="center"><?php echo $stuinfo['s_no']; ?></td>
			  <td width="150" align="center"><?php echo $stuinfo['s_name'];if($stuinfo['is_dragon']==1) echo "（龙舟队员）" ; ?></td>
			  <td width="150" align="center"><label for="textfield"></label>
			  <input name="<?php echo $s_id; ?>" type="text" id="textfield" 
			  value="<?php if($can_change_info['ck1_can_change']=='1' ){
								  if(substr($c_class,0,3)=='经')
								  {			switch($can_change_info['ck1_score']) 
								  			{
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
						   		  else echo $can_change_info['ck1_score']; 
							}
						   if($can_change_info['ck2_can_change']=='1'){ 
								  if(substr($c_class,0,3)=='经')
								  {			switch($can_change_info['ck2_score']) 
								  			{
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
						  		  else echo $can_change_info['ck2_score']; 
							}
						   if($can_change_info['ck3_can_change']=='1'){
							  if(substr($c_class,0,3)=='经')
							  {			switch($can_change_info['ck3_score']) 
							  			{
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
						      else echo $can_change_info['ck3_score']; 
						   }?>" size="4" /></td>
			</tr><?php
				   }
		   }
    }while($ginfo=mysql_fetch_array($gsql));
	if($flag==0) echo "<script> alert('没有可修改的重修成绩\\n如需修改，请申请教学秘书授权！');window.parent.location.href='ck_score.php' </script>";
	?>
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
