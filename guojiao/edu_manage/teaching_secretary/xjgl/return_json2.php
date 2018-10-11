
<?php

if(isset($_POST["class_name"])||isset($_GET["class_name"])){
    isset($_POST["class_name"])?$class_name=$_POST["class_name"]:$class_name=$_GET["class_name"];
}
else{
    $class_name="";
}

include("../../function/conn.php");
$sql=mysql_query("select * from tb_s_information where s_class='$class_name'");
header('Content-Type:application/json');



$rows_sum = array();
$array=mysql_fetch_array($sql);
header('Content-Type:application/json');

if($array==false){
  echo "无相应信息";
  echo $res_success;
}
else{
    while ($row = mysql_fetch_assoc($sql)) {
        array_push($rows_sum,$row);
    }
    echo json_encode(array("data" =>$rows_sum));

}
?>