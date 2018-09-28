<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="bgcc">
<?php
	$term=$_GET['term'];
	$c_id=$_GET['c_id'];
	$which=$_GET['which'];
	include("../../function/conn.php");
	$gsql=mysql_query("select s_id from tb_chongxiu where chongxiu_term='$term' and c_id='$c_id'",$conn);
	$ginfo=mysql_fetch_array($gsql);
	 do{  $s_id=$ginfo['s_id'];
	      $name=$s_id;
		  $getstu=mysql_query("select ID,s_no,s_name,is_dragon from tb_s_information where ID='$s_id' and (stu_status=0 or stu_status=4)",$conn);
		  $stuinfo=mysql_fetch_array($getstu);
		  do{
				if($stuinfo!=NULL){
					if($_POST[$name]!=''){ //判断成绩是否为空
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
						if($which==1){$sql=mysql_query("update tb_score set ck1_score='$ck_score' where c_id='$c_id' and s_id='$s_id'",$conn);}
						if($which==2){$sql=mysql_query("update tb_score set ck2_score='$ck_score' where c_id='$c_id' and s_id='$s_id'",$conn);}
						if($which==3){$sql=mysql_query("update tb_score set ck3_score='$ck_score' where c_id='$c_id' and s_id='$s_id'",$conn);}
					}
					else{
						if($which==1){$sql=mysql_query("update tb_score set ck1_score=NULL where c_id='$c_id' and s_id='$s_id'",$conn);}
						if($which==2){$sql=mysql_query("update tb_score set ck2_score=NULL where c_id='$c_id' and s_id='$s_id'",$conn);}
						if($which==3){$sql=mysql_query("update tb_score set ck3_score=NULL where c_id='$c_id' and s_id='$s_id'",$conn);}
						}
				}
		  }while($stuinfo=mysql_fetch_array($getstu));
    }while($ginfo=mysql_fetch_array($gsql));
	echo("<script> alert('重考成绩上传成功！');window.parent.location.href='ck_score_up.php' </script>");				   ?>
</body>
</html>