<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" href="../../css/style.css" rel="stylesheet" />
</head>
<body class="bgcc">
<table width="450" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="150" align="center" class="boder_style">学生学号</td>
  <td width="150" align="center" class="boder_style">学生姓名</td>
  <td width="150" align="center" class="boder_style">重考成绩</td>
</tr>    
<?php
	$term=$_POST['term'];
	$c_id=$_POST['subject'];//接到的是tb_course2_term的ID,即tb_score的c_id
	include("../../function/conn.php");
?>
<form id="form1" name="form1" method="post" action="ck_score_up2.php?term=<?php echo $term;?>&c_id=<?php echo $c_id;?>" target="window">
	<?php
    $flag=0;	
	$gsql=mysql_query("select s_id from tb_chongxiu where chongxiu_term='$term' and c_id='$c_id'",$conn);
    $ginfo=mysql_fetch_array($gsql);
	if($ginfo=="") echo("<script> alert('没有重修的学生！');window.parent.location.href='ck_score_up.php' </script>");
	
	else{
	  do{
		   $s_id=$ginfo["s_id"];
		   $getstu=mysql_query("select ID,s_no,s_name,is_dragon,now_class from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
		   $stuinfo=mysql_fetch_array($getstu);
		   do{ $c_class=$getstu['now_class'];
			   if($stuinfo!=NULL){
			?>
             <tr>
                  <td width="150" align="center" class="boder_style"><?php echo $stuinfo['s_no']; ?></td>
                  <td width="150" align="center" class="boder_style"><?php echo $stuinfo['s_name']; if($stuinfo['is_dragon']==1) echo "(龙舟队员)";?></td>
                  <td width="150" align="center" class="boder_style"><label for="textfield"></label>
                  <?php
				  $sql=mysql_query("select ck1_score,ck2_score,ck3_score,ck1_verify,ck2_verify,ck3_verify from tb_score where c_id='$c_id' and s_id='$s_id'");
				  $info=mysql_fetch_array($sql);
				  if($info['ck1_score']==""){ $which=1;//用which标记最后将成绩更新至ck1,ck2,ck3哪个字段中
				  ?>
                  <input name="<?php echo $s_id; ?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF"/>
                  <?php }
				  else{
				  		if($info['ck1_verify']==0){ $flag=1;?><input name="<?php echo $s_id; ?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF" value="<?php 
					  if(substr($c_class,0,3)=='经')
					  {			switch($info['ck1_score']) {
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
					else echo $info['ck1_score']?>" readonly="readonly" onclick="alert('不允许修改')"/>
                  <?php }
				 		else{
				  				if($info['ck2_score']==""){ $which=2;?>
                                <input name="<?php echo $s_id; ?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF"/>
								<?php	}
								else{ 
										if($info['ck2_verify']==0){ $flag=1;?><input name="<?php echo $s_id; ?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF" value="<?php 
									  if(substr($c_class,0,3)=='经')
									  {			switch($info['ck2_score']) {
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
										else echo $info['ck2_score']?>" readonly="readonly" onclick="alert('不允许修改')"/>
                                        <?php }
										else{
											if($info['ck3_score']==""){ $which=3;?>
                                			<input name="<?php echo $s_id; ?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF"/>
                                            <?php }
											else{
												$flag=1; ?><input name="<?php echo $s_id; ?>" type="text" id="textfield" size="4" style="background:#BCCCDD; border:1px solid #FFF" value="<?php 
											  if(substr($c_class,0,3)=='经')
											  {			switch($info['ck3_score']) {
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
												else echo $info['ck3_score']?>" readonly="readonly" onclick="alert('不允许修改')"/>
                                                <?php } ?>
                  </td>
            </tr><?php 
				  						}
				  				}
						}
				  }
			   }
			   
		   }while($stuinfo=mysql_fetch_array($getstu));
	}while($ginfo=mysql_fetch_array($gsql));
	}
	?>
    <tr>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="205" align="right"><input name="submit" type="submit" value="保存" id="submit" <?php if($flag) echo "disabled='disabled'"?>  /></td>
          <td width="40">&nbsp;</td>
          <td width="205" align="left"><input name="reset" type="reset" value="重置" id="reset" <?php if($flag) echo "disabled='disabled'"?>/></td>
        </tr>
      </table></td>
    </tr>
    <input type="hidden" name="which" value="<?php echo $which ?>"/>
   </form>
  </table>
</body>
</html>
