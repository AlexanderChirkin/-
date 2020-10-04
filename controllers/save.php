<?php


require_once "../phpexcel/Classes/PHPExcel.php";

$catList = [
	['name' => 'Tom', 'color' => 'red'],
	['name' => 'Bars', 'color' => 'white'],
	['name' => 'Jane', 'color' => 'Yellow'],
];

$document = new \PHPExcel();

$sheet = $document->setActiveSheetIndex(0); // �������� ������ ���� � ���������

$columnPosition = 0; // ��������� ���������� x
$startLine = 2; // ��������� ���������� y

// ��������� ��������� � "A2" 
$sheet->setCellValueByColumnAndRow($columnPosition, $startLine, 'Our cats');

// ����������� �� ������
$sheet->getStyleByColumnAndRow($columnPosition, $startLine)->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// ���������� ������ "A2:C2"
$document->getActiveSheet()->mergeCellsByColumnAndRow($columnPosition, $startLine, $columnPosition+2, $startLine);

// ������������ ��������� �� ��������� ������
$startLine++;

// ������ � ���������� ��������
$columns = ['�', 'Name', 'Color'];

// ��������� �� ������ �������
$currentColumn = $columnPosition;

// ��������� �����
foreach ($columns as $column) {
    // ������ ������
    $sheet->getStyleByColumnAndRow($currentColumn, $startLine)
        ->getFill()
        ->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('4dbf62');

    $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, $column);

    // ��������� ������
    $currentColumn++;
}

// ��������� ������
foreach ($catList as $key=>$catItem) {
	// ������������ ��������� �� ��������� ������
    $startLine++;
    // ��������� �� ������ �������
    $currentColumn = $columnPosition;
    // ��������� ���������� �����
    $sheet->setCellValueByColumnAndRow($currentColumn, $startLine, $key+1);

    // �������� ���������� �� ����� � �����
    foreach ($catItem as $value) {
        $currentColumn++;
    	$sheet->setCellValueByColumnAndRow($currentColumn, $startLine, $value);
    }
}

$objWriter = \PHPExcel_IOFactory::createWriter($document, 'Excel5');
$objWriter->save("CatList.xls");   




 ?>