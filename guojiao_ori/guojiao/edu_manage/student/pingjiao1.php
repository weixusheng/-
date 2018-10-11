<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
<script language="javascript">//应该会有更简单的办法我还没想到！
 function check(form){
	 var   flag01=false;     
          for(i=0;i<form1.type01.length;i++)   
             if(form1.type01[i].checked)   
             {     
                flag01=true;     
                 break;   
             }   
           if(!flag01)  { 
               alert("必须填写完整才能保！");   
               return   flag01;   
              }
			  
			   var   flag02=false;     
          for(i=0;i<form1.type02.length;i++)   
             if(form1.type02[i].checked)   
             {     
                flag02=true;     
                 break;   
             }   
           if(!flag02)  { 
               alert("必须填写完整才能保！");   
               return   flag02;   
              }
			   var   flag03=false;     
          for(i=0;i<form1.type03.length;i++)   
             if(form1.type03[i].checked)   
             {     
                flag03=true;     
                 break;   
             }   
           if(!flag03)  { 
               alert("必须填写完整才能保！");   
               return   flag03;   
              }
			   var   flag04=false;     
          for(i=0;i<form1.type04.length;i++)   
             if(form1.type04[i].checked)   
             {     
                flag04=true;     
                 break;   
             }   
           if(!flag04)  { 
               alert("必须填写完整才能保！");   
               return   flag04;   
              }
			   var   flag05=false;     
          for(i=0;i<form1.type05.length;i++)   
             if(form1.type05[i].checked)   
             {     
                flag05=true;     
                 break;   
             }   
           if(!flag05)  { 
               alert("必须填写完整才能保！");   
               return   flag05;   
              } 
			  var   flag06=false;     
          for(i=0;i<form1.type06.length;i++)   
             if(form1.type06[i].checked)   
             {     
                flag06=true;     
                 break;   
             }   
           if(!flag06)  { 
               alert("必须填写完整才能保！");   
               return   flag06;   
              }
			   var   flag07=false;     
          for(i=0;i<form1.type07.length;i++)   
             if(form1.type07[i].checked)   
             {     
                flag07=true;     
                 break;   
             }   
           if(!flag07)  { 
               alert("必须填写完整才能保！");   
               return   flag07;   
              }
			   var   flag08=false;     
          for(i=0;i<form1.type08.length;i++)   
             if(form1.type08[i].checked)   
             {     
                flag08=true;     
                 break;   
             }   
           if(!flag08)  { 
               alert("必须填写完整才能保！");   
               return   flag08;   
              }
			   var   flag09=false;     
          for(i=0;i<form1.type09.length;i++)   
             if(form1.type09[i].checked)   
             {     
                flag09=true;     
                 break;   
             }   
           if(!flag09)  { 
               alert("必须填写完整才能保！");   
               return   flag09;   
              }
			   var   flag10=false;     
          for(i=0;i<form1.type10.length;i++)   
             if(form1.type10[i].checked)   
             {     
                flag10=true;     
                 break;   
             }   
           if(!flag10)  { 
               alert("必须填写完整才能保！");   
               return   flag10;   
              }
			   var   flag01=false;     
          for(i=0;i<form1.type11.length;i++)   
             if(form1.type11[i].checked)   
             {     
                flag11=true;     
                 break;   
             }   
           if(!flag11)  { 
               alert("必须填写完整才能保！");   
               return   flag11;   
              }
			   var   flag12=false;     
          for(i=0;i<form1.type12.length;i++)   
             if(form1.type12[i].checked)   
             {     
                flag12=true;     
                 break;   
             }   
           if(!flag12)  { 
               alert("必须填写完整才能保！");   
               return   flag12;   
              }
			   var   flag13=false;     
          for(i=0;i<form1.type13.length;i++)   
             if(form1.type13[i].checked)   
             {     
                flag13=true;     
                 break;   
             }   
           if(!flag13)  { 
               alert("必须填写完整才能保！");   
               return   flag13;   
              }
}
</script>
<style type="text/css">
td {
	font-size:13px;
}
</style>
</head>
<body bgcolor="#CCCCCC" class="bgc">
<?php
	include("../function/conn.php");
     $c_id=$_GET["c_id"];
	 $id=$_GET["id"];
	 $term=$_GET["term"];
	 $sql=mysql_query("select * from tb_evaluate where c_id='$c_id' and s_id='$id'");
	 $info=mysql_fetch_array($sql);
?> 
<br />
<div align="center">
  <form id="form1" name="form1" method="post"  action="suanfen.php?id=<?php echo $id;?>&c_id=<?php echo $c_id;?>&term=<?php echo $term;?>" onsubmit="javascript:return check(this);">
    <table width="1000" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="104">一级指标</td>
        <td width="568">二级指标</td>
        <td width="320">等级成绩</td>
      </tr>
      <tr>
        <td rowspan="3"><div align="center">教材处理(20分)</div></td>
        <td><p align="center" >知识、能力、价值观目标是否明确，教学目的是否符合《课程标准》的要求和学生实际，知识技能、能力培养、思想教育的要求是否明确、恰当、可行。</p></td>
        <td>
        <input <?php if (!(strcmp($info['c1'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="type01" value="5" />
          优秀			
          <input <?php if (!(strcmp($info['c1'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type01" value="4"/>
          良好
          <input <?php if (!(strcmp($info['c1'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="type01"  value="3" />
          中等
          <input <?php if (!(strcmp($info['c1'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type01"  value="2"/>
          合格
          <input <?php if (!(strcmp($info['c1'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="type01"value="1"/>
         不合格 </td>
      </tr>
      <tr>
        <td><p align="center" >是否体现教学目标，知识讲解是否具有科学性、系统性，是否做到理论联系实际，教材的理解与处理是否具有科学性。</p></td>
        <td>
        <input <?php if (!(strcmp($info['c2'],"10"))) {echo "checked=\"checked\"";} ?> type="radio" name="type02" id="132" value="10" />
优秀
  <input <?php if (!(strcmp($info['c2'],"8"))) {echo "checked=\"checked\"";} ?> type="radio" name="type02" value="8" />
  良好
  <input <?php if (!(strcmp($info['c2'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="type02" value="6" />
  中等
  <input <?php if (!(strcmp($info['c2'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type02"  value="4" />
  合格
  <input <?php if (!(strcmp($info['c2'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type02" value="2" />
  不合格</td>
      </tr>
      <tr>
        <td><p align="center" >教学安排的循序渐进性、层次分明性、系统完整性、密切适中性如何。</p></td>
        <td><input <?php if (!(strcmp($info['c3'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="type03" value="5" />
优秀
  <input <?php if (!(strcmp($info['c3'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type03" value="4" />
  良好
  <input <?php if (!(strcmp($info['c3'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="type03"  value="3" />
  中等
  <input <?php if (!(strcmp($info['c3'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type03"  value="2" />
  合格
  <input <?php if (!(strcmp($info['c3'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="type03" value="1" />
不合格 </td>
      </tr>
      <tr>
        <td rowspan="2"><div align="center">教学基本功（10分）</div></td>
        <td><p align="center" >教学语言是否清晰、准确、简练、通俗、生动、逻辑严谨。</p></td>
        <td><input <?php if (!(strcmp($info['c4'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="type04" value="5" />
优秀
  <input <?php if (!(strcmp($info['c4'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type04" value="4" />
  良好
  <input <?php if (!(strcmp($info['c4'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="type04" value="3" />
  中等
  <input <?php if (!(strcmp($info['c4'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type04" value="2" />
  合格
  <input <?php if (!(strcmp($info['c4'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="type04" value="1" />
不合格 </td>
      </tr>
      <tr>
        <td><p align="center" >板书设计是否具有科学性，是否工整、完美、简明、扼要，条理清楚。</p></td>
        <td><input <?php if (!(strcmp($info['c5'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="type05" value="5" />
优秀
  <input <?php if (!(strcmp($info['c5'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type05" value="4" />
  良好
  <input <?php if (!(strcmp($info['c5'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="type05"value="3" />
  中等
  <input <?php if (!(strcmp($info['c5'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type05"value="2" />
  合格
  <input <?php if (!(strcmp($info['c5'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="type05"value="1" />
不合格 </td>
      </tr>
      <tr>
        <td rowspan="4"><div align="center">教学方法（35分）</div></td>
        <td><p align="center" >方法选择是否灵活多样，是否与教学目的和教学内容相适应，是否与学生的年龄特征相适应，课堂教学机智如何。</p></td>
        <td><input <?php if (!(strcmp($info['c6'],"15"))) {echo "checked=\"checked\"";} ?> type="radio" name="type06" value="15" />
优秀
  <input <?php if (!(strcmp($info['c6'],"12"))) {echo "checked=\"checked\"";} ?> type="radio" name="type06" value="12" />
  良好
  <input <?php if (!(strcmp($info['c6'],"9"))) {echo "checked=\"checked\"";} ?> type="radio" name="type06"value="9" />
  中等
  <input <?php if (!(strcmp($info['c6'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="type06"  value="6" />
  合格
  <input <?php if (!(strcmp($info['c6'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="type06" value="3" />
  不合格</td>
      </tr>
      <tr>
        <td><p align="center" >是否以教师讲解为主，学生的课堂主体性体现的如何，教学原则的选择是否科学合理，符合学生的实际。</p></td>
        <td><input <?php if (!(strcmp($info['c7'],"10"))) {echo "checked=\"checked\"";} ?> type="radio" name="type07" value="10" />
优秀
  <input <?php if (!(strcmp($info['c7'],"8"))) {echo "checked=\"checked\"";} ?> type="radio" name="type07"value="8" />
  良好
  <input <?php if (!(strcmp($info['c7'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="type07" value="6" />
  中等
  <input <?php if (!(strcmp($info['c7'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type07" value="4" />
  合格
  <input <?php if (!(strcmp($info['c7'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type07" value="2" />
  不合格</td>
      </tr>
      <tr>
        <td><p align="center" >教师的课上各环节讲、练、演示、板书及主次内容的时间分配是否合理，能否做到精讲多练，加强能力培养。</p></td>
        <td><input <?php if (!(strcmp($info['c8'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="type08" value="5" />
优秀
  <input <?php if (!(strcmp($info['c8'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type08" value="4" />
  良好
  <input <?php if (!(strcmp($info['c8'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="type08"  value="3" />
  中等
  <input <?php if (!(strcmp($info['c8'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type08" value="2" />
  合格
  <input <?php if (!(strcmp($info['c8'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="type08"  value="1" />
不合格 </td>
      </tr>
      <tr>
        <td><p align="center" >是否有意识、恰当的运用生动的实例激发学生的学习动机，培养学生的学习兴趣，提高教学效率。</p></td>
        <td><input <?php if (!(strcmp($info['c9'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="type09"   value="5" />
优秀
  <input <?php if (!(strcmp($info['c9'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type09"   value="4" />
  良好
  <input <?php if (!(strcmp($info['c9'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="type09"  value="3" />
  中等
  <input <?php if (!(strcmp($info['c9'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type09"   value="2" />
  合格
  <input <?php if (!(strcmp($info['c9'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="type09"   value="1" />
不合格 </td>
      </tr>
      <tr>
        <td rowspan="4"><div align="center">教学效果（35分）</div></td>
        <td><p align="center" >课堂上教师能否及时掌握学生的反馈信息，并采取相应的调控措施进行教学。</p></td>
        <td><input <?php if (!(strcmp($info['c10'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="type010"   value="5" />
优秀
  <input <?php if (!(strcmp($info['c10'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type010"   value="4" />
  良好
  <input <?php if (!(strcmp($info['c10'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="type010"   value="3" />
  中等
  <input <?php if (!(strcmp($info['c10'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type010"   value="2" />
  合格
  <input <?php if (!(strcmp($info['c10'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="type010"  value="1" />
不合格 </td>
      </tr>
      <tr>
        <td><p align="center" >课堂秩序是否活而不乱，秩序井然。</p></td>
        <td><input <?php if (!(strcmp($info['c11'],"10"))) {echo "checked=\"checked\"";} ?> type="radio" name="type011"  value="10" />
          优秀
          <input <?php if (!(strcmp($info['c11'],"8"))) {echo "checked=\"checked\"";} ?> type="radio" name="type011"  value="8" />
          良好
          <input <?php if (!(strcmp($info['c11'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="type011"  value="6" />
          中等
          <input <?php if (!(strcmp($info['c11'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type011"  value="4" />
          合格
          <input <?php if (!(strcmp($info['c11'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type011"   value="2" />
          不合格</td>
      </tr>
      <tr>
        <td><p align="center" >学生是否认真听讲，积极思考，大胆发言，学习积极性是否被充分调动起来。</p></td>
        <td><input <?php if (!(strcmp($info['c12'],"10"))) {echo "checked=\"checked\"";} ?> type="radio" name="type012"  value="10" />
          优秀
            <input <?php if (!(strcmp($info['c12'],"8"))) {echo "checked=\"checked\"";} ?> type="radio" name="type012"  value="8" />
            良好
            <input <?php if (!(strcmp($info['c12'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="type012"  value="6" />
            中等
            <input <?php if (!(strcmp($info['c12'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type012"   value="4" />
            合格
            <input <?php if (!(strcmp($info['c12'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type012"   value="2" />
            不合格</td>
      </tr>
      <tr>
        <td><p align="center" >基础好、中、差学生是否各尽其智，各有所获，均衡提高。学生对本节课的知识、技能掌握的程度如何，能力发展程度如何。</p></td>
        <td><input <?php if (!(strcmp($info['c13'],"10"))) {echo "checked=\"checked\"";} ?> type="radio" name="type013"  value="10" />
优秀
  <input <?php if (!(strcmp($info['c13'],"8"))) {echo "checked=\"checked\"";} ?> type="radio" name="type013"  value="8" />
  良好
  <input <?php if (!(strcmp($info['c13'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="type013"  value="6" />
  中等
  <input <?php if (!(strcmp($info['c13'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="type013"  value="4" />
  合格
  <input <?php if (!(strcmp($info['c13'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="type013"   value="2" />
  不合格</td>
      </tr>
    </table>
    <p>
      <label>
        <input type="submit" name="button" id="button" value="提交" />
      </label>
    </p>
  </form>
</div>
</body>
</html>