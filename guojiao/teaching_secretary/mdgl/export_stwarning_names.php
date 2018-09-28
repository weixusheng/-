<?php
include("../../function/conn.php");
$warn_term=$_GET["warn_term"];

/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once '../../function/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:E1')
			->setCellValue('A1', '学业警告名单')
            ->setCellValue('A2', '学期')
            ->setCellValue('B2', '学号')
            ->setCellValue('C2', '班级')
            ->setCellValue('D2', '姓名')
			->setCellValue('E2', '上学期未修满分数');
			//->mergeCells('F1:H5');
$i=3;
  $sql=mysql_query("select ID from tb_s_information where s_class in(select class_name from tb_class where graduate_flag=1);");
  $info=mysql_fetch_array($sql);
  $num=0;
  do{
	$ID=$info["ID"];  
    $g_sql=mysql_query("select sum(c_credit) as ZXF from tb_score where bk_score!='' and bk_score<60 and s_id='$ID' and s_term='$warn_term';");
    $g_info=mysql_fetch_array($g_sql);
	if($g_info!=false){
	do{
	   $ZXF=$g_info["ZXF"];
	   if($ZXF>10){
	   $s_sql=mysql_query("select s_no,s_name,s_class from tb_s_information where ID='$ID';");
	   $s_info=mysql_fetch_array($s_sql);
	   $s_no=$s_info["s_no"];
	   $s_name=$s_info["s_name"];
	   $s_class=$s_info["s_class"];
	   if($ZXF=="")
	   $ZXF=0;
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $warn_term);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('B' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $s_class);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $s_name);
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $ZXF);
		$i++;
	  $num++;
	  }   
	  }while($g_info=mysql_fetch_array($g_sql));
	}
    }while($info=mysql_fetch_array($sql));
$i--;
$objPHPExcel->getActiveSheet()->freezePane('A3');

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('123');

//Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
$sharedStyle3 = new PHPExcel_Style();
$sharedStyle1->applyFromArray(
	array(
		'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							),
		'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'left'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'top'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)

		 ));
$sharedStyle2->applyFromArray(
	array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'FFCCFFCC')
							),
		'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							),
		'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'left'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'top'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
		 ));
$sharedStyle3->applyFromArray(
	array(
			'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							),
			'font' 	=> array(
								'size'		=> 18,
								'color'		=> array('argb' => '00000000')
							)
		 ));
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A2:E".$i);
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A2:E2"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A1:E1");
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setName(iconv('gbk', 'utf-8', 'Arial'));
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setSize(11);

// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="warning_list.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
