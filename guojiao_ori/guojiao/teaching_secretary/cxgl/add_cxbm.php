<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="../../JS/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../../css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.line_style {
	width:98%;
	height:24px;
	padding:2px 6px;
}
#first,#second,#third,#fourth,#fiveth,#sixth,#seventh,#last {
	display:inline-block;
	padding-left:2px;
}
#first {
	width:120px;
}
#second {
	width:90px;
}
#third {
	width:100px;
}
#fourth {
	width:220px;
}
#fiveth {
	width:80px;
}
#sixth {
	width:80px;
}
#seventh {
	width:80px;
}
#last {
	width:80px;
}
</style>
<script type="text/javascript" language="javascript">
function ClearValue(obj){
	document.getElementById(obj.id).value='';
}
</script>
</head>

<body class="ziye_style">
<?php
	include("../../function/conn.php");
	$sql0=mysql_query("select value from tb_system where variable='chongxiu_term'");
	$info0=mysql_fetch_array($sql0);
	$newterm=$info0["value"];
	$term=substr($info0["value"],-1,1);
	if(isset($_GET['s_id'])) {
		AddDelCx($_GET['flag'],$_GET['s_id'],$_GET['c_id'],$_GET['term'],$newterm);
	}
	function ScoreToGrade($score) {
		switch($score){
			case "95":$grade="A";break;
			case "92":$grade="A-";break;
			case "89":$grade="B+";break;
			case "85":$grade="B";break;
			case "82":$grade="B-";break;
			case "79":$grade="C+";break;
			case "75":$grade="C";break;
			case "72":$grade="C-";break;
			case "69":$grade="D+";break;
			case "65":$grade="D";break;
			case "0":$grade="F";break;
			case "":$grade="";break;	
			}
			return $grade;
	}
	function AddDelCx($flag,$s_id,$c_id,$oldterm,$newterm) {
		if($flag==0){
			mysql_query("insert into tb_chongxiu(s_id,c_id,term,chongxiu_term) values($s_id,$c_id,$oldterm,$newterm)");
			echo "<script>alert('已添加到重修报名表');</script>";
		}
		else {
			mysql_query("delete from tb_chongxiu where s_id=$s_id and c_id=$c_id");
			echo "<script>alert('已从重修报名表删除');</script>";
		}
	}
?>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">有补考科目</li>
    <li class="TabbedPanelsTab" tabindex="0">无补考科目</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
  <form name="form1" method="post" action="add_cxbm.php?tag=0">
    <div class="TabbedPanelsContent">
    	<div class='line_style'>
            <span id='first'><input type="text" name="s_no" id="s_no" value="输入学号" size="13" onclick="ClearValue(this)" /></span>
            <span id='second'></span>
            <span id='third'><input type="text" name="c_no" id="c_no" value="输入课程号" size="10"  onclick="ClearValue(this)"/></span>
            <span id='fourth'><input type="submit" value="查找"  /></span>
        </div>
    	<div class='line_style'>
            <span id='first'>学号</span>
            <span id='second'>姓名</span>
            <span id='third'>课程号</span>
            <span id='fourth'>课程名</span>
            <span id='fiveth'>学期</span>
            <span id='sixth'>正考</span>
            <span id='seventh'>补考</span>
            <span id='last'>重修</span>
        </div>
		<?php
			if(isset($_POST['s_no'])&isset($_POST['c_no'])) { 
				$s_no= $_POST['s_no'];
				$c_no= $_POST['c_no'];
				if($s_no!=""&$s_no!="输入学号"&$c_no!=""&$c_no!="输入课程号"){
            	$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where bk_score is not null and substr(term,-1,1)='$term' and major='国际经济与贸易' and s_no='$s_no' and c_no='$c_no' order by grade,c_no");}
				elseif(($s_no==""||$s_no=="输入学号")&$c_no!=""&$c_no!="输入课程号"){
				$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where bk_score is not null and substr(term,-1,1)='$term' and major='国际经济与贸易' and c_no='$c_no' order by grade,c_no");}
				elseif($s_no!=""&$s_no!="输入学号"&($c_no==""||$c_no=="输入课程号")){
				$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where bk_score is not null and substr(term,-1,1)='$term' and major='国际经济与贸易' and s_no='$s_no' order by grade,c_no");}
				else{
				$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where bk_score is not null and substr(term,-1,1)='$term' and major='国际经济与贸易' order by grade,c_no");}
			}
			else {
				$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where bk_score is not null and substr(term,-1,1)='$term' and major='国际经济与贸易' order by grade,c_no");
			}
            $info1=mysql_fetch_array($sql1);
            do {
				$s_id=$info1['s_id'];
				$c_id=$info1['c_id'];
				$sql2=mysql_query("select count(*) as num from tb_chongxiu where s_id='$s_id' and c_id='$c_id'");
				$info2=mysql_fetch_array($sql2);
				$flag_num=$info2['num'];
				if($flag_num==0)$flag="";
				else $flag="checked='checked'";
				$oldterm=$info1['term'];
                echo "<div class='line_style'>
                    <span id='first'>".$info1['s_no']."</span>
                    <span id='second'>".$info1['s_name']."</span>
                    <span id='third'>".$info1['c_no']."</span>
                    <span id='fourth'>".$info1['c_name']."</span>
                    <span id='fiveth'>".$info1['term']."</span>
                    <span id='sixth'>".ScoreToGrade($info1['score'])."</span>
                    <span id='seventh'>".ScoreToGrade($info1['bk_score'])."</span>
                    <span id='last'><input type='checkbox' name='s_id_check[]' ".$flag." onclick='location.href=\"add_cxbm.php?flag=$flag_num&s_id=$s_id&c_id=$c_id&term=$oldterm&tag=0\"'></input></span>
                </div>";
            }while($info1=mysql_fetch_array($sql1));
        ?>
    </div>
    </form>
    <div class="TabbedPanelsContent">
    <form name="form2" method="post" action="add_cxbm.php?tag=1">
    <div class="TabbedPanelsContent">
    	<div class='line_style'>
            <span id='first'><input type="text" name="s_no0" id="s_no0" value="输入学号" size="13" onclick="ClearValue(this)" /></span>
            <span id='second'></span>
            <span id='third'><input type="text" name="c_no0" id="c_no0" value="输入课程号" size="10"  onclick="ClearValue(this)"/></span>
            <span id='fourth'><input type="submit" value="查找"  /></span>
        </div>
    	<div class='line_style'>
            <span id='first'>学号</span>
            <span id='second'>姓名</span>
            <span id='third'>课程号</span>
            <span id='fourth'>课程名</span>
            <span id='fiveth'>学期</span>
            <span id='sixth'>正考</span>
            <span id='seventh'>补考</span>
            <span id='last'>重修</span>
        </div>
		<?php
			if(isset($_POST['s_no0'])&isset($_POST['c_no0'])) { 
				$s_no= $_POST['s_no0'];
				$c_no= $_POST['c_no0'];
				if($s_no!=""&$s_no!="输入学号"&$c_no!=""&$c_no!="输入课程号"){
            	$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where substr(c_no,1,2)='16' and substr(term,-1,1)='$term' and major='国际经济与贸易' and s_no='$s_no' and c_no='$c_no' order by grade,c_no");}
				elseif(($s_no==""||$s_no=="输入学号")&$c_no!=""&$c_no!="输入课程号"){
				$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where substr(c_no,1,2)='16' and substr(term,-1,1)='$term' and major='国际经济与贸易' and c_no='$c_no' order by grade,c_no");}
				elseif($s_no!=""&$s_no!="输入学号"&($c_no==""||$c_no=="输入课程号")){
				$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where substr(c_no,1,2)='16' and substr(term,-1,1)='$term' and major='国际经济与贸易' and s_no='$s_no' order by grade,c_no");}
				else{
				$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where substr(c_no,1,2)='16' and substr(term,-1,1)='$term' and major='国际经济与贸易' order by grade,c_no");}
			}
			else {
				$sql1=mysql_query("select s_id,s_no,s_name,c_id,c_no,c_name,score,bk_score,term from stu_info where substr(c_no,1,2)='16' and substr(term,-1,1)='$term' and major='国际经济与贸易' order by grade,c_no");
			}
            $info1=mysql_fetch_array($sql1);
            do {
				$s_id=$info1['s_id'];
				$c_id=$info1['c_id'];
				$sql2=mysql_query("select count(*) as num from tb_chongxiu where s_id='$s_id' and c_id='$c_id'");
				$info2=mysql_fetch_array($sql2);
				$flag_num=$info2['num'];
				if($flag_num==0)$flag="";
				else $flag="checked='checked'";
				$oldterm=$info1['term'];
                echo "<div class='line_style'>
                    <span id='first'>".$info1['s_no']."</span>
                    <span id='second'>".$info1['s_name']."</span>
                    <span id='third'>".$info1['c_no']."</span>
                    <span id='fourth'>".$info1['c_name']."</span>
                    <span id='fiveth'>".$info1['term']."</span>
                    <span id='sixth'>".ScoreToGrade($info1['score'])."</span>
                    <span id='seventh'>".ScoreToGrade($info1['bk_score'])."</span>
                    <span id='last'><input type='checkbox' name='s_id_check[]' ".$flag." onclick='location.href=\"add_cxbm.php?flag=$flag_num&s_id=$s_id&c_id=$c_id&term=$oldterm&tag=1\"'></input></span>
                </div>";
            }while($info1=mysql_fetch_array($sql1));
        ?>
    </div>
    </form>
    </div>
  </div>
</div>
<?php 
$tag=isset($_GET['tag'])?$_GET['tag']:0;
?>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:<?php echo $tag?>});
</script>
</body>
</html>
