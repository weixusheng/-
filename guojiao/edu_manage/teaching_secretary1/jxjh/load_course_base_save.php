<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	error_reporting(2);
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
		echo "<script>location.href='load_course_base.php'</script>";
		exit();
     }
   //生成目标文件的文件名
   else{
		$uploadfile="../../upload/mingdan.xls";
		if (move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))
		{
			if(!is_uploaded_file($_FILES["file"]["tmp_name"]))
			{	
             	require_once '../xjgl/reader.php'; 
				//需要用到reader.php和OLERead.php文件
                $data = new Spreadsheet_Excel_Reader(); 
                $data->setOutputEncoding('gb2312'); 
                $data->read($uploadfile);
				include("../../function/conn.php");
				mysql_query("set names gb2312");
				for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
				{
				$sql="INSERT INTO tb_course_base(c_id,c_shortname,c_longname,c_englishname,c_office,c_type,c_test_type) VALUES('".trim($data->sheets[0]['cells'][$i][1])."','".trim($data->sheets[0]['cells'][$i][2])."','".trim($data->sheets[0]['cells'][$i][3])."','".trim($data->sheets[0]['cells'][$i][4])."','".trim($data->sheets[0]['cells'][$i][5])."','".trim($data->sheets[0]['cells'][$i][6])."','".trim($data->sheets[0]['cells'][$i][8])."')";
				$res = mysql_query($sql);
				}
				echo "<script>alert('导入成功！');location.href='load_course_base.php'</script>";
			}
		}
 	}

?>
</body>
</html>