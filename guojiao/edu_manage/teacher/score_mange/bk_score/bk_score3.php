<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="bgc">
<?php
	$c_id=$_GET['c_id'];
	include("../../../function/conn.php");
	$esql=mysql_query("select s_id from tb_score where score<60 and c_id='$c_id' and bk_can_change=1");
	$einfo=mysql_fetch_array($esql);
   do{
	    $s_id=$einfo['s_id'];
		$gsql=mysql_query("select ID from tb_s_information where ID='$s_id'and (stu_status=0 or stu_status=4)",$conn);
		$ginfo=mysql_fetch_array($gsql);
				if($ginfo!=NULL){
					$name=$s_id;
					$type="select".$s_id;
					$exam_type=$_POST[$type];
					if($exam_type==0){//判断考试类型是否正常
					if($_POST[$name]!=''){ //判断成绩是否为空
						switch($_POST[$name]) {//经贸成绩存法
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
					$usql=mysql_query("update tb_score set bk_score='$bk_score',bk_type=0,bk_can_change=0,bk_verify=0 where s_id='$s_id' and c_id='$c_id'");
					}
				   else{//若成绩为空，将bk_score值设为NULL
						$usql=mysql_query("update tb_score set bk_score=NULL,bk_type=0,bk_can_change=0,bk_verify=0 where s_id='$s_id' and c_id='$c_id'");
						}
					}
					else{//考试类型不正常
					if($exam_type==2)//缺考，将bk_score值设为0
						$usql=mysql_query("update tb_score set bk_score=0,bk_type=2,bk_can_change=0,bk_verify=0 where s_id='$s_id' and c_id='$c_id'");
						}
		      }
      }while($einfo=mysql_fetch_array($esql));
	echo("<script> alert('恭喜你，补考成绩修改成功！');window.parent.location.href='bk_score.php' </script>");		
?>
    
  </table>
</body>
</html>
