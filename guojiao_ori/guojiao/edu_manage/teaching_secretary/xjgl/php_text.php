<?php 
if(isset($_POST["class_name"])||isset($_GET["class_name"])){
	isset($_POST["class_name"])?$class_name=$_POST["class_name"]:$class_name=$_GET["class_name"];
}
else{
	$class_name="经贸141";
}

include("../../function/conn.php");
$sql=mysql_query("select * from tb_s_information where s_class='$class_name'");
header('Content-Type:application/json');
$rows_sum = array();
$array=mysql_fetch_array($sql);
$return_data = "";
if($array==false){
	$return_data = "无相应信息";
}
else{
	while ($row = mysql_fetch_assoc($sql)) {
		array_push($rows_sum,$row);
	}
	$return_data = json_encode(array("data" =>$rows_sum));
}
?>

<script>
    var text_data = <?php echo $return_data; ?>
    console.log(text_data);
    </script>