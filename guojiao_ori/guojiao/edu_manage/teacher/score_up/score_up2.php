<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="../../css/teacher.css" rel="stylesheet" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<script language="javascript" type="text/javascript">
function go_back()
{history.go(-1);}
</script>
</head>

<body class="bgcc">
<img src="../../images/loading.gif" style="display:none" />
<?php
	$c_id=$_GET['c_id'];
	$c_class=$_GET['class_name'];
	$s_term=$_GET['term'];
	include("../../function/conn.php");
	$gsql=mysql_query("select s_id from tb_score where c_id='$c_id' and s_term='$s_term'",$conn);
	$ginfo=mysql_fetch_array($gsql);
		?>
<form id="form1" name="form1" method="post" action="score_up3.php?c_id=<?php echo $c_id;?>&class_name=<?php echo $c_class;?>&term=<?php echo $s_term;?>" target="window" onsubmit="document.getElementById('all_table').innerHTML='<img src=\'../../images/loading.gif\' /><font size=\'2\' color=\'#FF0000\'>正在处理，请耐心等待</font>';document.getElementById('all_table').align='right'">
请您核对考试成绩是否正确：
  <table width="600" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="150" align="center" class="boder_style">学生学号</td>
      <td width="150" align="center" class="boder_style">学生姓名</td>
      <td width="150" align="center" class="boder_style">考试状态</td>
      <td width="150" align="center" class="boder_style">考试成绩</td>
    </tr>
    <?php
   $k=1;$j=1;
   do{ 
		   
		   $s_id=$ginfo['s_id'];
		   $getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and now_class='$c_class' and (stu_status=0 or stu_status=4)",$conn);
		   $stuinfo=mysql_fetch_array($getstu);
		 do{
			  
			 if($stuinfo!=NULL){
				 $name="score".$k++;?>
    <tr>
      <td width="150" align="center" class="boder_style"><?php echo $stuinfo['s_no']; ?></td>
      <td width="150" align="center" class="boder_style"><?php echo $stuinfo['s_name'];if($stuinfo['is_dragon']==1) echo "(龙舟队员)"; ?></td>
      <td width="150" align="center" class="boder_style">
	  <?php $exam="select".$j++; 
	        switch($exam_type=$_POST[$exam])
	      {
			  case 0: echo "正常";break;
			  case 1: echo "缓考";break;
			  case 2: echo "缺考";break;
			  case 3: echo "禁考";break;
				  } ?></td>
      <input type="hidden" name="<?php echo $exam; ?>" value="<?php echo $exam_type; ?>"/>
      <td width="150" align="center" class="boder_style">
		  <?php $score=$_POST[$name];
                switch($exam_type)
                {
                  case 0: echo $score;break;
                  case 1: echo "缓考";break;
                  case 2: echo "缺考0分";break;
                  case 3: echo "禁考0分";break;
                      }	  ?>
                      </td>
      <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $score; ?>"/>
    </tr> <?php
			 }
			 }while($stuinfo=mysql_fetch_array($getstu));
	}while($ginfo=mysql_fetch_array($gsql));
						?>
   
    <tr>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
      <td height="60" align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center"><table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="205" align="right" id="all_table"><input name="submit" type="submit" value="上传成绩" id="submit" /></td>
          <td width="40">&nbsp;</td>
          <td width="205" align="left"><input name="back" type="button" value="修改" id="back" onclick="go_back()"/></td>
        </tr>
      </table></td>
    </tr>
   
  </table>
</form>
</body>
</html>