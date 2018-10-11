<?php
session_start();
$t_no=$_SESSION['no'];
include("../function/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>国际交流学院教务系统</title>

<script src="../JS/jquery-1.3.2.min.js" language="javascript" type="text/javascript"></script>
<script src="../JS/frame.js" language="javascript" type="text/javascript"></script>
<script src="../JS/SpryEffects.js" type="text/javascript"></script>
<link href="../css/frame.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	position:relative;
	margin:0px;
}
</style>
<script type="text/javascript">
function MM_effectBlind(targetElement, duration, from, to, toggle)
{
	Spry.Effect.DoBlind(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
}
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
function MM_effectAppearFade(targetElement, duration, from, to, toggle)
{
	Spry.Effect.DoFade(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
}
function MM_setTextOfLayer(objId,x,oldText,newText) { //v9.0
  with (document) if (getElementById && ((obj=getElementById(objId))!=null))
    with (obj) if(innerHTML==oldText) innerHTML = unescape(newText)
	else innerHTML = unescape(oldText);
}
function MM_scanStyles(obj, prop) { //v9.0
  var inlineStyle = null; var ccProp = prop; var dash = ccProp.indexOf("-");
  while (dash != -1){ccProp = ccProp.substring(0, dash) + ccProp.substring(dash+1,dash+2).toUpperCase() + ccProp.substring(dash+2); dash = ccProp.indexOf("-");}
  inlineStyle = eval("obj.style." + ccProp);
  if(inlineStyle) return inlineStyle;
  var ss = document.styleSheets;
  for (var x = 0; x < ss.length; x++) { var rules = ss[x].cssRules;
	for (var y = 0; y < rules.length; y++) { var z = rules[y].style;
	  if(z[prop] && (rules[y].selectorText == '*[ID"' + obj.id + '"]' || rules[y].selectorText == '#' + obj.id)) {
        return z[prop];
  }  }  }  return "";
}

function MM_changeProp(objId,x,theProp,theValue) { //v9.0
  var obj = null; with (document){ if (getElementById)
  obj = getElementById(objId); }
  if (obj){
    if (theValue == true || theValue == false)
      eval("obj.style."+theProp+"="+theValue);
    else eval("obj.style."+theProp+"='"+theValue+"'");
  }
}
</script>
</head>
<body class="showmenu">
  <div class="pagemask"></div>
  <iframe class="iframemask"></iframe>
  <div class="head">
      <div class="top_logo"> <img src="../images/logo.gif"  alt="教务系统" /> </div>
      <div class="nav" id="nav">
        <ul>
          <li><a class="thisclass" href="score_up/score_up.php" _for="first" target="main">成绩管理</a></li>
          <li><a href="pingjiao_result/pingjiao_result.php?t_no=<?php echo $t_no;?>" _for="creat_table" target="main">质量监控</a></li>
          <li><a href="change_pwd.php" _for="manage" target="main">系统管理</a></li>
        </ul>
      </div>
      <div class="top_link">
        <ul>
          <li class="welcome">
          <?php $gsql=mysql_query("select t_name from tb_teacher_base where t_no='$t_no'");
		        $ginfo=mysql_fetch_array($gsql);
				echo "教师:".$ginfo["t_name"]."&nbsp;&nbsp;&nbsp;&nbsp;";echo "工号:".$t_no."&nbsp;&nbsp;&nbsp;&nbsp;";
		  ?></li>
           <li><a target="_top">
		   <?php date_default_timezone_set('PRC');
	//	    $weekarray=array("日"，"一"，"二"，"三"，"四"，"五"，"六").$weekarray[date("w")];
         setlocale(LC_ALL,"chs");
		   $arr=getdate();
		  		   echo "今天是：".$arr['year']."年".$arr['mon']."月".$arr['mday']."日";?></a></li>

          <li class="menuact"><a href="#" id="togglemenu">隐藏菜单</a></li>
          <li><a href="../../index.php" target="_blank">网站首页</a></li>     
          <li><a href="../../index.php" target="_top">[退出]</a></li>        

        </ul>
  </div>
    </div><!-- header end -->
  
  <div class="left">
      <div class="menu" id="menu">
        <div id="items_first">
          <dl id="dl_items_1_1">
            <dt>成绩录入</dt>
            <dd>
              <ul>
                <li><a href="score_up/score_up.php" target="main">正考成绩录入</a></li>
                <li><a href="bk_score_up/bk_score_up.php" target="main">补考成绩录入</a></li>
                <li><a href="ck_score_up/ck_score_up.php" target="main">重修成绩录入</a></li>
                <li><a href="hk_score_up/hk_score_up.php" target="main">缓考成绩录入</a></li>
              </ul>
            </dd>
          </dl>
          <dl id="dl_items_2_1">
            <dt>查询成绩</dt>
            <dd>
              <ul>
                <li><a href="class_score/class_score.php" target="main">班级成绩</a></li>
              </ul>
            </dd>
          </dl>
                    <dl id="dl_items_3_1">
            <dt>修改成绩</dt>
            <dd>
              <ul>
                <li><a href="score_mange/score/score.php" target="main">正考成绩修改</a></li>
                <li><a href="score_mange/bk_score/bk_score.php" target="main">补考成绩修改</a></li>
                <li><a href="score_mange/ck_score/ck_score.php" target="main">重修成绩修改</a></li>

              </ul>
            </dd>
          </dl>

        </div><!-- Item End -->
        
        <div id="items_creat_table">
          <dl id="dl_items_1_2">
            <dt>质量监控</dt>
            <dd>
              <ul>
                <li><a href="pingjiao_result/pingjiao_result.php?t_no=<?php echo $t_no;?>" target="main" >查看评教结果</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->
        
        <div id="items_manage">
          <dl id="dl_items_1_3">
            <dt>系统管理</dt>
            <dd>
              <ul>
                <li><a href="change_pwd.php" target="main">修改密码</a></li>
              </ul>
            </dd>
          </dl>
        </div> <!--Item End--> 
      </div>
  </div><!-- left end -->
  
  <div class="qucikmenu" id="qucikmenu">
    <ul>
      <li><a href="content_list.htm" target="main">数据列表</a></li>
      <li><a href="catalog_main.htm" target="main">栏目管理</a></li>
      <li><a href="sys_info.htm" target="main">修改系统参数</a></li>
    </ul>
  </div><!-- qucikmenu end -->
  <div class="right">
    <div class="main">
      <iframe id="main" name="main" frameborder="0" src="../welcome.php" scrolling="auto"></iframe>
    </div>
  </div><!-- right end -->

<div id="apDiv1">
  <div id="box_title">开发团队
  	<div id="close" onclick="MM_effectBlind('apDiv1', 1000, '100%', '20%', true);MM_setTextOfLayer('close','','收起','展开')">收起</div>
  </div>
  <div id="box_content">
    <p>&nbsp;</p>
    <p>本系统由东北电力大学数值计算及软件研发实践基地开发</p>
    <p>&nbsp;</p>
    <p><a href="JavaScript:" onclick="MM_effectAppearFade('apDiv3', 500, 0, 90, false);MM_changeProp('apDiv3','','visibility','visible','DIV')">点此了解开发团队</a></p>
  </div>
</div>
<div id="apDiv3">
	<div id="apDiv4">
    	<div id="title">开发团队
          <div id="close" onclick="MM_effectAppearFade('apDiv3', 1000, 100, 0, false);MM_changeProp('apDiv3','','visibility','hidden','DIV');">关闭</div>
        </div>
        <div>
        	<?php require_once("../kaifatuandui.html");?>
        </div>
    </div>
</div>
</body>
</html>
