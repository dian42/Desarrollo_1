<?php
/** Incluir la libreria PHPExcel */
require_once 'lib/bajarxls/PHPExcel.php';
include_once 'lib/conexion_bd.php';
// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("GCadmin")
->setLastModifiedBy("GCadmin")
->setTitle("Gastos Comunes")
->setSubject("Documento Excel de Prueba")
->setDescription("Plantilla Excel gastos comunes.")
->setKeywords("Gastos comunes")
->setCategory("Tablas");
    
 
$objPHPExcel->getActiveSheet()->setTitle('Plantilla'); //nombre de la plantilla 1 
$i=1; 
$objPHPExcel->createSheet(1); //creo plantilla 2
$objPHPExcel->getSheet(1)->setTitle('Datos'); //nombre de la plantilla 2
$objPHPExcel->setActiveSheetIndex(1);//acitvo la plantilla 2
$tipos 	= $conexion_bd -> prepare("SELECT tga_id FROM tipo_gasto ");
$tipos -> execute();
$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
foreach ($tipos as $ids ) 
	foreach ($ids as $id ) {
		$objPHPExcel->setActiveSheetIndex(1)->setCellValue('A'.$i, $id);
		$i++;
	}
// Agregar Informacion
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('B1', 'Gastos')
->setCellValue('C1', 'Comunes')
->setCellValue('A2', 'Fecha     ')
->setCellValue('B2', 'Costo    ')
->setCellValue('C2', 'Tipo')
->setCellValue('D2', 'Descripción                      ');

$columna = array('A','B','C','D');
foreach ($columna as $col) 
	$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);

for($j=3;$j<1000;$j++){ //genero un array desde el B3 al B1000
	$a[$j]='C'.$j;
}
foreach ($a as $b) { //hago q tega un menu desplegable
	$objValidation = $objPHPExcel->getActiveSheet()->getCell($b)->getDataValidation();
	$objValidation->setFormula1('Datos!$A$1:$A$'.$i);
	$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
	$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
	$objValidation->setAllowBlank(true);
	$objValidation->setShowInputMessage(false);
	$objValidation->setShowErrorMessage(false);
	$objValidation->setShowDropDown(true);
}
// Renombrar Hoja

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
 

// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Gastos Comunes '.date('m-y').'.xls"');
// header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
