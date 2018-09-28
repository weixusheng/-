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
		echo "<script>alert('您只能上传以下类型文件:xls,xlsx');location.href='load_bank_num.php'</script>";
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
				for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
				{
				echo trim($data->sheets[0]['cells'][$i][4]);
				$sql=mysql_query("UPDATE tb_s_information SET bank_num='".trim($data->sheets[0]['cells'][$i][4])."' where s_no='".trim($data->sheets[0]['cells'][$i][2])."'");
				}
				unlink($uploadfile);
			echo "<script>alert('导入成功！');location.href='load_bank_num.php'</script>";
		}
		}
 	}

?>