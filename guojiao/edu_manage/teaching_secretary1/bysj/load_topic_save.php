<?php
	error_reporting(2);
	include("../../function/conn.php");
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
		echo "<script>location.href='load_topic_form.php'</script>";
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
                echo $data->read($uploadfile);
				mysql_query("set names gb2312");
				for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
				{
					$sql=mysql_query("INSERT INTO graduation_design(grade,s_no,s_name,class,grd_dsg,t_name) VALUES('".trim($data->sheets[0]['cells'][$i][1])."','".trim($data->sheets[0]['cells'][$i][3])."','".trim($data->sheets[0]['cells'][$i][4])."','".trim($data->sheets[0]['cells'][$i][2])."','".trim($data->sheets[0]['cells'][$i][5])."','".trim($data->sheets[0]['cells'][$i][6])."')");
				}
				unlink($uploadfile);
				echo "<script>alert('导入成功！');location.href='load_topic_form.php'</script>";
			}
		}
 	}

?>