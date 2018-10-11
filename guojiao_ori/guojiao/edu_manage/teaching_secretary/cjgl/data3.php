<?php
$classname = $_GET ["class_name"];
include ("../../function/conn.php");
mysql_query ( "set names 'utf8'" );
if ($classname != "") {
	$sql = mysql_query ( "select ID,s_no,s_name from tb_s_information where now_class='$classname'" ); // 执行SQL查询语句
	$result1 = "";
	$info = mysql_fetch_array ( $sql );
	do { // 循环记录集
		$s_id = $info ["ID"];
		$s_no = $info ["s_no"];
		$s_name = $info ["s_name"];
		$result1 .= $s_id . "**" . $s_no . "**" . $s_name . "-";
	} while ( $info = mysql_fetch_array ( $sql ) );
}
$result0 = substr ( $result1, 0, strlen ( $result1 ) - 1 ); // 消掉最后的"-"
echo $result1; // 返回数据做回显
?>
 

