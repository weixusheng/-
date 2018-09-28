<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
	    $s_id=$_GET["s_id"];
		$c_id=$_GET["c_id"];
		$term=$_GET["term"];
		$chongxiu_term=$_GET["chongxiu_term"];
	   include("../function/conn.php");
	   $lsql=mysql_query("select id from tb_chongxiu where s_id='$s_id' and c_id='$c_id' and term='$term'");
	   $ksql=mysql_fetch_array($lsql);
	   if($ksql==false){
		$sql=mysql_query("insert into tb_chongxiu(s_id,c_id,term,chongxiu_term) values('$s_id','$c_id','$term','$chongxiu_term')");
	   echo "<script>alert('你已成功报名！');</script>";		
	  	   	   echo "<script>window.location.href='chongxiu.php?s_id=$s_id';</script>";		
 }
	   else{	
		   $id=$ksql["id"];
		   $dsql=mysql_query("delete from tb_chongxiu where id='$id'");
	  	  echo "<script>alert('你已取消报名！');</script>";
	   }
	   	  	  echo "<script>window.location.href='chongxiu.php?s_id=$s_id';</script>";


?>
</body>
</html>