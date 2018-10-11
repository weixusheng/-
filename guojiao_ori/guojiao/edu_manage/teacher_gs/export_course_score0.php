<?php
include('../function/conn0.php');
date_default_timezone_set('PRC');
$y=date('Y');
$m=date('m');
$d=date('d');
$classes0=$_POST['class_name'];
$sql=mysql_query("select speciality,grade_code,major from tb_class where class_name='$classes0'");
$info=mysql_fetch_array($sql);
$major_new=$info["speciality"];
$grade_code=$info["grade_code"];
$major_00=$info["major"];
$class_name=$classes0;
$title="东北电力大学   学生考核成绩登记表（正考）";	

/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once'../function/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1',$title)
			->mergeCells('A1:N1')
			->setCellValue('A2','学年学期：')
			->mergeCells('A2:G2')
			->mergeCells('H2:N2')
			->setCellValue('A3','学院')
			->setCellValue('B3','国际交流学院')
			->mergeCells('B3:G3')
			->setCellValue('H3','教学班名称')
			->setCellValue('A4','课程名称')
			->mergeCells('B4:F4')
			->setCellValue('G4','学时')
			->setCellValue('I4','学分')
			->setCellValue('K4','教师')
			->mergeCells('L4:N4')
			->setCellValue('A5','学号')
			->setCellValue('B5','姓名')
			->setCellValue('C5','平时')
			->setCellValue('D5','期中')
			->setCellValue('E5','实验')
			->setCellValue('F5','期末')
			->setCellValue('G5','总成绩')
			->setCellValue('H5','学号')
			->setCellValue('I5','姓名')
			->setCellValue('J5','平时')
			->setCellValue('K5','期中')
			->setCellValue('L5','实验')
			->setCellValue('M5','期末')
			->setCellValue('N5','总成绩')
			->setCellValue('A38','成')
			->setCellValue('A39','绩')
			->setCellValue('A40','总')
			->setCellValue('A41','结')
			->setCellValue('B36','应参加考试人数')
			->mergeCells('B36:E36')
			->setCellValue('B37','实际参加考试人数')
			->mergeCells('B37:E37');
			if(substr($class_name,0,3)=='电') {
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('G36','人')
			->setCellValue('G37','人')
			->setCellValue('B38','90-100')
			->mergeCells('B38:D38')
			->setCellValue('F38','人')
			->setCellValue('B39','80-90')
			->mergeCells('B39:D39')
			->setCellValue('F39','人')
			->setCellValue('B40','70-80')
			->mergeCells('B40:D40')
			->setCellValue('F40','人')
			->setCellValue('B41','60-70')
			->mergeCells('B41:D41')
			->setCellValue('F41','人')
			->setCellValue('B42','60分以下')
			->mergeCells('B42:D42')
			->setCellValue('F42','人')
			->setCellValue('B43','平均分')
			->setCellValue('E43','标准差')
			->mergeCells('E43:F43')
			->mergeCells('C43:D43')
			->mergeCells('H36:N43')
			->setCellValue('A44','备注')
			->mergeCells('B44:N44')
			->mergeCells('A45:B45')
			->mergeCells('C45:E45')
			->mergeCells('F45:H45')
			->mergeCells('I45:J45')
			->mergeCells('K45:N45')
			->setCellValue('A45','评分人：')
			->setCellValue('C45','审核人：')
			->setCellValue('F45','成绩录入人员：')
			->setCellValue('I45','学院公章：')
			->setCellValue('K45','打印日期：'.$y.'年'.$m.'月'.$d.'日'); 
}
 else {
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('G36','人')
	->setCellValue('G37','人')
	->setCellValue('B38','A')
	->mergeCells('B38:D38')
	->setCellValue('F38','人')
	->setCellValue('B39','A-')
	->mergeCells('B39:D39')
	->setCellValue('F39','人')
	->setCellValue('B40','B+')
	->mergeCells('B40:D40')
	->setCellValue('F40','人')
	->setCellValue('B41','B')
	->mergeCells('B41:D41')
	->setCellValue('F41','人')
	->setCellValue('B42','B-')
	->mergeCells('B42:D42')
	->setCellValue('F42','人')
	->setCellValue('B43','C+')
	->mergeCells('B43:D43')
	->setCellValue('F43','人')
	->setCellValue('B44','C')
	->mergeCells('B44:D44')
	->setCellValue('F44','人')
	->setCellValue('B45','C-')
	->mergeCells('B45:D45')
	->setCellValue('F45','人')
	->setCellValue('B46','D+')
	->mergeCells('B46:D46')
	->setCellValue('F46','人')
	->setCellValue('B47','D')
	->mergeCells('B47:D47')
	->setCellValue('F47','人')
	->setCellValue('B48','F')
	->mergeCells('B48:D48')
	->setCellValue('F48','人')
	->setCellValue('A49','评分人：')
	->setCellValue('C49','审核人：')
	->setCellValue('F49','成绩录入人员：')
	->setCellValue('I49','学院公章：')
	->mergeCells('H36:N48')
	->setCellValue('K49','打印日期：'.$y.'年'.$m.'月'.$d.'日');
}
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('I3',$class_name)
			->mergeCells('I3:N3');
	$sql26=mysql_query("select s_no,s_name from tb_s_information where s_class='$class_name'");		
for($i=6;$i<36;$i++){
	$info26=mysql_fetch_array($sql26);
	$s_no=$info26["s_no"];
	$s_name=$info26["s_name"];
	$objPHPExcel->getActiveSheet()->setCellValueExplicit('A' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $s_name);
}
for($j=6;$j<36;$j++){
	$info26=mysql_fetch_array($sql26);
	$s_no=$info26["s_no"];
	$s_name=$info26["s_name"];
	$objPHPExcel->getActiveSheet()->setCellValueExplicit('H' . $j, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('I' . $j, $s_name);
}
			
$objPHPExcel->getActiveSheet()->freezePane('A2');

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('班级成绩单');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(6);

$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(6);


$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
$sharedStyle3 = new PHPExcel_Style();
$sharedStyle4 = new PHPExcel_Style();
$sharedStyle5 = new PHPExcel_Style();
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
							),
		'font' => array(
								'size' => 9
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
							),
		'font' => array(
								'size' => 9
							)
		
		 ));


$sharedStyle3->applyFromArray(
	array(
		'font' => array(
								'size' => 9
							)
		 ));
$sharedStyle4->applyFromArray(
	array(
		'font' => array(
								'size' => 14,
								'bold' => true
							),
		'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							)
		 ));
$sharedStyle5->applyFromArray(
	array(
		'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							),
		'font' => array(
								'size' => 9
							)

		 ));
if(substr($class_name,0,3)=='经'){		 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A2:N49");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A3:N48"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle4, "A1:N1");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle5, "A36:A48");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A3:N5");
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('A36:A48')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('A48')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getFill()->getStartColor()->setARGB('FFFFFFFF');
$objPHPExcel->getActiveSheet()->getStyle('A36:A48')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A36:A48')->getFill()->getStartColor()->setARGB('FFFFFFFF');
}
else {
	$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A2:N45");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A3:N44"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle4, "A1:N1");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle5, "A36:A42");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A3:N5");
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('A36:A42')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getFill()->getStartColor()->setARGB('FFFFFFFF');
$objPHPExcel->getActiveSheet()->getStyle('A36:A42')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A36:A42')->getFill()->getStartColor()->setARGB('FFFFFFFF');

}


// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename='.iconv('utf-8','gbk',$class_name).iconv('utf-8','gbk','名单').'.xlsx');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>