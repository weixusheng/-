<html>
<head>
<script type="text/javascript" src="../assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("button").click(function(){
	$.post("http://localhost/guojiao/edu_manage/teaching_secretary/xjgl/return_json.php", {class_name: "经贸122",dataType: 'jsonp',},
	
   function(data){
	sum_data = data;
	console,log(sum_data);
	console.log("wahah");
   }, "json");	
  });
});
</script>
</head>

<?php
$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x','y','z'));
print_r ($a);
?>

<body>
<p>这是一个段落。</p>
<button>切换</button>
</body>
</html>
