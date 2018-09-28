<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<script language="javascript" type="text/javascript">
function go_back()
{history.go(-1);}
</script> 
</head>

<body class="bgcc">
<img src="../../images/loading.gif" style="display:none;" />
<?php
	$c_id=$_GET['c_id'];
	include("../../function/conn.php");
	$gsql=mysql_query("select s_id from tb_score where score is not NULL and score<60 and c_id='$c_id' and exam_type!=2 and exam_type!=3",$conn);
	$ginfo=mysql_fetch_array($gsql);
	?>
    <form id="form1" name="form1" method="post" action="bk_score_up3.php?c_id=<?php echo $c_id;?>" target="window" onsubmit="document.getElementById('all_table').innerHTML='<img src=\'../../images/loading.gif\' /><font size=\'2\' color=\'#FF0000\'>正在处理，请耐心等待</font>';document.getElementById('all_table').align='right'">
     请您核对考试成绩是否正确：                   
  <table width="600" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="150" align="center">学生学号</td>
      <td width="150" align="center">学生姓名</td>
      <td width="150" align="center">考试状态</td>
      <td width="150" align="center">补考成绩</td>
    </tr>
    <?php do{  
				$s_id=$ginfo["s_id"];
				$getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
				$stuinfo=mysql_fetch_array($getstu);
			do{
			   if($stuinfo!=NULL){
?>
    <tr>
      <td width="150" align="center"><?php echo $stuinfo['s_no']; ?></td>
      <td width="150" align="center"><?php echo $stuinfo['s_name']; if($stuinfo['is_dragon']==1) echo "(龙舟队员)";?></td>
      <td width="150" align="center"><?php $type="select".$s_id; 
                                            switch($bk_type=$_POST[$type])
                                           {
                                              case 0: echo "正常";break;
                                              case 2: echo "缺考";break;
                                                  } ?>
                                           <input type="hidden" name="<?php echo $type; ?>" value="<?php echo $bk_type; ?>"/>
</td>
      <td width="150" align="center">
      <?php $name=$s_id; if($bk_type==2) echo "缺考0分";else {echo $bk_score=$_POST[$name]; } ?>    </td>
      <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $bk_score=$_POST[$name]; ?>"/> 
    </tr>
	<?php 
			   }
			}while($stuinfo=mysql_fetch_array($getstu));
	}while($ginfo=mysql_fetch_array($gsql));
						  		?>
    <tr>
      <td height="60">&nbsp;</td>
      <td height="60">&nbsp;</td>
      <td height="60">&nbsp;</td>
      <td height="60">&nbsp;</td>
    </tr> 
     <tr>
      <td colspan="4" align="center"><table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="205" align="right" id="all_table"><input name="submit" type="submit" value="上传" id="submit" /></td>
          <td width="40">&nbsp;</td>
          <td width="205" align="left"><input name="back" type="button" value="修改" id="back" onclick="go_back()"/>
         </td>
        </tr>
      </table></td>
    </tr>
    
  </table>
  </form>
</body>
</html>
