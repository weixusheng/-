<?php
include('../function/conn0.php');
$class_name=$_POST["class_name"];
$term=$_POST["term"];
$subject=$_POST["subject"];
/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once'../function/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();



// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '班级')
            ->setCellValue('B1', '学号')
            ->setCellValue('C1', '姓名')
            ->setCellValue('D1', '性别')
			->setCellValue('E1', '身份证号')
			->setCellValue('F1', '出生年月')
			->setCellValue('G1', '政治面貌')
			->setCellValue('H1', '籍贯')
			->setCellValue('I1', '学籍状态')
			->setCellValue('J1', '银行账号')
			->setCellValue('K1', '是否为龙舟队')
			->setCellValue('L1', '毕业证号');
$sql=mysql_query("select ID from tb_course2_term where term='$term' and c_class='$class_name' and cb_id='$subject'");
$info=mysql_fetch_array($sql);
$c_id=$info['ID'];
$hsql=mysql_query("select s_id from tb_score where c_id='$c_id'");
$hinfo=mysql_fetch_array($hsql);
$i=2;
do {
	$s_id=$hinfo["s_id"];
	$gsql=mysql_query("select * from tb_s_information where ID='$s_id'");
	$ginfo=mysql_fetch_array($gsql);
		switch($ginfo["stu_status"]){
			case '0':$stu_status='正常';break;
			case '1':$stu_status='出国';break;
			case '2':$stu_status='退学';break;
			case '3':$stu_status='休学';break;
			case '4':$stu_status='降级';break;
			default:$stu_status='其他';break;
		}
		switch($ginfo["is_dragon"]){
			case '0':$is_dragon='否';break;
			case '1':$is_dragon='是';break;
		}
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $ginfo["s_class"]);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('B' . $i, $ginfo["s_no"],PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $ginfo["s_name"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $ginfo["s_sex"]);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('E' . $i, $ginfo["s_id_card"],PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $ginfo["s_birthday"]);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('G' . $i, $ginfo["s_politics"],PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('H' . $i, $ginfo["s_home"],PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('I' . $i, $stu_status,PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('J' . $i, $ginfo["bank_num"],PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('K' . $i, $is_dragon,PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('L' . $i, $ginfo["gra_num"],PHPExcel_Cell_DataType::TYPE_STRING);
		$i++;
}while($hinfo=mysql_fetch_array($hsql));
$i--;			
			
$objPHPExcel->getActiveSheet()->freezePane('A2');

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('学生名单');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(6);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
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


$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A1:L".$i);
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A1:L1"); 

// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.iconv('utf-8', 'gbk',$class_name).'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>