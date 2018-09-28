<?php
include("../../function/conn.php");
/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once '../../function/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:J1')
			->setCellValue('A1', '重修报名表')
            ->setCellValue('A2', '学号')
            ->setCellValue('B2', '姓名')
            ->setCellValue('C2', '课程名称')
            ->setCellValue('D2', '学分')
			->setCellValue('E2', '原学年学期')
			->setCellValue('F2', '最高成绩')
			->setCellValue('G2', '重修次数')
			->setCellValue('H2', '缴费金额')
			->setCellValue('I2', '学生签字')
			->setCellValue('J2', '备注');
			//->mergeCells('F1:H5');
$i=3;
$sql=mysql_query("select s_id,c_id from tb_chongxiu");
$info=mysql_fetch_array($sql);
do {
$s_id=$info["s_id"];
$c_id=$info["c_id"];
$rsql=mysql_query("select s_no,s_name from tb_s_information where ID='$s_id'");
$rinfo=mysql_fetch_array($rsql);
$s_no=$rinfo["s_no"];
$s_name=$rinfo["s_name"];
$gsql=mysql_query("select c_longname,c_credit from tb_course_base where ID in(select cb_id from tb_course2_term where ID=$c_id)");
$ginfo=mysql_fetch_array($gsql);
$c_longname=$ginfo["c_longname"];
$c_credit=$ginfo["c_credit"];
$hsql=mysql_query("select s_term,score,bk_score,ck_score from tb_score where s_id='$s_id' and c_id='$c_id'");
$hinfo=mysql_fetch_array($hsql);
$score=$hinfo["score"];
$bk_score=$hinfo["bk_score"];
$ck_score=$hinfo["ck_score"];
$max='';
if($score>$bk_score&&$score>$ck_score) {
			$max=$score;		}
if($bk_score>$score&&$bk_score>$ck_score) {
			$max=$bk_score;
		}if($ck_score>$bk_score&&$ck_score>$score) {
			$max=$ck_score;
		}
$s_term=$hinfo["s_term"];
if($s_term!=""){
		$grade=substr($s_term,0,4);
				  $grade1=$grade+1;
				  $term=substr($s_term,4,1);
				  if($term==1){
					  $term="第一学期";
				  } else{$term="第二学期";
				  }
	$s_term=$grade."-".$grade1.$term;}
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('A' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $s_name);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $c_longname);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $c_credit);
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $s_term);
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $max);
		$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, '');
		$objPHPExcel->getActiveSheet()->setCellValue('K' . $i, '');
		$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, '');
		$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, '');
		$i++;
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
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
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
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A2:J".$i);
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A2:J2"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A1:J1");
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setName(iconv('gbk', 'utf-8', 'Arial'));
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setSize(11);

// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="red_registration_list.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
