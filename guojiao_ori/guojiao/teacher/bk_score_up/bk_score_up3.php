<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="bgc">
<?php
	$c_id=$_GET['c_id'];
	include("../../function/conn.php");
	$gsql=mysql_query("select s_id from tb_score where score is not NULL and score<60 and c_id='$c_id' and exam_type!=2 and exam_type!=3",$conn);
	$ginfo=mysql_fetch_array($gsql);
   do{ 
   		$s_id=$ginfo["s_id"];
   		$getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
		$stuinfo=mysql_fetch_array($getstu);
		do{
			if($stuinfo!=NULL){

				$name=$s_id;
				$type="select".$s_id;
				$bk_type=$_POST[$type];
				if($bk_type==0){
					if($_POST[$name]!=''){ //判断成绩是否为空
						switch($_POST[$name]) {
						case 'A':$bk_score=95;break;
						case 'A-':$bk_score=92;break;
						case 'B+':$bk_score=89;break;
						case 'B':$bk_score=85;break;
						case 'B-':$bk_score=82;break;
						case 'C+':$bk_score=79;break;
						case 'C':$bk_score=75;break;
						case 'C-':$bk_score=72;break;
						case 'D+':$bk_score=69;break;
						case 'D':$bk_score=65;break;
						case 'F':$bk_score=0;break;
						default :$bk_score=$_POST[$name];break;
						}
					$sql=mysql_query("update tb_score set bk_score='$bk_score',bk_type=0 where c_id='$c_id' and s_id='$s_id'",$conn);
					}
					else{
					$sql=mysql_query("update tb_score set bk_score=NULL,bk_type=0 where c_id='$c_id' and s_id='$s_id'",$conn);
					}
				}
				else
				$sql=mysql_query("update tb_score set bk_score=0,bk_type=2 where c_id='$c_id' and s_id='$s_id'",$conn);
			
			}
		}while($stuinfo=mysql_fetch_array($getstu));
      }while($ginfo=mysql_fetch_array($gsql));
	if($sql) echo("<script> alert('补考成绩上传成功！');window.parent.location.href='bk_score_up.php' </script>");		
						   ?>
    
</body>
</html>
