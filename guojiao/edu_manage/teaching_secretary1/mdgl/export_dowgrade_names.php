<?php
include("../../function/conn.php");
$xueqi1=$_GET["xueqi1"];
$xueqi2=$_GET["xueqi2"];

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
			->setCellValue('A1', '降级名单')
            ->setCellValue('A2', '年级')
            ->setCellValue('B2', '班级')
            ->setCellValue('C2', '学号')
            ->setCellValue('D2', '姓名')
			->setCellValue('E2', '未取得学分数');
			//->mergeCells('F1:H5');
$i=3;
$sql=mysql_query("select distinct s_id from tb_score where bk_score <60 and bk_score!='' and (s_term='$xueqi1' or s_term='$xueqi2' ) ");
$info=mysql_fetch_array($sql);
do {
	$sum=0;
	$s_id=$info["s_id"];
	$rsql=mysql_query("select c_id from tb_score where s_id='$s_id' and bk_score<60 and bk_score!='' and (s_term='$xueqi1' or s_term='$xueqi2')");
	$rinfo=mysql_fetch_array($rsql);
   do{
		$c_id=$rinfo["c_id"];
		$gsql=mysql_query("select c_credit from tb_course_base where ID in (select cb_id from tb_course2_term where ID='$c_id')");
		$ginfo=mysql_fetch_array($gsql);
		$sum=$sum+$ginfo["c_credit"];
	}while($rinfo=mysql_fetch_array($rsql));
	if($sum>=16) {
		$hsql=mysql_query("select s_class,s_no,s_name from tb_s_information where ID=$s_id");
		$hinfo=mysql_fetch_array($hsql);
		$s_class=$hinfo["s_class"];
		$s_no=$hinfo["s_no"];
		$s_name=$hinfo["s_name"];
		$ssql=mysql_query("select grade_code from tb_class where class_name='$s_class'");
		$sinfo=mysql_fetch_array($ssql);
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sinfo["grade_code"]);
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $s_class);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('C' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $s_name);
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sum);
		$i++;
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
header('Content-Disposition: attachment;filename="donwgrade_list.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
