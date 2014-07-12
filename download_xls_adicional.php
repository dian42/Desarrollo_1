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
->setTitle("Gastos Adicionales")
->setSubject("Documento Excel de Prueba")
->setDescription("Plantilla Excel gastos adicionales.")
->setKeywords("Gastos adicionales")
->setCategory("Tablas");
    
 
$objPHPExcel->getActiveSheet()->setTitle('Plantilla'); //nombre de la plantilla 1 
$objPHPExcel->createSheet(1); //creo plantilla 2
$objPHPExcel->getSheet(1)->setTitle('Datos'); //nombre de la plantilla 2
$objPHPExcel->setActiveSheetIndex(1);//acitvo la plantilla 2
$tipos 	= $conexion_bd -> prepare("SELECT tad_id FROM tipo_adicional ");
$tipos -> execute();
$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
$i=1; 
foreach ($tipos as $ids ) 
	foreach ($ids as $id ) {
		$objPHPExcel->setActiveSheetIndex(1)->setCellValue('A'.$i, $id);
		$i++;
	}
// Agregar Informacion
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('B1', 'Gastos')
->setCellValue('C1', 'Adicionales')
->setCellValue('A2', 'Propiedad')
->setCellValue('B2', 'Fecha     ')
->setCellValue('C2', 'Costo    ')
->setCellValue('D2', 'Tipo')
->setCellValue('E2', 'Descripción                      ');
$conjunto =1;
$tipos 	= $conexion_bd -> prepare("SELECT pro_numero FROM propiedad WHERE pro_con_id = ".$conjunto.""); // ingreso las propiedades a la tabla
$tipos -> execute();
$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
$i=3;
foreach ($tipos as $ids ) 
	foreach ($ids as $id ) {
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $id);
		$i++;
	}
	$conexion_bd =NULL;
$columna = array('A','B','C','D','E');
foreach ($columna as $col) 
	$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true); //dimensiono las columnas
for($j=3;$j<1000;$j++){ //genero un array desde el B3 al B1000
	$a[$j]='D'.$j;
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
header('Content-Disposition: attachment;filename="Gastos Adicionales '.date('m-y').'.xls"');
// header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
