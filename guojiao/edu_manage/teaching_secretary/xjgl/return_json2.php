
<?php
include("../../function/conn.php");
$sql=mysql_query("select * from tb_s_information where s_class='经贸122'");
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