<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="bgcc">
<?php
	$c_id=$_GET['c_id'];
	include("../../../function/conn.php");
	$k=1;$j=1;
	$gsql=mysql_query("select tb_s_information.ID from tb_s_information,tb_score where tb_score.s_id=tb_s_information.ID and (tb_s_information.stu_status='0' or stu_status=4) and tb_score.c_id='$c_id' and tb_score.can_change='1'",$conn);
	$ginfo=mysql_fetch_array($gsql);
	do{ 
		$s_id=$ginfo['ID'];
    	$name="score".$k++;
		$exam="select".$j++; 
		$exam_type=$_POST[$exam];
		if($exam_type==0){
			if($_POST[$name]!=''){
				switch($_POST[$name]) {
				case 'A':$score=95;break;
				case 'A-':$score=92;break;
				case 'B+':$score=89;break;
				case 'B':$score=85;break;
				case 'B-':$score=82;break;
				case 'C+':$score=79;break;
				case 'C':$score=75;break;
				case 'C-':$score=72;break;
				case 'D+':$score=69;break;
				case 'D':$score=65;break;
				case 'F':$score=0;break;
				default :$score=$_POST[$name];break;
				}
				$usql=mysql_query("update tb_score set score='$score',exam_type=0,can_change=0,verify=0 where s_id='$s_id' and c_id='$c_id'");
			}else{
				$usql=mysql_query("update tb_score set score=NULL,exam_type=0,can_change=0,verify=0 where s_id='$s_id' and c_id='$c_id'");
					}
		}else{
		    if($exam_type=='1')
			$usql=mysql_query("update tb_score set score=NULL,exam_type=1,can_change=0,verify=0 where s_id='$s_id' and c_id='$c_id'");
		    if($exam_type=='2')
			$usql=mysql_query("update tb_score set score=0,exam_type=2,can_change=0,verify=0 where s_id='$s_id' and c_id='$c_id'");
		    if($exam_type=='3')
			$usql=mysql_query("update tb_score set score=0,exam_type=3,can_change=0,verify=0 where s_id='$s_id' and c_id='$c_id'");
		}
	}while($ginfo=mysql_fetch_array($gsql));
	echo "<script>alert('成绩上传成功!');window.parent.location.href='score.php';</script>";
?>
</body>
</html>