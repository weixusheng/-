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
	$c_class=$_GET['class_name'];
	$s_term=$_GET['term'];
	include("../../function/conn.php");
	$gsql=mysql_query("select s_id from tb_score where c_id='$c_id' and s_term='$s_term'",$conn);
	$ginfo=mysql_fetch_array($gsql);
	$k=1;$j=1;
	do{ 
		
		$s_id=$ginfo['s_id'];
		$getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and now_class='$c_class' and (stu_status=0 or stu_status=4)",$conn);
		$stuinfo=mysql_fetch_array($getstu);
			do{
				if($stuinfo!=NULL){
					$name="score".$k++;
					$exam="select".$j++;
					$exam_type=$_POST[$exam];
					if($exam_type==0){//判断考试类型是否正常
					if($_POST[$name]!=''){ //判断成绩是否为空
						switch($_POST[$name]) {//经贸成绩存法
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
					$usql=mysql_query("update tb_score set score='$score',exam_type=0 where s_id='$s_id' and c_id='$c_id' and s_term='$s_term'");
					}
				   else{//若成绩为空，将score值设为NULL
						$usql=mysql_query("update tb_score set score=NULL,exam_type=0 where s_id='$s_id' and c_id='$c_id' and s_term='$s_term'");
						}
					}
					else{//考试类型不正常
					if($exam_type==1)//缓考，将score值设为NULL
						$usql=mysql_query("update tb_score set score=NULL,exam_type=1 where s_id='$s_id' and c_id='$c_id' and s_term='$s_term'");
					if($exam_type==2)//缺考，将score值设为0
						$usql=mysql_query("update tb_score set score=0,exam_type=2 where s_id='$s_id' and c_id='$c_id' and s_term='$s_term'");
					if($exam_type==3)//禁考，将score值设为0
						$usql=mysql_query("update tb_score set score=0,exam_type=3 where s_id='$s_id' and c_id='$c_id' and s_term='$s_term'");
						}
		      }
			}while($stuinfo=mysql_fetch_array($getstu));
	  }while($ginfo=mysql_fetch_array($gsql));
	echo "<script>alert('上传成功');window.parent.location.href='score_up.php';</script>";
?>
</body>
</html>