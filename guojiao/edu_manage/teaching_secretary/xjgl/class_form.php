<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Bootstrap Styles-->
<link href="../assets/css/bootstrap.css" rel="stylesheet" />
<!-- FontAwesome Styles-->
<link href="../assets/css/font-awesome.css" rel="stylesheet" />
<!-- Custom Styles-->
<link href="../assets/css/custom-styles.css" rel="stylesheet" />
	
<link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
function f_tijiao(){
  if(form1.grade_code.value==-1){
	  alert("请选择年级");
	  form1.grade_code.focus();
	  return false; 
  }
  if(form1.class_name.value==-1){
	  alert("请选择班级");
	  form1.class_names.focus();
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
if(xmlHttp.readyState==4)
{//4说明是执行交互完毕0 (未初始化)1 (正在装载)2 (装载完毕) 3 (交互中)4 (完成)
   if(xmlHttp.status==200)
   {//http的一个报头说明成功找到
    if(type=="class_name")
    {//判断查询的类型
     showclass();//返回响应的显示
    }
   }
}
}
/*************************
*城市的一个查询函数
*
*********************************************************/
function queryClass(grade_code){//执行程序查询，查询城市的
eval("document.form1.class_name.length=0;");//eval检查 JScript 代码并执行. 
eval("document.form1.class_name.options.add(new Option('请选择班级','-1'));");

createXMLHttpRequest();//调用创建XmlHttp的函数
type="class_name";//表示类型，查询班级处理显示的时候需要用到
var url='data.php?grade_code='+grade_code+'&n='+Math.random();//设定URL传值方法同时防止缓存
xmlHttp.open("GET",url,true);//建立服务器连接，异步传输true
xmlHttp.onreadystatechange=handleStateChange;//处理这个响应所需要的函数
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
</script>

</head>
<body class="frame_body">
<?php
include("../../function/conn.php");
$sql = "select distinct grade_code from tb_class where graduate_flag='0'";//查询数据库年级
$result = mysql_query($sql);//执行语句赋值给变量
?>

<div class="panel panel-default">
          <div class="panel-heading"> 修改学生学籍 </div>
          <div class="panel-body">
          <form name="form1" method="post" action="rea_stu_info.php" target="window" onSubmit="return f_tijiao()">
            <div class="row">
              <div class="col-lg-3">

                <div class="form-group">
                  <label>选择年级</label>
                  <select id='grade_code' onchange='queryClass(this.options[this.selectedIndex].value)' class="form-control">
                  <?php
                  while($row=mysql_fetch_row($result)){
                    //循环循环查询显示年级输出数据显示
                    echo "<option value='$row[0]'>$row[0]"."级"."</option>\n";
                  }
                  ?>
                </select>
                </div>
              </div>
              <!-- /.col-lg-6 (nested) -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label>选择班级</label>
                  <select name="class_name" class="form-control">

                  </select>
                </div>
              </div>
              <div style="padding-top: 25px" class="col-lg-3 col-lg-offset-0">
                <div class="form-group">
                  <button type="submit" name="button" id="button" class="btn btn-default">提交</button>
                </div>
              </div>
            </div>
          </form>
            <!-- /.col-lg-6 (nested) --> 
          </div>
          <!-- /.row (nested) --> 
        </div>
<script src="../assets/js/jquery.metisMenu.js"></script> 
<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.min.js"></script> 
<!-- Metis Menu Js --> 

<!-- Custom Js --> 
<script src="../assets/js/custom-scripts.js"></script>

</body>
</html>

