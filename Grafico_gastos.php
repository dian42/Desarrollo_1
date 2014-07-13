<?php   
	/* CAT:Bar Chart */


	/* pChart library inclusions */
	include_once 'lib/conexion_bd.php';
	// include_once 'datos_graficos.php';
	include_once 'lib/graficos/class/pData.class.php';
	include_once 'lib/graficos/class/pDraw.class.php';
	include_once 'lib/graficos/class/pImage.class.php';
	
	
	/* Create and populate the pData object */
	// $comunes = DatosGastos();
	$MyData = new pData();  
	$MyData->addPoints(DatosGastos($conexion_bd),"Gastos Comunes"); //array(150,220,300,1000,420,200,300,200,100),"Server A");
	$MyData->addPoints(DatosAdicionales($conexion_bd),"Gastos Adicionaes");//array(140,0,340,300,320,300,200,100,50),"Server B"); //9 datos
	$MyData->setAxisName(0,"Pesos");
	$MyData->addPoints(array("January","February","March","April","May","Juin","July","August","September"),"Months");
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
	$myPicture->drawLegend(580,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

	/* Turn on shadow computing */ 
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

	/* Draw the chart */
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
	$settings = array("Surrounding"=>-30,"InnerSurrounding"=>30,"Interleave"=>0);
	$myPicture->drawBarChart($settings);

	/* Render the picture (choose the best way) */
	$myPicture->autoOutput("examples/pictures/example.drawBarChart.spacing.png");



function DatosGastos($conexion_bd){	
	$i=0;
	$datos = array();
	$tipos = $conexion_bd -> prepare("SELECT gas_costo FROM gasto ");
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $gastos ) 
		foreach ($gastos as $gasto ) {
			if($i<9)
				$datos[++$i]=$gasto;
		}

	return $datos;
}
function DatosAdicionales($conexion_bd){	
	$i=0;
	$datos = array();
	$tipos = $conexion_bd -> prepare("SELECT adi_costo FROM adicional ");
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $gastos ) 
		foreach ($gastos as $gasto ) {
			if($i<9)
				$datos[++$i]=$gasto;
		}

	return $datos;
}



?>