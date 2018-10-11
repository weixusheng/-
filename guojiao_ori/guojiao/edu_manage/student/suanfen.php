<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

</head>

<body><?php 
		$c_id=$_GET["c_id"];
		$id=$_GET["id"];
		$term=$_GET["term"];
		include("../function/conn.php");
		$type01=$_POST["type01"];
		$type02=$_POST["type02"];
		$type03=$_POST["type03"];
		$type04=$_POST["type04"];
		$type05=$_POST["type05"];
		$type06=$_POST["type06"];
		$type07=$_POST["type07"];
		$type08=$_POST["type08"];
		$type09=$_POST["type09"];
		$type010=$_POST["type010"];
		$type011=$_POST["type011"];
		$type012=$_POST["type012"];
		$type013=$_POST["type013"];
		$type014=$type01+$type02+$type03;
		$type015=$type04+$type05;
		$type016=$type06+$type07+$type08+$type09;
		$type017=$type010+$type011+$type012+$type013;
		$type018=$type014+$type015+$type016+$type017;
		$gsql=mysql_query("select ID from tb_evaluate where c_id='$c_id' and s_id='$id'");
		$ginfo=mysql_fetch_array($gsql);
		if($ginfo['ID']!='') {
			mysql_query("update tb_evaluate set type1='$type014',type2='$type015',type3='$type016',type4='$type017',c1='$type01',c2='$type02',c3='$type03',c4='$type04',c5='$type05',c6='$type06',c7='$type07',c8='$type08',c9='$type09',c10='$type010',c11='$type011',c12='$type012',c13='$type013',sum_evaluate='$type018' where c_id=$c_id and s_id=$id");
		}
		else {
$sql=mysql_query("insert into tb_evaluate(type1,type2,type3,type4,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11,c12,c13,sum_evaluate,s_id,c_id,term) values('$type014','$type015','$type016','$type017','$type01','$type02','$type03','$type04','$type05','$type06','$type07','$type08','$type09','$type010','$type011','$type012','$type013','$type018','$id','$c_id','$term')");
$info=mysql_query("select ID from tb_score where s_term='$term' and s_id='$id' and c_id='$c_id'");
if($info==false){
$msql=mysql_query("select c_credit from tb_course_base where ID=(select cb_id from tb_course2_term where ID='$c_id')");
$minfo=mysql_fetch_array($msql);
$credit=$minfo['c_credit'];
mysql_query("insert into tb_score(s_id,c_id,s_term,c_credit,evaluate) values('$id','$c_id','$term','$credit','1')");
}
else
mysql_query("update tb_score set evaluate='1' where c_id='$c_id' and s_id='$id'");}
echo "<script>alert('评教成功!');window.parent.location.href='pingjiao.php?id=$id';</script>";

?>

</body>
</html>