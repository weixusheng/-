<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
<script language="javascript" type="text/javascript">
function go_back()
{history.go(-1);}
</script> 
</head>
<body class="bgcc">
<img src="../../../images/loading.gif" style="display:none;" />
<?php
	
	$term=$_GET['term'];
	$c_id=$_GET['c_id'];
	include("../../../function/conn.php");
	$gsql=mysql_query("select s_id from tb_chongxiu where chongxiu_term='$term' and c_id='$c_id'",$conn);
    $ginfo=mysql_fetch_array($gsql);?>
<form id="form1" name="form1" method="post" action="ck_score3.php?term=<?php echo $term;?>&c_id=<?php echo $c_id;?>" target="window" onsubmit="document.getElementById('all_table').innerHTML='<img src=\'../../../images/loading.gif\' /><font size=\'2\' color=\'#FF0000\'>正在处理，请耐心等待</font>';document.getElementById('all_table').align='right'">
请您核对考试成绩是否正确：
  <table width="450" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="300" align="center">学生学号</td>
      <td width="300" align="center">学生姓名</td>
      <td width="300" align="center">重考成绩</td>
    </tr>
    <?php
    do{  
		   $s_id=$ginfo['s_id'];
		   $get_can_change=mysql_query("select ck1_can_change,ck2_can_change,ck3_can_change from tb_score where s_id='$s_id' and c_id='$c_id'");
		   $can_change_info=mysql_fetch_array($get_can_change);
		   if($can_change_info['ck1_can_change']==0&&$can_change_info['ck2_can_change']==0&&$can_change_info['ck3_can_change']==0)
			   continue;
		   else{
				   $getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
				   $stuinfo=mysql_fetch_array($getstu);
				   if($stuinfo!=''){				   
			?>
    <tr>
      <td width="150" align="center"><?php echo $stuinfo['s_no']; ?></td>
      <td width="150" align="center"><?php echo $stuinfo['s_name']; if($stuinfo['is_dragon']==1) echo "（龙舟队员）" ;?></td>
      <td width="150" align="center"><?php $name=$s_id; echo $ck_score=$_POST[$name]; ?></td>
      <input type="hidden" name="<?php echo $name?>" value="<?php echo $ck_score ?>"/>
    </tr><?php
				   }
		   }
						   
	}while($ginfo=mysql_fetch_array($gsql));
						   ?>
    <tr>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"> <table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="205" align="right" id="all_table"><input name="submit" type="submit" value="上传" id="submit" /></td>
          <td width="40">&nbsp;</td>
          <td width="205" align="left"><input name="back" type="button" value="修改" id="back" onclick="go_back()"/></td>
        </tr>
      </table></td>
    </tr>
    
   
  </table>
</form>
</body>
</html>
