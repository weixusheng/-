<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css" media="all">
ul {
	list-style:none;
	margin-left:10px;	
}
ul li {
	float:left;
	padding:0px 0px;
	margin:3px;
}
ul li a {
	color:#333;
	font-weight:bolder;
	font-size:14px;
	display:block;
	text-decoration:none;
	padding:2px 10px;
	width:100%;
	}
.select {
	background-color:#433247;
}
.select a {
	color:#FFF;
}
</style>
<script type="text/javascript" language="javascript">
 function addclass(name0){
	 document.getElementsByTagName("li")[0].className="";
	 document.getElementsByTagName("li")[1].className="";
	 document.getElementById(name0.id).className="select";
 }
</script>
</head>

<body class="ziye_style">
<h2>毕业设计成绩</h2>
<hr color="#333333" align="left" width="60%"  style="margin:8px 0px;" />
<ul>
	<li name='tag' id="first" onclick="addclass(this)" class=""><a href="grd_score_form.php" target="window" >录入成绩</a></li>
    <li name='tag' id="second" onclick="addclass(this)" class=""><a href="change_bs_form.php" target="window">修改成绩</a></li>
</ul>
<table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><iframe scrolling="auto" height="550" width="100%" frameborder="0" name="window" src="grd_score_form.php"></iframe></td>
  </tr>
</table>
</body>
</html>