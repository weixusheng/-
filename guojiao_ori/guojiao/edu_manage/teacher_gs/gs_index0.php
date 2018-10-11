<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教务系统</title>

<script src="../JS/jquery-1.3.2.min.js" language="javascript" type="text/javascript"></script>
<script src="../JS/frame.js" language="javascript" type="text/javascript"></script>
<link href="../css/frame.css" rel="stylesheet" type="text/css" />
</head>
<body class="showmenu">
<?php
$s_no=$_SESSION['no'];
include("../function/conn.php");
include("../function/common.php");
?>
  <div class="pagemask"></div>
  <iframe class="iframemask"></iframe>
  <div class="head">
      <div class="top_logo"> <img src="../images/logo.gif"  alt="教务系统" /> </div>
      <div class="nav" id="nav">
        <ul>
          <li><a class="thisclass" href="input_bk_frame.php" _for="first" target="main">常用管理</a></li>
          <li><a href="change_pwd.php" _for="manage" target="main">系统管理</a></li>
        </ul>
    </div>
      <div class="top_link">
        <ul>
          <li class="menuact"><a href="#" id="togglemenu">隐藏菜单</a></li>
          <li><a href="gs_index.php" target="_self">首页</a></li>     
          <li><a href="exit.htm" target="_top">[退出]</a></li>
           <li><a target="_top">
		   <?php date_default_timezone_set('PRC');
	//	    $weekarray=array("日"，"一"，"二"，"三"，"四"，"五"，"六").$weekarray[date("w")];
         setlocale(LC_ALL,"chs");
		   $arr=getdate();
		  		   echo $arr['year']."年".$arr['mon']."月".$arr['mday']."日"?></a></li>
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
                <li><a href="input_bk_frame.php" target="main" _for="cc">遗留补考成录入</a></li>
                <li><a href="input_bs_frame.php" target="main" _for="cc">毕业设计成绩录入</a></li>
                <!--../teaching_secretary/bysj/add_score.php
                -->
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->

        <div id="items_manage">
          <dl id="dl_items_1_2">
            <dt>系统管理</dt>
            <dd>
              <ul>
                <li><a href="change_pwd.php" target="main">修改密码</a></li>
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

</body>
</html>
