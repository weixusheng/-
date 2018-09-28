<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--Vue.js-->
    <script src="https://cdn.bootcss.com/vue/2.2.2/vue.min.js"></script>

    <script src="../JS/frame.js" language="javascript" type="text/javascript"></script>
</head>

<body class="body">
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-gear"></i> <strong>经管教务系统</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i>学籍管理</i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                学籍管理
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                学籍异动
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li>
                    <a href="#">班级管理</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i>成绩管理</i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                审核成绩
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                查看成绩
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                成绩录入
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                学生名单导出
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                毕业生成绩打印
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                专业排行
                            </a>
                        </li>

                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i>毕业生管理</i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                题目信息
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                毕业生名单
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i>教师管理</i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                教师管理
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                评教结果
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i>名单管理</i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                补考名单
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                重修名单
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                降级
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                无学位
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                遗留科目补考
                            </a>
                        </li>

                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i>系统管理</i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                系统管理
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                系统设置
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i>教学计划</i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                班级信息
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                课程添加
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                课程管理
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li><a href="student_manager/add_stu_info.php" target="main"><i class="fa fa-dashboard"></i>添加学生学籍</a></li> 
                <li><a href="xjgl/modify_stu_info.php" target="main"><i class="fa fa-dashboard"></i>修改学生学籍</a></li> 
                <li><a href="xjgl/load_stu_info.php" target="main"><i class="fa fa-dashboard"></i>学籍批量导入</a></li> 
                <li><a href="xjgl/export_stu_info_frame.php" target="main"><i class="fa fa-dashboard"></i>学生名单导出</a></li> 
            </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                        <iframe src="student_manager/add_stu_info.php" id="main" name="main" width="100%" frameborder="0" scrolling="auto" height="1200px"></iframe>    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <footer>
                <p>Copyright &copy; 2016.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/"
                        target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板"
                        target="_blank">网页模板</a></p>
            </footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>