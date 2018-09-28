<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>经济管理学院教务系统</title>

<script src="../JS/jquery-1.3.2.min.js" language="javascript" type="text/javascript"></script>
<script src="../JS/frame.js" language="javascript" type="text/javascript"></script>
<link href="../css/frame.css" rel="stylesheet" type="text/css" />
</head>
<body class="showmenu">
  <div class="pagemask"></div>
  <iframe class="iframemask"></iframe>
  <div class="head">
      <div class="top_logo"> <img src="../images/logo.gif"  alt="教务系统" /> </div>
      <div class="nav" id="nav">
        <ul>
        <?php
date_default_timezone_set("PRC");
				$year=date("Y");
				$mon=date("m");
				if($mon<9){
					$grade=$year-1;
				}
				else {
					$grade=$year;
				}
?>
          <li><a class="thisclass" href="xjgl/add_stu_info.php" _for="first" target="main">学籍管理</a></li>
          <li><a href="jsgl/add_tea_info.php" _for="teacher" target="main">教师管理</a></li>
		  <li><a href="jxjh/modify_course_info.php" _for="teaching" target="main">教学计划</a></li>
		  <li><a href="cjgl/aud_score_frame.php" _for="score" target="main">成绩管理</a></li>
		  <li><a href="mdgl/search_bk_frame.php?nianji=<?php echo $grade;?>" _for="stu_name" target="main">名单管理</a></li>
		  <li><a href="bysj/load_topic_form.php"_for="bysj" target="main">毕业生管理</a></li>
          <li><a href="bjgl/add_class.php" _for="bjgl" target="main">班级管理</a></li>
          <li><a href="cxgl/kaifang.php" _for="cxbm" target="main">重修管理</a></li>
		  <li><a href="xtgl/change_pwd.php" _for="xtgl" target="main">系统管理</a></li>
        </ul>
		
    </div>
       <div class="top_link">
        <ul>
          <!--<li class="welcome">administrator</li>-->
          <li class="menuact"><a href="#" id="togglemenu">隐藏菜单</a></li>
          <!--<li><a href="" target="_blank">网站首页</a></li>-->     
          <li><a href="../../index.php" target="_top">[退出]</a></li>
        </ul>
		<!--<div class="quick"> <a href="#" class="ac_qucikmenu" id="ac_qucikmenu">快捷方式</a> <a href="#" class="ac_qucikadd" id="ac_qucikadd"></a> </div>-->
      </div>
    </div><!-- header end -->
  
<div class="left">
      <div class="menu" id="menu">
        <div id="items_first">
          <dl id="dl_items_1_1">
            <dt>学籍管理</dt>
            <dd>
              <ul>
                <li><a href="xjgl/add_stu_info.php" target="main">添加学生学籍</a></li>
                <li><a href="xjgl/modify_stu_info.php" target="main">修改学生学籍</a></li>
                <li><a href="xjgl/load_stu_info.php" target="main">学籍批量导入</a></li>
                <li><a href="xjgl/export_stu_info_frame.php" target="main">学生名单导出</a></li>
              </ul>
            </dd>
          </dl>
          <dl id="dl_items_2_1">
            <dt>学籍异动</dt>
            <dd>
              <ul>
                <li><a href="xjgl/change_class.php" target="main">学籍异动管理</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->
        
        <div id="items_teacher">
          <dl id="dl_items_1_2">
            <dt>教师管理</dt>
            <dd>
              <ul>
                <li><a href="jsgl/add_tea_info.php" target="main" >添加教师信息</a></li>
				<li><a href="jsgl/read_tea_info.php" target="main" >修改教师信息</a></li>
              </ul>
            </dd>
          </dl>
          <dl id="dl_items_2_2">
            <dt>评教结果</dt>
            <dd>
              <ul>
                <li><a href="jsgl/can_pingjiao.php" target="main">设置评教</a></li>
                <li><a href="jsgl/pj_frame.php" target="main">评教结果与排名</a></li>
              </ul>
            </dd>
          </dl>
		  <dl id="dl_items_3_2">
            <dt>教师工作量计算</dt>
            <dd>
              <ul>
                <li><a href="jsgl/work.php" target="main">教师工作量计算</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->
        
	<div id="items_teaching">
          <dl id="dl_items_1_3">
            <dt>课程信息</dt>
            <dd>
              <ul>
                <li><a href="jxjh/modify_course_info.php" target="main" >查询课程信息</a></li>
              </ul>
            </dd>
          </dl>
		  <dl id="dl_items_2_3">
            <dt>课程添加</dt>
            <dd>
              <ul>
                <li><a href="jxjh/add_course.php" target="main">添加单科课程</a></li>
				<li><a href="jxjh/load_teac_task.php" target="main">导入教学任务</a></li>
                <li><a href="jxjh/load_course_base.php" target="main">导入基本课程信息</a></li>
                <li><a href="jxjh/add_BaseCourse.php" target="main">添加基本课程信息</a></li>
              </ul>
            </dd>
          </dl>
          <dl id="dl_items_3_3">
            <dt>课程管理</dt>
            <dd>
              <ul>
                <li><a href="xkgl/xsxk.php" target="main" >选择课程</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->
		
        <div id="items_score">
          <dl id="dl_items_1_4">
            <dt>审核成绩</dt>
            <dd>
              <ul>
                <li><a href="cjgl/aud_score_frame.php" target="main" >学生成绩审核</a></li>
                <li><a href="cjgl/exchange_aud_frame.php" target="main" >授权教师修改成绩</a></li>
              </ul>
            </dd>
          </dl>
		  <dl id="dl_items_2_4">
            <dt>查看成绩</dt>
            <dd>
              <ul>
                <li><a href="cjgl/look_by_class.php" target="main">按班级查看成绩</a></li>
                <li><a href="cjgl/look_by_course.php" target="main">按科目查看成绩</a></li>
                <li><a href="cjgl/look_by_no.php" target="main">按学号查看成绩</a></li>
              </ul>
            </dd>
          </dl>
          <dl id="dl_items_3_4">
            <dt>成绩录入</dt>
            <dd>
              <ul>
                <li><a href="cjgl/add_score.php" target="main" >单个成绩录入</a></li>
              </ul>
            </dd>
          </dl>
           <dl id="dl_items_4_4">
            <dt>毕业生成绩打印</dt>
            <dd>
              <ul>
                <li><a href="cjgl/graduation_score.php" target="main" >毕业生成绩打印</a></li>
              </ul>
            </dd>
          </dl>
           <dl id="dl_items_5_4">
            <dt>专业排名</dt>
            <dd>
              <ul>
                <li><a href="cjgl/major_rank.php" target="main" >查看专业排名</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->	
		
        <div id="items_stu_name">
          <dl id="dl_items_1_5">
            <dt>补考名单</dt>
            <dd>
              <ul>
            <?php
              	date_default_timezone_set("PRC");
				$year=date("Y");
				$mon=date("m");
				if($mon<9){
					$grade=$year-1;
				}
				else {
					$grade=$year;
				}
				for($i=0;$i<4;$i++){
					$nianji=$grade-$i;
					echo "<li><a href='mdgl/search_bk_frame.php?nianji=$nianji' target='main' >".$nianji."级补考名单</a></li>";
				}
			?>
              </ul>
            </dd>
          </dl>
		  <dl id="dl_items_2_5">
            <dt>重修名单</dt>
            <dd>
              <ul>
             <?php
			 	if($mon<9){
					$grade=$year-1;
				}
				else {
					$grade=$year;
				}
				for($i=0;$i<4;$i++){
					$nianji=$grade-$i;
			 	echo "<li><a href='mdgl/search_cx_frame.php?nianji=$nianji' target='main'>".$nianji."级重修名单</a></li>";
				}
			 ?>
              </ul>
            </dd>
			</dl>
		  <dl id="dl_items_3_5">
            <dt>降级名单</dt>
            <dd>
              <ul>
              	<li><a href="mdgl/downgrade_names.php" target="main" >降级名单</a></li>
              </ul>
            </dd>			
          </dl>
          <dl id="dl_items_4_5">
            <dt>学业警告</dt>
            <dd>
              <ul>
                <li><a href="mdgl/study_warning_name.php" target="main" >学业警告名单</a></li>
              </ul>
            </dd>			
          </dl>
          <dl id="dl_items_5_5">
            <dt>无学位名单</dt>
            <dd>
              <ul>
                <li><a href="mdgl/none_grade_name.php" target="main" >无学位名单</a></li>
              </ul>
            </dd>			
          </dl>
          <dl id="dl_items_6_5">
            <dt>遗留科目补考名单</dt>
            <dd>
              <ul>
                <li><a href="mdgl/ylbk.php" target="main" >遗留科目补考名单</a></li>
              </ul>
            </dd>			
          </dl>
        </div><!-- Item End -->
			
		<div id="items_bysj">
          <dl id="dl_items_1_6">
            <dt>题目信息</dt>
            <dd>
              <ul>
                <li><a href="bysj/load_topic_form.php" target="main">毕业设计题目录入</a></li>
                <li><a href="bysj/update_topic.php" target="main">修改毕业设计题目</a></li>
              </ul>
            </dd>
          </dl>
          <!--
		  <dl id="dl_items_2_6">
            <dt>题目查询</dt>
            <dd>
              <ul>
                <li><a href="bysj/query_t_frame.php" target="main">按教师查询</a></li>
                <li><a href="bysj/query_s_frame.php" target="main">按学生查询</a></li>
              </ul>
            </dd>
          </dl>
		  <dl id="dl_items_3_6">
            <dt>成绩录入</dt>
            <dd>
              <ul>
                <li><a href="bysj/add_score.php" target="main">成绩录入</a></li>
              </ul>
            </dd>
          </dl>
          -->
          <dl id="dl_items_4_6">
            <dt>毕业生名单</dt>
            <dd>
              <ul>
                <li><a href="bysj/load_graduate_num.php" target="main">毕业证号批量导入</a></li>
              </ul>
            </dd>
          </dl>
        </div>
        
        <div id="items_bjgl">
          <dl id="dl_items_1_7">
            <dt>班级管理</dt>
            <dd>
              <ul>
                <li><a href="bjgl/add_class.php" target="main" >添加班级</a></li>
                <li><a href="bjgl/bjzx.php" target="main" >注销班级</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->	
        
         <div id="items_cxbm">
          <dl id="dl_items_1_8">
            <dt>重修报名</dt>
            <dd>
              <ul>
                <li><a href="cxgl/kaifang.php" target="main" >设置重修报名</a></li>
                <li><a href="cxgl/cxmd_frame.php" target="main" >重修报名结果</a></li>
                <li><a href="cxgl/add_cxbm.php" target="main" >添加重修报名</a></li>
              </ul>
            </dd>
          </dl>
		<dl id="dl_items_2_8">
            <dt>重修教师</dt>
            <dd>
              <ul>
                <li><a href="cxgl/chose_tea.php" target="main" >选择重修教师</a></li>
              </ul>
            </dd>
          </dl>    
        </div><!-- Item End -->	
        
        <div id="items_xtgl">
          <dl id="dl_items_1_9">
            <dt>系统管理</dt>
            <dd>
              <ul>
                <li><a href="xtgl/change_pwd.php" target="main" >修改密码</a></li>
              </ul>
            </dd>
          </dl>
          <dl id="dl_items_2_9">
            <dt>系统设置</dt>
            <dd>
              <ul>
                <li><a href="xtgl/zcgl.php" target="main" >周次管理</a></li>
                <li><a href="xtgl/changeCredit.php" target="main" >最低学分管理</a></li>
              </ul>
            </dd>
          </dl>
        </div><!-- Item End -->	
		</div>
		</div>		
  
<!--  <div class="qucikmenu" id="qucikmenu">
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

</body>
</html>
