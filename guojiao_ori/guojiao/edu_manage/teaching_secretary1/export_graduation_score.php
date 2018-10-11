<?php
include('../function/conn0.php');

$s_no=$_GET["s_no"];

$sql=mysql_query("select ID,s_name,s_sex,now_class,nation from tb_s_information where s_no='$s_no'");
$info=mysql_fetch_array($sql);
$s_id=$info["ID"];
$s_name=$info["s_name"];
$s_sex=$info["s_sex"];
$now_class=$info["now_class"];
$ID=$info["ID"];
$sql1=mysql_query("select speciality,grade_code from tb_class where class_name='$now_class';");
$info1=mysql_fetch_array($sql1);
$speciality=$info1["speciality"];
$grade=$info1['grade_code'];
$nation=$info['nation'];
$sql0=mysql_query("select gra_num from  tb_s_information where s_no='$s_no'");
$info0=mysql_fetch_array($sql0);
$grd_num=$info0['gra_num'];
$gsql=mysql_query("select grd_dsg,score from graduation_design where s_no='$s_no'");
$ginfo=mysql_fetch_array($gsql);
$topic_name=$ginfo['grd_dsg'];
$grd_des_score=$ginfo['score'];

date_default_timezone_set('PRC');
$y=date('Y');
$m=date('m');
$d=date('d');


function cleanString($str,$start,$len) {
$tmpstr = "";
$strlen = $start + $len;
for($i = 0; $i < $strlen; $i++) {
if(ord(substr($str, $i, 1)) > 0xa0) {
$tmpstr .= substr($str, $i, 2);
	$i++;
} else
$tmpstr .= substr($str, $i, 1);
}
if(strlen($str)>$len){
	return $tmpstr."..";
}
else {
	return $str;
}
}
	


/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once'../function/PHPExcel.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
//$objPHPExcel->getStyle()->getFont()->setSize(8);

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '学号：')
			->setCellValueExplicit('B1', $s_no,PHPExcel_Cell_DataType::TYPE_STRING)
			->mergeCells('B1:G1')
			->setCellValue('H1', '姓名：')
			->setCellValue('I1', $s_name)
			->mergeCells('I1:M1')
			->setCellValue('O1', '东北电力大学 学生成绩单')
			->mergeCells('O1:W1')
			->setCellValue('A2', '民族：')
			->setCellValue('B2', $nation)
			->mergeCells('B2:G2')
			->setCellValue('H2', '性别：')
			->setCellValue('I2', $s_sex)
			->mergeCells('I2:M2')
			->setCellValue('A3', '行政班级：')
			->mergeCells('A3:B3')
			->setCellValue('C3', $now_class)
			->mergeCells('C3:G3')
			->setCellValue('H3', '专业：')
			->setCellValue('I3', $speciality)
			->mergeCells('I3:M3')
			->setCellValue('N3', '院系：')
			->mergeCells('N3:O3')
			->setCellValue('P3', '经济管理学院')
			->mergeCells('P3:R3')
			->setCellValue('S3', '学位：')
			->mergeCells('T3:V3')
			->setCellValue('T3', '经济学学士')
			->setCellValue('W3', '毕业证号：')
			->setCellValueExplicit('Y3', $grd_num ,PHPExcel_Cell_DataType::TYPE_STRING)
			->mergeCells('W3:X3')
			->mergeCells('Y3:AE3')
			
			->mergeCells('A4:J4')
			->mergeCells('K4:R4')
			->mergeCells('S4:Y4')
			->mergeCells('Z4:AE4')
			->mergeCells('A24:J24')
			->mergeCells('K24:R24')
			->mergeCells('S24:Y24')
			->mergeCells('Z24:AE24')
									
			->setCellValue('A45','总学时：')
			->setCellValue('D45','总学分：')
			->setCellValue('G45','毕业设计题目：')
			->setCellValue('J45',$topic_name)
			->setCellValue('O45','毕业设计成绩：')
			->setCellValue('R45',$grd_des_score)
			->setCellValue('S45','填表人：')
			->setCellValue('T45','王斌')
			->setCellValue('V45','负责人：')
			->setCellValue('X45','李俊兰')
			->mergeCells('A45:B45')
			->mergeCells('E45:F45')
			->mergeCells('G45:I45')
			->mergeCells('J45:N45')
			->mergeCells('O45:Q45')
			->mergeCells('V45:W45')
			->mergeCells('X45:Y45')
			->setCellValue('AA45','教务处：')
			->setCellValue('AB45',$y.'年'.$m.'月'.$d.'日')
			->mergeCells('AB45:AE45');
			$objPHPExcel->getActiveSheet()->getStyle('T45')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			
			$lie1=array('','A','K','S','Z','A','K','S','Z');
			$lie1_end=array('','J','R','Y','AE','J','R','Y','AE');
			$w=4;
			$col=array(array('','','','',''),array('A','E','F','H','I'),array('K','O','P','Q','R'),array('S','V','W','X','Y'),array('Z','AB','AC','AD','AE'),array('A','E','F','H','I'),array('K','O','P','Q','R'),array('S','V','W','X','Y'),array('Z','AB','AC','AD','AE'));
			$col_end=array(array('','','','',''),array('D','E','G','H','J'),array('N','O','P','Q','R'),array('U','V','W','X','Y'),array('AA','AB','AC','AD','AE'),array('D','E','G','H','J'),array('N','O','P','Q','R'),array('U','V','W','X','Y'),array('AA','AB','AC','AD','AE'));
			$all_all_xueshi=0;
			$all_all_xuefen=0;
			$grade=$info1['grade_code'];
			for($j=1;$j<9;$j++)
			{
				if($j<5)$g=5;
				else $g=25;
				$objPHPExcel->getActiveSheet()
							->setCellValue($col[$j][0].$g, '课程名称')
							->setCellValue($col[$j][1].$g, '类别')
							->setCellValue($col[$j][2].$g, '成绩')
							->setCellValue($col[$j][3].$g, '学时')
							->setCellValue($col[$j][4].$g, '学分')
							->mergeCells($col[$j][0].$g.":".$col_end[$j][0].$g)
							->mergeCells($col[$j][1].$g.":".$col_end[$j][1].$g)
							->mergeCells($col[$j][2].$g.":".$col_end[$j][2].$g)
							->mergeCells($col[$j][3].$g.":".$col_end[$j][3].$g)
							->mergeCells($col[$j][4].$g.":".$col_end[$j][4].$g)
							->mergeCells($lie1[$j].($g+18).':'.$lie1_end[$j].($g+18));
				$all_xueshi=0;
				$all_xuefen=0;
				if($j%2==0){$grade_term=$grade."2";$str="第二学期";}
				else {$grade_term=$grade."1";$str="第一学期";}
				$sql2=mysql_query("select c_longname,c_kind,c_week_hour,tb_score.c_credit,eff_score
				from tb_course_base,tb_score,tb_course2_term 
				where tb_course2_term.c_class='$now_class' and tb_course2_term.term='$grade_term' and tb_course_base.ID=tb_course2_term.cb_id and tb_score.c_id=tb_course2_term.ID and tb_score.s_id='$s_id';");
				for($k=6;$k<=22;$k++)
				{
					if($j>=5)$k+=20;
					$getinfo=mysql_fetch_array($sql2);
					$longname=$getinfo["c_longname"];
					$kind=$getinfo["c_kind"];
					$score=$getinfo["eff_score"];
					$week=$getinfo["c_week_hour"];
					$credit=$getinfo["c_credit"];
					$all_xueshi+=$week;
					$all_xuefen+=$credit;
					
					
					if($speciality=='国际经济与贸易')
					{
						$score66='';
						switch($score){
							case '95':$score66='A';break;
							case '92':$score66='A-';break;	
							case '89':$score66='B+';break;
							case '85':$score66='B';break;
							case '82':$score66='B-';break;
							case '79':$score66='C+';break;
							case '75':$score66='C';break;
							case '72':$score66='C-';break;
							case '69':$score66='D+';break;
							case '65':$score66='D';break;
							case '0':$score66='F';break;
						}
						$score=$score66;
						$score66='';
					}
					
					
					$objPHPExcel->getActiveSheet()->getRowDimension($k)->setRowHeight(11);
					$objPHPExcel->getActiveSheet()->getStyle("A".$k.":"."AE".$k)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					$objPHPExcel->getActiveSheet()->setCellValue($col[$j][0].$k,$longname);
					$objPHPExcel->getActiveSheet()->mergeCells($col[$j][0].$k.":".$col_end[$j][0].$k);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][0].$k)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][0].$k)->getAlignment()->setWrapText(true);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][0].$k)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][0].$k)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					
					$objPHPExcel->getActiveSheet()->setCellValue($col[$j][1].$k,$kind);
					$objPHPExcel->getActiveSheet()->mergeCells($col[$j][1].$k.":".$col_end[$j][1].$k);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][1].$k)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][1].$k)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][1].$k)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					
					$objPHPExcel->getActiveSheet()->setCellValue($col[$j][2].$k,$score);
					$objPHPExcel->getActiveSheet()->mergeCells($col[$j][2].$k.":".$col_end[$j][2].$k);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][2].$k)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][2].$k)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][2].$k)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					
					$objPHPExcel->getActiveSheet()->setCellValue($col[$j][3].$k,$week);
					$objPHPExcel->getActiveSheet()->mergeCells($col[$j][3].$k.":".$col_end[$j][3].$k);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][3].$k)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][3].$k)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][3].$k)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					
					$objPHPExcel->getActiveSheet()->setCellValue($col[$j][4].$k,$credit);
					$objPHPExcel->getActiveSheet()->mergeCells($col[$j][4].$k.":".$col_end[$j][4].$k);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][4].$k)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][4].$k)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$objPHPExcel->getActiveSheet()->getStyle($col[$j][4].$k)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					//$objPHPExcel->getActiveSheet()->setCellValue($col[$j][0].$k,$longname);
					if($j>=5)$k-=20;
				};
				$objPHPExcel->getActiveSheet()->setCellValue($lie1[$j].($g+18),"学期学时：".$all_xueshi."  学期学分".$all_xuefen);
				$objPHPExcel->getActiveSheet()->setCellValue($lie1[$j].$w,$grade."-".($grade+1).$str);
				$objPHPExcel->getActiveSheet()->getStyle($lie1[$j].$w)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				if($j%2==0)$grade++;
				if($j==4)$w=24;
		 		$all_all_xueshi+=$all_xueshi;
				$all_all_xuefen+=$all_xuefen;
			}
			$objPHPExcel->getActiveSheet()->setCellValue('C45', $all_all_xueshi);
			$objPHPExcel->getActiveSheet()->setCellValue('E45', $all_all_xuefen);
			$objPHPExcel->getActiveSheet()->getStyle('C45')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle('E45')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('毕业生成绩单');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(2);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(4.5);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(6);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(1);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(3);

$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(3);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(2);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(3);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(3);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(3);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(4);
$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(4);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(15);
$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(15);
$objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(13);
$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(13);
$objPHPExcel->getActiveSheet()->getRowDimension('23')->setRowHeight(13);
$objPHPExcel->getActiveSheet()->getRowDimension('24')->setRowHeight(13);
$objPHPExcel->getActiveSheet()->getRowDimension('25')->setRowHeight(13);
$objPHPExcel->getActiveSheet()->getRowDimension('43')->setRowHeight(13);
$objPHPExcel->getActiveSheet()->getRowDimension('45')->setRowHeight(16);
$objPHPExcel->getActiveSheet()->getRowDimension('44')->setRowHeight(6);
$objPHPExcel->getActiveSheet()->getStyle('A1:AE45')->getFont()->setSize(8);
$objPHPExcel->getActiveSheet()->getStyle('O1')->getFont()->setSize(12)
														 ->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('X45:Y45')->getFont()->setSize(12)
														 ->setBold(true)
														 ->setName('隶书');
$objPHPExcel->getActiveSheet()->getStyle('T45')->getFont()->setSize(12)
														 ->setBold(true)
														 ->setName('隶书');

$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(1);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);

$sharedStyle1 = new PHPExcel_Style();
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
								'size' => 8
							)

		 ));
		 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A4:AE5"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A24:AE25");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A23:AE23");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A43:AE43");


// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename='.$s_no.iconv('utf-8','gbk',$s_name).iconv('utf-8','gbk','成绩单').'.xlsx');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>