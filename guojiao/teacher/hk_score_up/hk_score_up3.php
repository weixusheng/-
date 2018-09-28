<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="bgcc">
<?php
	$c_id=$_GET['c_id'];
	include("../../function/conn.php");
    $gsql=mysql_query("select s_id from tb_score where c_id='$c_id' and exam_type=1",$conn);
	$ginfo=mysql_fetch_array($gsql);
	do{  
   		$s_id=$ginfo["s_id"];
   		$getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
		$stuinfo=mysql_fetch_array($getstu);
		do{
			if($stuinfo!=NULL){

				$name=$s_id;
				if($_POST[$name]!=''){ //判断成绩是否为空
					switch($_POST[$name]) {
					case 'A':$hk_score=95;break;
					case 'A-':$hk_score=92;break;
					case 'B+':$hk_score=89;break;
					case 'B':$hk_score=85;break;
					case 'B-':$hk_score=82;break;
					case 'C+':$hk_score=79;break;
					case 'C':$hk_score=75;break;
					case 'C-':$hk_score=72;break;
					case 'D+':$hk_score=69;break;
					case 'D':$hk_score=65;break;
					case 'F':$hk_score=0;break;
					default :$hk_score=$_POST[$name];break;
					}
					$sql=mysql_query("update tb_score set score='$hk_score',exam_type=0 where c_id='$c_id' and s_id='$s_id'",$conn);
		 		}
				else{
					$sql=mysql_query("update tb_score set score=NULL,exam_type=1 where c_id='$c_id' and s_id='$s_id'",$conn);
					}
		  }
		}while($stuinfo=mysql_fetch_array($getstu));
	}while($ginfo=mysql_fetch_array($gsql));
		
	if($sql) echo("<script> alert('缓考成绩上传成功！');window.parent.location.href='hk_score_up.php' </script>");?>
</body>
</html>