<?php
	if(isset($_POST["class_name"])||isset($_GET["class_name"])){
		isset($_POST["class_name"])?$class_name=$_POST["class_name"]:$class_name=$_GET["class_name"];
	}
	else{
		$class_name="";
		echo("严重错误");
	}
?>
<?php
include("../../function/conn.php");
$sql=mysql_query("select * from tb_s_information where s_class='$class_name'");
header('Content-Type:application/json');

$jarr = array();
while ($rows=mysql_fetch_array($sql)){
    $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
    for($i=0;$i<$count;$i++){  
        unset($rows[$i]);//删除冗余数据  
    }
    array_push($jarr,$rows);
}
$jobj=new stdclass();//实例化stdclass，这是php内置的空类，可以用来传递数据，由于json_encode后的数据是以对象数组的形式存放的，
//所以我们生成的时候也要把数据存储在对象中
foreach($jarr as $key=>$value){
$jobj->$key=$value;
}
//echo '传递属性后的对象：';
print_r($jobj);//打印传递属性后的对象
//echo '<br>';
echo json_encode($jobj);

?>