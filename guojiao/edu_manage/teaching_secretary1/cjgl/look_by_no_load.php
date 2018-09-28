<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
function f_tijao() {
	if(form1.grade_code.value==-1){
		alert("请选择年级");
		form1.grade_code.focus();
		return false;
	}
	if(form1.class_name.value==-1){
		alert("请选择班级");
		form1.class_name.focus();
		return false;
	}
	if(form1.term.value==-1){
		alert("请选择学期");
		form1.term.focus();
		return false;
	}
	return true;
}

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
if(xmlHttp.readystate==4)
{//4说明是执行交互完毕0 (未初始化)1 (正在装载)2 (装载完毕) 3 (交互中)4 (完成)
   if(xmlHttp.status==200)
   {//http的一个报头说明成功找到
    if(type=="class_name")
    {//判断查询的类型
     showclass();//返回响应的显示
    }
	else if(type=="s_no")
    {//判断响应的查询的类型
     shows_no();//返回响应的显示
    }
   }
}
}
/*************************
*城市的一个查询函数
*
*********************************************************/
function queryGrade(grade_code){//执行程序查询，查询城市的
eval("document.form1.class_name.length=0;");//eval检查 JScript 代码并执行. 
eval("document.form1.class_name.options.add(new Option('请选择班级','-1'));");
createXMLHttpRequest();//调用创建XmlHttp的函数
type="class_name";//表示类型，查询班级处理显示的时候需要用到
var url='data.php?grade_code='+grade_code+'&n='+Math.random();//设定URL传值方法同时防止缓存
xmlHttp.open("GET",url,true);//建立服务器连接，异步传输true
xmlHttp.onreadystatechange=handleStateChange;//处理这个响应所需要的函数
xmlHttp.send(null);//执行程序函数这里的中间的参数是因为GET原因
}
function queryS_no(class_name){//查询程序
eval("document.form1.s_no.length=0;");//eval检查 JScript 代码并执行. 
eval("document.form1.s_no.options.add(new Option('请选择学号','-1'));");
createXMLHttpRequest();//调用创建XmlHttp的函数
type="s_no";//查询县的
var url="data0.php?class_name="+class_name+'&n='+Math.random();//设定URL传值方法同时防止缓存
url=encodeURI(url);
xmlHttp.open("GET",url,true);
xmlHttp.onreadystatechange=handleStateChange;//处理响应的函数名
xmlHttp.send(null);//执行程序函数这里的中间的参数是因为GET原因
}
/********************
*一个显示函数
*********************/
function showclass(){//显示函数
var a = xmlHttp.responseText.split('-');
   n = a.length;
var aa = new Array();
for(var i=0;i<n;i++)
{
   aa = a[i];
   eval("document.form1.class_name.options.add(new Option(aa,aa));");//eval检查 JScript 代码并执行. 
}
}
function shows_no(){//显示函数

d=xmlHttp.responseText;
var a = xmlHttp.responseText.split('-');
   n = a.length;  
var aa = new Array();
   bb= new Array();
for(var i=0;i<n;i++)
{
   aa=a[i];
   bb=aa.split('+');
   cc=bb[0]+"--"+bb[1];
   if(aa!='NaN'){
   eval("document.form1.s_no.options.add(new Option(cc,bb[0]));");//eval检查 JScript 代码并执行.
   }
}
}
</script>

</head>

<body class="bgc">
<?php
include("../../function/conn.php");
$sql = ("select distinct grade_code from tb_class where graduate_flag='0'");//查询数据库年级
$result = mysql_query($sql);//执行语句赋值给变量
?>



<table border="0" width="98%" cellpadding="0" cellspacing="0">
<tr>
<td>
<table  width="68%" border="0" cellspacing="0" cellpadding="0" class="trstyle">
  <tr><form id="form1" name="form1" method="post" action="show_by_no.php" target="window" onsubmit="return f_tijao()">
     <td width="450">
         <select id="grade_code" onchange='queryGrade(this.options[this.selectedIndex].value)'>
        <!--输出下拉列表项值-->
        <option value='-1' selected>请选择年级</option>
        <?php
        while($row=mysql_fetch_row($result)){
        //循环循环查询显示年级输出数据显示
        echo "<option value='$row[0]'>$row[0]"."级"."</option>\n";
        }
        ?>
        </select><!--下拉列表项尾数-->
        <select name="class_name" id="class_name" onchange='queryS_no(this.options[this.selectedIndex].value)'></select> 
        <!--显示数据的班级的位置-->
        <select name="s_no" id="s_no"></select>
    </td>
    <td width="459"><input name="" type="submit"  value="确定"/></td>
  </form>
  </tr>
  </table>
  </td>
  </tr>  
</table>
</body>
</html>