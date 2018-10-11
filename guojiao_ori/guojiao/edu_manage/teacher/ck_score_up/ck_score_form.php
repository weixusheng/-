<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
/********
*定义创建XMLHttpRequest对象的方法
*
**************************************/
var xmlHttp;//声明变量
var requestType="";//声明初始类型为空
function createXMLHttpRequest()//定义创建一个跨浏览器函数的开头
{
if(window.ActiveXObject)//ActiveXObject对象到找到的时候返回的是真，否则是假
{
   xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");//这个是使用IE的方法创建XmlHttp
}
else if(window.XMLHttpRequest)
{
   xmlHttp=new XMLHttpRequest();//这个是使用非IE的方法创建XmlHttp
}
}
/***************
*判断服务器响应的事件，如果返回是4则说明交互完成，判断标示头，
*
*************************************************/
function handleStateChange(){//判断返回的一个函数，来确定执行那个的函数
if(xmlHttp.readyState==4)
{//4说明是执行交互完毕0 (未初始化)1 (正在装载)2 (装载完毕) 3 (交互中)4 (完成)
   if(xmlHttp.status==200)
   {//http的一个报头说明成功找到
	if(type=="subject")
    {//判断响应的查询的类型
     showsub();//返回响应的显示
    }
   }
}
}
/*************************
*城市的一个查询函数
*
*********************************************************/
function querySub(term,classname){//查询程序
eval("document.form1.subject.length=0;");//eval检查 JScript 代码并执行. 
eval("document.form1.subject.options.add(new Option('请选择科目','-1'));");
createXMLHttpRequest();//调用创建XmlHttp的函数
type="subject";//查询县的
var url="data.php?term="+term+'&n='+Math.random();//设定URL传值方法同时防止缓存
url=encodeURI(url);
xmlHttp.open("GET",url,true);
xmlHttp.onreadystatechange=handleStateChange;//处理响应的函数名
xmlHttp.send(null);//执行程序函数这里的中间的参数是因为GET原因
}
/********************
*一个显示函数
*********************/
function showsub(){//显示函数
var a = xmlHttp.responseText.split('-');
   n = a.length;
var aa = new Array();
for(var i=0;i<n;i++)
{
   aa = a[i].split('**');
   eval("document.form1.subject.options.add(new Option(aa[0],aa[1]));");//eval检查 JScript 代码并执行. 
}
}
function dd() {
	if(document.form1.term.value==-1){
		alert("请选择学期");
		form1.term.focus();
		return false;
	}
	if(document.form1.subject.value==-1){
		alert("请选择科目");
		form1.subject.focus();
		return false;
	}
	if(document.form1.subject.value==''){
		alert("请选择科目");
		form1.subject.focus();
		return false;
	}
}
</script>

</head>

<body class="bgcc">
<?php
$t_no=$_SESSION["no"];
include("../../function/conn.php");
$sql = ("select distinct chongxiu_term from tb_chongxiu where cx_teacher='$t_no'");//查询数据库年级
$result = mysql_query($sql);//执行语句赋值给变量
?>
<form name="form1" method="post" action="ck_score_up1.php" target="window" onsubmit="return dd()"><!--输出表单头-->
<!--输出下拉列表框，并设定onchange响应事件，把年级值传递过去-->
<select id="term" name="term" onchange='querySub(this.options[this.selectedIndex].value)'>
<!--输出下拉列表项值-->
<option value='-1' selected>请选择学期</option>
<?php
while($row=mysql_fetch_row($result)){
//循环循环查询显示年级输出数据显示
	$term_code=$row[0];
    $show_term1=substr($term_code,0,4);
	$show_term2=$show_term1+1;
	$num=substr($term_code,4,1);if($num==1) $num='一';else $num='二';
	echo "<option value='$row[0]'>$show_term1"."-"."$show_term2"."第"."$num"."学期"."</option>\n";
}
?>
</select><!--下拉列表项尾数-->
<select name="subject" id="subject"></select> 
<input name="" type="submit" value="确定" />
</form>
</body>
</html>