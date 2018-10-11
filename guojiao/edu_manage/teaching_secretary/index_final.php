<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>基于jquery和Bootstrap3的隐藏侧边栏</title>
	<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
	<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css" />
        <link rel="stylesheet" href="assets/css/custom.css">
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FontAwesome Styles-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- Custom Styles-->
<link href="assets/css/custom-styles.css" rel="stylesheet" />
</head>
<body>
	<div class="page-wrapper">
            <nav class="navbar navbar-default top-navbar" role="navigation">
                    <div class="navbar-header navbar-right">

                      <a class="navbar-brand" href="index.html"><i class="fa fa-gear"></i> <strong>东北电力大学经济管理学院教务系统</strong></a>
                      </div> 
                    
            </nav>
            <nav id="sidebar" class="sidebar-wrapper up_to_top">
              <div class="sidebar-content">
                <a href="#" id="toggle-sidebar"><i class="fa fa-bars"></i></a>
                <div class="sidebar-brand">
                    <a href="#">操作栏</a>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="assets/img/logo.jpg" alt="">
                    </div>
                    <div class="user-info">
                        <span class="user-name"><strong>教学秘书</strong></span>
                        <span class="user-role">Administrator</span>
                    </div>
                </div><!-- sidebar-header  -->
                <div class="sidebar-menu">
                    <ul>  
                        <li class="sidebar-dropdown">
                            <a  href="#" ><i class="fa fa-tv"></i><span style="font-size: 20px">学籍管理</span><span class="badge">5</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="xjgl/add_stu_info.php" target="main">添加学生学籍</a></li>
                                    <li><a href="xjgl/modify_stu_info.php" target="main">修改学生学籍</a></li>
                                    <li><a href="xjgl/load_stu_info.php" target="main">学籍批量导入</a></li>
                                    <li><a href="xjgl/export_stu_info_frame.php" target="main">学生名单导出</a></li>
                                    <li><a href="xjgl/change_class.php" target="main">学籍异动管理</a></li>
                                </ul>
                            </div>
                        </li>     
                        <li class="sidebar-dropdown">
                            <a  href="#" ><i class="fa fa-tv"></i><span style="font-size: 20px">班级管理</span><span class="badge">2</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="bjgl/add_class.php" target="main">添加班级</a></li>
                                    <li><a href="bjgl/bjzx.php" target="main">注销班级</a></li>

                                </ul>
                            </div>
                        </li>     
                        <li class="sidebar-dropdown">
                            <a  href="#" ><i class="fa fa-tv"></i><span style="font-size: 20px">成绩管理</span><span class="badge">7</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="cjgl/aud_score_frame.php" target="main">学生成绩审核</a></li>
                                    <li><a href="cjgl/exchange_aud_frame.php" target="main">授权教师修改成绩</a></li>
                                    <li><a href="cjgl/look_by_class.php" target="main">按班级查看成绩</a></li>
                                    <li><a href="cjgl/look_by_course.php" target="main">按科目查看成绩</a></li>
                                    <li><a href="cjgl/add_score.php">单个成绩录入</a></li>
                                    <li><a href="cjgl/graduation_score.php">成绩打印</a></li>
                                    <li><a href="cjgl/major_rank.php">查看专业排行</a></li>
                                    
                                </ul>
                            </div>
                        </li>     
                        <li class="sidebar-dropdown">
                            <a  href="#" ><i class="fa fa-tv"></i><span style="font-size: 20px">毕业生管理</span><span class="badge">3</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="bysj/load_topic_form.php" target="main">毕业生设计题目录入</a></li>
                                    <li><a href="bysj/update_topic.php" target="main">修改毕业生设计题目</a></li>
                                    <li><a href="bysj/load_graduate_num.php" target="main">毕业证号批量录入</a></li>
                                </ul>
                            </div>
                        </li>                    
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-tv"></i><span style="font-size: 20px">教师管理</span><span class="badge">4</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="jsgl/add_tea_info.php" target="main">添加教师信息</a></li>
                                    <li><a href="jsgl/read_tea_info.php" target="main">修改教师信息</a></li>
                                    <li><a href="jsgl/can_pingjiao.php" target="main">设置评教</a></li>
                                    <li><a href="jsgl/pj_frame.php" target="main">评价结果与排行</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-tv"></i><span style="font-size: 20px">名单管理</span><span class="badge">13</span></a>
                            <div class="sidebar-submenu">
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

                                    <li><a href="mdgl/downgrade_names.php" target="main">降级名单</a></li>
                                    <li><a href="mdgl/study_warning_name.php" target="main">学业警告名单</a></li>
                                    <li><a href="mdgl/none_grade_name.php" target="main">无学位名单</a></li>
                                    <li><a href="mdgl/ylbk.php" target="main">遗留科目补考名单</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-tv"></i><span style="font-size: 20px">重修管理</span><span class="badge">4</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="cxgl/kaifang.php" target="main">设置重修报名</a></li>
                                    <li><a href="cxgl/cxmd_frame.php" target="main">重修报名结果</a></li>
                                    <li><a href="cxgl/add_cxbm.php" target="main">添加重修报名</a></li>
                                    <li><a href="cxgl/chose_tea.php" target="main">选择重修教师</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-tv"></i><span style="font-size: 20px">系统管理</span><span class="badge">4</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="xtgl/change_pwd.php" target="main">修改密码</a></li>
                                    <li><a href="xtgl/findstudents_pwd.php" target="main">查询学生密码</a></li>
                                    <li><a href="xtgl/zcgl.php" target="main">周次管理</a></li>
                                    <li><a href="xtgl/changeCredit.php" target="main">最低学分管理</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-tv"></i><span style="font-size: 20px">教学计划</span><span class="badge">7</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="jxjh/modify_course_info.php" target="main">按班级查询课程信息</a></li>
                                    <li><a href="jxjh/find_course.php" target="main">按课程号查询课程信息</a></li>
                                    <li><a href="jxjh/add_course.php" target="main">添加单科课程</a></li>
                                    <li><a href="jxjh/load_teac_task.php" target="main">导入教学任务</a></li>
                                    <li><a href="jxjh/load_course_base.php" target="main">导入基本课程信息</a></li>
                                    <li><a href="jxjh/add_BaseCourse.php" target="main">添加基本课程信息</a></li>
                                    <li><a href="xkgl/xsxk.php" target="main">选择课程</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                   </div><!-- sidebar-menu  -->            
                </div><!-- sidebar-content  -->
        
                <div class="sidebar-footer">
                    <a href="#"><i class="fa fa-gear"></i>&nbsp;设置</a>
                    <a href="#"><i class="fa fa-power-off"></i>&nbsp;退出</a>
                </div>
            </nav><!-- sidebar-wrapper  -->

            
            <main class="page-content">
                <div class="container-fluid">
                        <div id="wrapper">
                                
                                <!--/. NAV TOP  -->
                                <!-- /. NAV SIDE  -->
                                <div id="page-wrapper">
                                <iframe id="main" name="main" frameborder="0" width="100%" frameborder="0" scrolling="auto" height="800px" src="../welcome.php" ></iframe>
                                  <!-- /.col-lg-12 --> 
                                <footer>
                                  <p>Copyright &copy; 2018 东北电力大学因特雷工作室</a></p>
                                </footer>
                              </div>
                                  </div>
                </div>
            </main><!-- page-content" -->
        </div><!-- page-wrapper -->
	
	
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/metisMenu.js"></script> 
	<script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js//jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>