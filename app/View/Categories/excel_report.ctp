<?php
	$this->PhpExcel->loadWorksheet(WWW_ROOT.'report_excel/category.xlsx');
	$this->PhpExcel->setRow(2);


	$stt = 1;
	foreach ($categories as $row){
//		debug($row['Category']);die;
		$this->PhpExcel->addTableRow(array(
			$stt,
			$row['Category']['id'],
			$row['Category']['name'],
			$row['Category']['status'],
			$row['Category']['created'],
			$row['Category']['modified'],
		));
		$stt++;
	}
//	$this->PhpExcel->addTableFooter();
	$this->PhpExcel->output('danh_sach_danh_muc.xlsx');
?>
