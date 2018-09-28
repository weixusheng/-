<?php session_start(); $s_no=$_SESSION['no']; ?>
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
          <li><a class="thisclass" href="look_score.php" _for="first" target="main">常用管理</a></li>
          <li><a href="change_pwd.php" _for="manage" target="main">系统管理</a></li>
          <li><a href="xinxi.php" _for="xxgl" target="main">信息管理</a></li>
        </ul>
    </div>
      <div class="top_link">
        <ul>
		<?php 
			include("../function/conn.php");
			//include("../function/common.php");
			$gsql=mysql_query("select ID,s_name,now_class from tb_s_information where s_no='$s_no'");		 
			$ginfo=mysql_fetch_array($gsql);
		?>
          <li class="welcome"><?php echo "姓名:".$ginfo["s_name"]."&nbsp;&nbsp;&nbsp;&nbsp;";echo "学号:".$s_no."&nbsp;&nbsp;&nbsp;&nbsp;";echo "班级：".$ginfo["now_class"];
		?></li>
                   <li><a target="_top">
		   <?php date_default_timezone_set('PRC');
	//	    $weekarray=array("日"，"一"，"二"，"三"，"四"，"五"，"六").$weekarray[date("w")];
         setlocale(LC_ALL,"chs");
		   $arr=getdate();
		   $week=date('w');
		   $week=(int)$week;
		   $weekday=array('日','一','二','三','四','五','六');
		  		   echo "今天是：".$arr['year']."年".$arr['mon']."月".$arr['mday']."日"."星期".$weekday[$week];//iconv("gbk","utf-8",)
				   ?></a></li>

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
            <dt>成绩管理</dt>
            <dd>
              <ul>
                <li><a href="look_score.php?id=<?php echo $ginfo["ID"];?>" target="main" _for="cc">成绩查询</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->
        <div id="items_first">
          <dl id="dl_items_2_1">
            <dt>质量监控</dt>
            <dd>
              <ul>
                <li><a href="pingjiao.php?id=<?php echo $ginfo["ID"];?>" target="main" _for="cc">学生评教</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->
                <div id="items_first">
          <dl id="dl_items_3_1">
            <dt>重修报名</dt>
            <dd>
              <ul>
                <li><a href="chongxiu.php?s_id=<?php echo $ginfo["ID"];?>" target="main" _for="cc">重修报名</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->

        <div id="items_manage">
          <dl id="dl_items_1_2">
            <dt>系统管理</dt>
            <dd>
              <ul>
                <li><a href="change_pwd.php?s_no=<?php echo $s_no;?>" target="main">修改密码</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->
        <div id="items_xxgl">
          <dl id="dl_items_1_3">
            <dt>信息管理</dt>
            <dd>
              <ul>
                <li><a href="xinxi.php" target="main">修改个人信息</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->
    </div>
</div><!-- left end -->
  <div class="right">
    <div class="main">
      <iframe id="main" name="main" frameborder="0" src="../welcome.php" scrolling="auto"></iframe>
    </div>
  </div>

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
