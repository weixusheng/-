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
	if(type=="term")
    {//判断响应的查询的类型
     showterm();//返回响应的显示
    }
	else if(type=="subject")
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
function queryGrade(term){//执行程序查询，查询城市的
eval("document.form1.subject.length=0;");//eval检查 JScript 代码并执行. 
eval("document.form1.subject.options.add(new Option('请选择科目','-1'));");

createXMLHttpRequest();//调用创建XmlHttp的函数
type="subject";//表示类型，查询班级处理显示的时候需要用到
var url='data.php?term='+term+'&n='+Math.random();//设定URL传值方法同时防止缓存
xmlHttp.open("GET",url,true);//建立服务器连接，异步传输true
xmlHttp.onreadystatechange=handleStateChange;//处理这个响应所需要的函数
xmlHttp.send(null);//执行程序函数这里的中间的参数是因为GET原因
}
/********************
*一个显示函数
*********************/
function showterm(){//显示函数
var a = xmlHttp.responseText.split('-');
   n = a.length;
var aa = new Array();
for(var i=0;i<n;i++)
{
   aa = a[i];
   aa=aa.substr(0,4);
   aa0=parseInt(aa);
   aa1=aa0+1;
   aa1=String(aa1);
   if(aa1!='NaN'){
   aa=aa+"-"+aa1;
   bb=a[i].substr(4,1);
   if(bb==1){
   bb0="第一学期";
   }
   else {
	   bb0="第二学期";
   }
   aa=aa+bb0;
   eval("document.form1.term.options.add(new Option(aa,a[i]));");//eval检查 JScript 代码并执行.
   }
}
}
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
</script>

</head>

<body class="bgcc">
<?php
include("../../function/conn.php");
$t_no=$_SESSION['no'];
$sql = ("select distinct tb_course2_term.term from tb_teacher_base,tb_course2_term where tb_teacher_base.t_no='$t_no' and tb_teacher_base.t_name=tb_course2_term.c_teacher");//查询数据库年级
$result = mysql_query($sql);

//执行语句赋值给变量
?>
<form name="form1" method="post" action="../pingjiao_result/pingjiao_result1.php" target="window"><!--输出表单头-->
<!--输出下拉列表框，并设定onchange响应事件，把年级值传递过去-->
<select  name="term" id="term" onchange='queryGrade(this.options[this.selectedIndex].value)'>
<!--输出下拉列表项值-->
<option value='-1' selected>请选择学期</option>
<?php
while($row=mysql_fetch_row($result)){
	$row[0];
	$year=(int)substr($row[0],0,4);
	$month=(int)substr($row[0],4,1);
	if($month==1)
	$show=$year."-".($year+1)."第一学期";
	else
	$show=$year."-".($year+1)."第二学期";
   echo "<option value='$row[0]'>".$show."</option>\n";
}
?>
</select><!--下拉列表项尾数-->
<select name="subject"></select> 
<input type="submit" name="button" id="button" value="查看">
</form><!--表单项结尾-->
</body>
</html>