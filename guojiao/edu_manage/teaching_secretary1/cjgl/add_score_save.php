<?php
// $grade_code=$_POST['grade_code'];
header("content-type:text/html;charset=utf-8");
$class_name=$_POST['class_name'];
$s_id=$_POST['stu_name'];
$term=$_POST['term'];
$subject=$_POST['subject'];
$exam=$_POST['exam'];
$status=$_POST['status'];
$real_score=$_POST['real_score'];
if(isset($_POST["evaluate"])==true){
	$evaluate=1;
}else{
	$evaluate=0;
	}
switch ($real_score) {
	case 'A':$real_score=95;break;
	case 'A-':$real_score=92;break;
	case 'B+':$real_score=89;break;
	case 'B':$real_score=85;break;
	case 'B-':$real_score=82;break;
	case 'C+':$real_score=79;break;
	case 'C':$real_score=75;break;
	case 'C-':$real_score=72;break;
	case 'D+':$real_score=69;break;
	case 'D':$real_score=65;break;
	case 'F':$real_score=0;break;
	default:$real_score=$real_score;
}
include("../../function/conn.php");
$sql=mysql_query("select ID,credit from tb_course2_term 
		where cb_id='$subject' and c_class='$class_name' and term='$term'");
$info=mysql_fetch_array($sql);
$c_id=$info['ID'];
$credit=$info["credit"];

$asql=mysql_query("select count(ID) as num from tb_score where s_id='$s_id' and c_id='$c_id'");
$ainfo=mysql_fetch_array($asql);
$num=$ainfo['num'];
if($num==0) {
mysql_query("insert into tb_score(s_id,c_id,s_term,c_credit,score,exam_type,evaluate)
values('$s_id','$c_id','$term','$credit','$real_score','$status','$evaluate')");
} else {
	switch ($exam) {
		case "score":$exam_type="exam_type";break;
		case "bk_score":$exam_type="bk_type";break;
		case "ck1_score":$exam_type="ck1_type";break;
		case "ck2_score":$exam_type="ck2_type";break;
		case "ck3_score":$exam_type="ck3_type";break;
	}
	mysql_query("update tb_score set 
	$exam='$real_score',$exam_type='$status',evaluate='$evaluate' where s_id='$s_id' and c_id='$c_id'");
}
echo "<script>alert('添加成功');location.href='add_score.php'</script>"
?>