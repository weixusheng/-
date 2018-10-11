<?php
session_start();
$t_no=$_SESSION["no"];
$term=$_GET["term"];
include("../../../function/conn.php");
mysql_query("set names 'utf8'");
if($term!=""){
//$sql=mysql_query("select c_longname,c_id from tb_course_base where ID in (select cb_id from tb_course2_term where ID in (select c_id from tb_chongxiu where cx_teacher='$t_no' and term='$term'))");//执行SQL查询语句
$sql=mysql_query("select distinct c_id from tb_chongxiu where cx_teacher='$t_no' and chongxiu_term='$term'");
$info=mysql_fetch_array($sql);
$result1="";
do{//循环记录集
     $course2_ID=$info['c_id'];
	 $gsql=mysql_query("select cb_id from tb_course2_term where ID='$course2_ID'");
	 $ginfo=mysql_fetch_array($gsql);
	 do{
		 $cb_id=$ginfo['cb_id'];
		 $getsql=mysql_query("select c_longname from tb_course_base where ID='$cb_id'");
		 $getinfo=mysql_fetch_array($getsql);
		 do{
			 $c_longname=$getinfo["c_longname"];
			 //$gresult=$cb_id;//返回值设为tb_course2_term的cb_id，即tb_course_base的ID
			 $gresult=$course2_ID;
			$result1.=$c_longname."**".$gresult."-"; 
		 }while($getinfo=mysql_fetch_array($getsql));
	 }while($ginfo=mysql_fetch_array($gsql));
}while($info=mysql_fetch_array($sql));
}
$result0=substr($result1,0,strlen($result1)-1);//消掉最后的"-"
echo $result1; //返回数据做回显
?>
 

