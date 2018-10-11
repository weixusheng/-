<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../CSS/style.css" rel="stylesheet" type="text/css"/>
</head>

<body class="ziye_style">

<?php
	error_reporting(2);
	$c_id=$_POST["c_id"];
	$j=$_POST["lie"];
	$type0=$_POST["type"];
	$type=array("xls");//设置允许上传文件的类型
	//获取文件后缀名函数
	  function fileext($filename)
	{
		return substr(strrchr($filename, "."),1);
	}
   $a=strtolower(fileext($_FILES["file"]["name"]));
   //判断文件类型
   if(!in_array($a,$type))
     {
        $text=implode(",",$type);
        echo "您只能上传以下类型文件: ",$text,"<br>";
		echo "<script>location.href='dr.php'</script>";
		exit();
     }
   //生成目标文件的文件名
   else{
		$uploadfile="../upload/mingdan.xls";
		if (move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))
		{
			if(!is_uploaded_file($_FILES["file"]["tmp_name"]))
			{	
             	require_once '../teaching_secretary/xjgl/reader.php'; 
				//需要用到reader.php和OLERead.php文件
                $data = new Spreadsheet_Excel_Reader(); 
                $data->setOutputEncoding('gb2312'); 
                $data->read($uploadfile);
				include("../function/conn.php");
				mysql_query("set names gb2312");
				$hsql=mysql_query("select cb_id,term from tb_course2_term where ID='$c_id'");
				$hinfo=mysql_fetch_array($hsql);
				$cb_id=$hinfo["cb_id"];
				$fsql=mysql_query("select c_credit from tb_course_base where ID='$cb_id'");
				$finfo=mysql_fetch_array($fsql);
				if($type0==0){
				  for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
				  {
				  $gsql=mysql_query("select ID from tb_s_information where s_no='".trim($data->sheets[0]['cells'][$i][1])."'");
				  $ginfo=mysql_fetch_array($gsql);
				  
				  $sql="INSERT INTO tb_score(s_id,c_id,c_credit,s_term,score) VALUES('".$ginfo["ID"]."','".$c_id."','".$finfo["c_credit"]."','".$hinfo["term"]."','".trim($data->sheets[0]['cells'][$i][$j])."')";
				  $res = mysql_query($sql);
				  }
				}else{
					if($type0==1)
					{
						 for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
						  {
						  $gsql=mysql_query("select ID from tb_s_information where s_no='".trim($data->sheets[0]['cells'][$i][1])."'");
						  $ginfo=mysql_fetch_array($gsql);
						  if(trim($data->sheets[0]['cells'][$i][$j])!=NULL){
						  $sql="update tb_score set bk_score='".trim($data->sheets[0]['cells'][$i][$j])."' where  s_id='".$ginfo["ID"]."' and c_id='".$c_id."' and s_term='".$hinfo["term"]."'";
						  $res = mysql_query($sql);}
						  }
					}
					if($type0==2)
					{
						 for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
						  {
						  $gsql=mysql_query("select ID from tb_s_information where s_no='".trim($data->sheets[0]['cells'][$i][1])."'");
						  $ginfo=mysql_fetch_array($gsql);
						   if(trim($data->sheets[0]['cells'][$i][$j])!=NULL){
						  $sql="update tb_score set ck_score='".trim($data->sheets[0]['cells'][$i][$j])."' where  s_id='".$ginfo["ID"]."' and c_id='".$c_id."' and s_term='".$hinfo["term"]."'";
						  $res = mysql_query($sql);}
						  }
					}
				}
				unlink($uploadfile);
				echo "<script>alert('导入成功！');history.go(-1);</script>";
			}
		}
 	}

?>
</body>
</html>