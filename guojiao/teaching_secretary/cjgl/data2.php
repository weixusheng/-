<?php
$term=$_GET["term"];
$classname=$_GET["classname"];
include("../../function/conn.php");
mysql_query("set names 'utf8'");
if($classname!=""&&$term!=""){
$sql=mysql_query("select c_longname,c_id from tb_course_base where ID in(select cb_id from tb_course2_term where term='$term' and c_class='$classname')");//执行SQL查询语句
$result1="";
$info=mysql_fetch_array($sql);
do
	{//循环记录集
     $c_longname=$info["c_longname"];
	 $c_id=$info["c_id"];
	 $sql1=mysql_query("select ID from tb_course_base where c_id='$c_id';");
	 $info1=mysql_fetch_array($sql1);
	 $gresult=$info1["ID"];
   	$result1.=$c_longname."**".$gresult."-"; 
}while($info=mysql_fetch_array($sql));
}
$result0=substr($result1,0,strlen($result1)-1);//消掉最后的"-"
echo $result1; //返回数据做回显
//select c_longname from tb_course_base where ID in (select cb_id from tb_course2_term where term='20102' and c_class='电气101'
?>
 

