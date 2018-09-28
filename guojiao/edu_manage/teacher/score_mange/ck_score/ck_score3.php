<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	$term=$_GET['term'];
	$c_id=$_GET['c_id'];
	include("../../../function/conn.php");
	$gsql=mysql_query("select s_id from tb_chongxiu where chongxiu_term='$term' and c_id='$c_id'",$conn);
    $ginfo=mysql_fetch_array($gsql);
	do{  
		   $s_id=$ginfo['s_id'];
		   $get_can_change=mysql_query("select ck1_can_change,ck2_can_change,ck3_can_change from tb_score where s_id='$s_id' and c_id='$c_id'");
		   $can_change_info=mysql_fetch_array($get_can_change);
		   if($can_change_info['ck1_can_change']==0&&$can_change_info['ck2_can_change']==0&&$can_change_info['ck3_can_change']==0)
			   continue;
		   else{
				   $getstu=mysql_query("select ID from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
				   $stuinfo=mysql_fetch_array($getstu);
				   if($stuinfo!=''){
					    $name=$s_id;
						if($_POST[$name]!=''){
							switch($_POST[$name]) {
							case 'A':$ck_score=95;break;
							case 'A-':$ck_score=92;break;
							case 'B+':$ck_score=89;break;
							case 'B':$ck_score=85;break;
							case 'B-':$ck_score=82;break;
							case 'C+':$ck_score=79;break;
							case 'C':$ck_score=75;break;
							case 'C-':$ck_score=72;break;
							case 'D+':$ck_score=69;break;
							case 'D':$ck_score=65;break;
							case 'F':$ck_score=0;break;
							default :$ck_score=$_POST[$name];break;
							}
							if($can_change_info['ck1_can_change']=='1')
						    $sql=mysql_query("update tb_score set ck1_score='$ck_score',ck1_can_change=0,ck1_verify=0 where  c_id='$c_id' and s_id='$name'",$conn);
							if ($can_change_info['ck2_can_change']=='1')
							$sql=mysql_query("update tb_score set ck2_score='$ck_score',ck2_can_change=0,ck2_verify=0 where  c_id='$c_id' and s_id='$name'",$conn);
							if($can_change_info['ck3_can_change']=='1')
							$sql=mysql_query("update tb_score set ck3_score='$ck_score',ck3_can_change=0,ck3_verify=0 where  c_id='$c_id' and s_id='$name'",$conn); 
						}
						else{
							if($can_change_info['ck1_can_change']=='1')
						    $sql=mysql_query("update tb_score set ck1_score=NULL,ck1_can_change=0,ck1_verify=0 where  c_id='$c_id' and s_id='$name'",$conn);
							if ($can_change_info['ck2_can_change']=='1')
							$sql=mysql_query("update tb_score set ck2_score=NULL,ck2_can_change=0,ck2_verify=0 where  c_id='$c_id' and s_id='$name'",$conn);
							if($can_change_info['ck3_can_change']=='1')
							$sql=mysql_query("update tb_score set ck3_score=NULL,ck3_can_change=0,ck3_verify=0 where  c_id='$c_id' and s_id='$name'",$conn); 
						}
				}
		   }
		}while($ginfo=mysql_fetch_array($gsql));
		
	echo("<script> alert('重考成绩修改成功！');window.parent.location.href='ck_score.php' </script>");?>
 
    
   
  </table>
</body>
</html>