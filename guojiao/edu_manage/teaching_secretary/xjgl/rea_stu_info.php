<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>

<link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
<link href="../assets/css/font-awesome.css" rel="stylesheet" />

<link href="../assets/css/custom-styles.css" rel="stylesheet" />

<script src="../assets/js/jquery-3.3.1.min.js"></script>

<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
</head>

<body class="frame_body">

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
header('Content-Type:application/json');
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
header("Content-Type:text/html;charset=utf-8");
?>

<div class="panel panel-default">
          <div class="panel-body">
            <style>
			.dataTable th { 
				white-space: nowrap !important;
				}
			.div_full_private{
					width: 100%;
					}
			.xftb table tbody th:first-child td:first-child {
						width: 400px;
						}
						</style>
            <table class="table table-striped table-bordered table-hover div_full_private xftb" id="dataTables-example">
              <thead>
                <tr>
				<th width="10%">学号</th>
				<th width="8%">姓名</th>
				<th width="7%">性别</th>
				<th width="10%">出生年月日</th>
				<th width="12%">身份证号</th>
				<th width="18%">籍贯</th>
				<th width="10%">政治面貌</th>
				<th width="9%">班级</th>
				<th width="10%">入学时间</th>
				<th width="5%">民族</th>
				<th width="4%">编辑</th>
                </tr>
              </thead>
              
            </table>
          </div>
</div>

<script>
$(document).ready(function () {
	var sum_data = <?php echo $return_data ?> ;
	console.log("wait");
    console.log(sum_data);
	var table = $('#dataTables-example').DataTable({	
		"data": sum_data["data"],
		"columns": [ //返回的json数据在这里填充，注意一定要与上面的<th>数量对应，否则排版出现扭曲
			{
				"data": "s_no"
			},
			{
				"data": "s_name"
			},
			{
				"data": "s_sex"
			},
			{
				"data": "s_birthday"
			},
			{
				"data": "s_id_card"
			},
			{
				"data": "s_home"
			},
			{
				"data": "s_politics"
			},
			{
				"data": "s_class"
			},
			{
				"data": "s_entrance_date"
			},
			{
				"data": "nation"
			}
		],
		"columnDefs" : [ {
			// 定义操作列,######以下是重点########
			"targets" : 10,//操作按钮目标列
			"data" : "ID",
			"render" : function(data, type,row) {
				var html = "<a href='change_stu_info.php?id="+ data +"'  class='up btn btn-default btn-xs'  ><i class='fa fa-times'></i> 编辑</a>"
				return html;
				}
				} ],
	});
});
</script>

</body>
</html>