<?php   
	/* CAT:Bar Chart */
	/* pChart library inclusions */
	grafico();

	function grafico ($fecha_inicial, $fecha_final, $gasto_a_graficar, $conjunto, $propiedad ,$tipo_adicional, $tipo_gasto ){
	include_once 'lib/conexion_bd.php';
	include_once 'lib/graficos/class/pData.class.php';
	include_once 'lib/graficos/class/pDraw.class.php';
	include_once 'lib/graficos/class/pImage.class.php';	
	/* Create and populate the pData object */
	// $comunes = DatosGastos();
	$MyData = new pData();  
	if ($gasto_a_graficar=="comun"){
		$MyData->addPoints(DatosGastos($conexion_bd, $fecha_inicial, $fecha_final, $conjunto, $tipo_gasto),"Gastos Comunes"); //array(150,220,300,1000,420,200,300,200,100),"Server A");
		$MyData->addPoints(DatosGastosfecha($conexion_bd, $fecha_inicial, $fecha_final, $conjunto, $tipo_gasto),"Months");
	}
	if ($gasto_a_graficar=="adicional"){
		$MyData->addPoints(DatosAdicionales($conexion_bd, $fecha_inicial, $fecha_final, $propiedad, $tipo_adicional),"Gastos Adicionaes");//array(140,0,340,300,320,300,200,10 0,50),"Server B"); //9 datos
		$MyData->addPoints(DatosGastosfecha($conexion_bd, $fecha_inicial, $fecha_final, $propiedad, $tipo_adicional),"Months");
	}
	$MyData->setAxisName(0,"Pesos");
	$MyData->setSerieDescription("Months","Month");
	$MyData->setAbscissa("Months");

	/* Create the pChart object */
	 $myPicture = new pImage(700,230,$MyData);
	/* Turn of Antialiasing */
	$myPicture->Antialias = TRUE;

	/* Add a border to the picture */
	$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
	$myPicture->drawGradientArea(0,0,700,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
	$myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0));

	/* Set the default font */
	$myPicture->setFontProperties(array("FontName"=>"lib/graficos/fonts/pf_arma_five.ttf","FontSize"=>7 ));

	/* Define the chart area */
	$myPicture->setGraphArea(60,40,650,200);

	/* Draw the scale */
	$scaleSettings = array("GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
	$myPicture->drawScale($scaleSettings);

	/* Write the chart legend */
	$myPicture->drawLegend(500,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

	/* Turn on shadow computing */ 
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

	/* Draw the chart */
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
	$settings = array("Surrounding"=>-30,"InnerSurrounding"=>30,"Interleave"=>0);
	$myPicture->drawBarChart($settings);

	/* Render the picture (choose the best way) */
	$myPicture->autoOutput("examples/pictures/example.drawBarChart.spacing.png");

}

function DatosGastos($conexion_bd, $fecha_inicial, $fecha_final, $conjunto, $tipo_gasto){	
	$i=0;
	$datos = array( );
	$tipos = $conexion_bd -> prepare("SELECT gas_costo, gas_fecha FROM gasto  WHERE gas_tga_id = '$tipo_gasto' AND gas_con_id = $conjunto AND gas_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ");
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$fechas = $conexion_bd -> prepare("SELECT distinct(gas_fecha) FROM gasto  WHERE gas_tga_id = '$tipo_gasto' AND gas_con_id = $conjunto AND gas_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ");
	$fechas -> execute();
	$fechas = $fechas->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	$total=array( );
	foreach ($fechas as $fecha) {
		$total[$i]=0;
	 	foreach ($tipos as $gastos ) {
	 		if($fecha["gas_fecha"]===$gastos['gas_fecha'])
	 				$total[$i]=$total[$i]+$gastos['gas_costo'];
	 		
	 	}
	 		$i++;
	}


function DatosAdicionales($conexion_bd, $fecha_inicial, $fecha_final, $propiedad, $tipo_adicional){	
	$i=0;
	$datos = array();
	$tipos = $conexion_bd -> prepare("SELECT adi_costo FROM adicional WHERE gas_tad_id = '$tipo_adicional' AND adi_pro_id = $propiedad AND adi_fecha BETWEEN '$fecha_inicia' AND '$fecha_final' "); 
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $gastos ) 
		foreach ($gastos as $gasto ) {
			if($i<10)
				$datos[++$i]=$gasto;
		}

	return $datos;
}

function DatosGastosfecha($conexion_bd, $fecha_inicial, $fecha_final, $conjunto, $tipo_gasto){	
	$i=0;
	$datos = array();
	$tipos = $conexion_bd -> prepare("SELECT distinct(gas_fecha) FROM gasto  WHERE gas_tga_id = '$tipo_gasto' AND gas_con_id = $conjunto AND gas_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ");
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $gastos ) 
		foreach ($gastos as $gasto ) 
				$datos[++$i]=$gasto;
	return $datos;	
}

function DatosAdicionalesfecha($conexion_bd, $fecha_inicial, $fecha_final, $propiedad, $tipo_adicional){	
	$i=0;
	$datos = array();
	$tipos = $conexion_bd -> prepare("SELECT distinct(adi_costo) FROM adicional WHERE adi_tad_id = '$tipo_adicional' AND adi_pro_id = $propiedad AND adi_fecha BETWEEN '$fecha_inicia' AND '$fecha_final' "); 
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $gastos ) 
		foreach ($gastos as $gasto ) 
			$datos[++$i]=$gasto;
	return $datos;
}




?>