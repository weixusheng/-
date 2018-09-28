<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
<!-- Bootstrap Styles-->
<link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
</head>

<body class="frame_body">



	
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
				<th width="10%">姓名</th>
				<th width="7%">性别</th>
				<th width="10%">出生年月日</th>
				<th width="15%">身份证号</th>
				<th width="10%">籍贯</th>
				<th width="10%">政治面貌</th>
				<th width="9%">班级</th>
				<th width="10%">入学时间</th>
				<th width="5%">民族</th>
				
				<td width="4%">&nbsp;</td>
                </tr>
              </thead>
              
            </table>
          </div>
		</div>

<script src="../assets/js/bootstrap.min.js"></script> 
<!-- Metis Menu Js --> 
<script src="../assets/js/jquery.metisMenu.js"></script> 
<!-- Custom Js --> 
<script src="../assets/js/custom-scripts.js"></script>
<script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
     <!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>

<script>
	
$(document).ready(function () {
	var sum_data = "";
	console.log("wait");


   console.log(sum_data);
	var table = $('#dataTables-example').DataTable({
		ajax:{
			 type:"post",
			 url:"http://localhost/guojiao/edu_manage/teaching_secretary/xjgl/return_json2.php",    //请求地址
			 //data:{class_name: "经贸122"},
			 dataType:"json",
				 },

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
		
	});
});
$('#dataTables-example tbody').on('click', 'tr', function (){
	var data = table.row(this).data();
	alert('You clicked on ' + data[0] + '\'s row');
	}
);
</script>
</body>
</html>