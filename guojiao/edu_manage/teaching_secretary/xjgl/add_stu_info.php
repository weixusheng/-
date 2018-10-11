<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />

    <!--origin_code-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<link href="../../css/jscal2.css" rel="stylesheet" type="text/css" />
<link href="../../css/steel.css" rel="stylesheet" type="text/css" />
<link href="../../css/border-radius.css" rel="stylesheet" type="text/css" />
<script src="../../JS/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../../JS/jscal1.js" type="text/javascript"></script>
<script src="../../JS/cn.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
function f_load()
{document.form1.s_no.focus();
	}
function xueji() {
	if(document.form1.s_no.value=="")
	{
		alert("请输入学号");
		document.form1.s_no.focus();
		return false;
	}
	if(document.form1.s_name.value=="")
	{
		alert("请输入姓名");
		document.form1.s_name.focus();
		return false;
	}
	if(document.form1.s_sex.value=="")
	{
		alert("请选择性别");
		document.form1.s_sex.focus();
		return false;
	}
	if(document.form1.s_bir.value=="")
	{
		alert("请选择出生年月日");
		document.form1.s_bir.focus();
		return false;
	}
	if(document.form1.s_id.value=="")
	{
		alert("请输入身份证号");
		document.form1.s_id.focus();
		return false;
	}
	if(document.form1.s_class.value=="")
	{
		alert("请选择班级");
		document.form1.s_class.focus();
		return false;
	}
	if(document.form1.s_home.value=="")
	{
		alert("请填写籍贯");
		document.form1.s_home.focus();
		return false;
	}
	if(document.form1.s_ent.value=="")
	{
		alert("请输入入学日期");
		document.form1.s_ent.focus();
		return false;
	}
	if(document.form1.bank_num.value=="")
	{
		alert("请输入银行卡号");
		document.form1.bank_num.focus();
		return false;
	}
	if(document.form1.is_dragon.value=="")
	{
		alert("请选择是否龙舟队");
		document.form1.is_dragon.focus();
		return false;
	}
}
</script>
</head>
<body class="frame_body" onLoad="f_load()">
        <form id="form1" name="form1" method="post" action="add_stu_info_save.php" onSubmit="return xueji()">
        <div class="panel panel-default">
                <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            添加学生学籍
                        </h1>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>学号</label>
                                    <input name="s_no" id="s_no" class="form-control" placeholder="学号">
                                </div>
                                
                                <div class="form-group">
                                    <label>性别</label>
                                    <select name="s_sex" id="s_sex" class="form-control">
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>身份证号</label>
                                    <input name="s_id" id="s_id" class="form-control" placeholder="身份证号">
                                </div>
                                
                                <div class="form-group">
                                    <label>班级</label>
                                    <select name="s_class" id="s_class" class="form-control">
                                    <?php
                                    include("../../function/conn.php");
                                    $gsql=mysql_query("select class_name from tb_class where graduate_flag='0'");
                                    $ginfo=mysql_fetch_array($gsql);
                                    do{ ?> 
                                    <option value="<?php echo $ginfo["class_name"]?>">
                                    －－<?php echo $ginfo["class_name"]?>－－
                                </option>
                                    <?php
                                    }while($ginfo=mysql_fetch_array($gsql));
                                    ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>政治面貌</label>
                                    <select name="s_pol" id="s_pol" class="form-control">
                                        <option>群众</option>
                                        <option>共青团员</option>
                                        <option>中共预备党员</option>
                                        <option>共产党员</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>银行卡号</label>
                                    <input name="bank_num" id="bank_num" class="form-control" placeholder="银行卡号">
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>姓名</label>
                                    <input name="s_name" id="s_name" class="form-control" placeholder="姓名">
                                </div>
                                <div class="form-group">
                                    <label>出生年月日</label>
                                    <input name="s_bir" id="s_bir" class="form-control" placeholder="出生年月日">
                                    <script type="text/javascript">//<![CDATA[
                                        var cal = Calendar.setup({
                                          onSelect: function(cal) { cal.hide() }
                                        });
                                        cal.manageFields("s_bir", "s_bir", "%Y-%m-%d");
                                      //]]></script>
                                </div>
                                <div class="form-group">
                                    <label>民族</label>
                                    <input name="nation" id="nation" class="form-control" placeholder="民族">
                                </div>
                                <div class="form-group">
                                    <label>籍贯</label>
                                    <input name="s_home" id="s_home" class="form-control" placeholder="籍贯">
                                </div>
                                <div class="form-group">
                                    <label>入学日期</label>
                                    <input name="s_ent" id="s_ent" class="form-control" placeholder="入学日期">
                                    <script type="text/javascript">//<![CDATA[
                                        var cal = Calendar.setup({
                                            onSelect: function(cal) { cal.hide() }
                                            });
                                            cal.manageFields("s_ent", "s_ent", "%Y-%m-%d");
                                            //]]></script>
                                </div>
                                <div class="form-group">
                                    <label>是否龙舟队</label>
                                    <select name="is_dragon" id="is_dragon" class="form-control">
                                        <option>是</option>
                                        <option>否</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-default">提交</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
       </form>
</body>
</html>