<?php
require_once 'lib/twigLoad.php';
include_once 'lib/validacion_xls.php';
include_once 'lib/leerxls/reader.php'; 

session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include_once 'lib/conexion_bd.php';
	if($_FILES["archivo"]["type"] == "application/vnd.ms-excel" && $_FILES["archivo"]["size"] < 20000000){
		if($_FILES["archivo"]["error"] > 0){
			render('subida_xls/errorFormatoAdicional.html.twig', array('error' => $_FILES["archivo"]["error"]));
			//echo $_FILES["archivo"]["error"] . "";
		}else{
			if(file_exists("xls/" . $_FILES["archivo"]["name"])){
				$existente = $_FILES["archivo"]["name"]." ya existe.";
				render('subida_xls/errorFormatoAdicional.html.twig', array('error' => $existente));
			}
			else{
				move_uploaded_file($_FILES["archivo"]["tmp_name"],"xls/" . $_FILES["archivo"]["name"]);
				$nombre=$_FILES["archivo"]["name"];
			}
		}
	}
	else{
		$error = "El archivo" . $_FILES["archivo"]["error"] . " es de un formato no soportado. Intente nuevamente";
		render('subida_xls/errorFormatoAdicional.html.twig', array('error' => "Formato no soportado, intente con un formato válido", 'valido' => $_SESSION['valido']));
	}
}
else
	render('subida_xls/upload_xls_adicional.html.twig', array( 'valido' => $_SESSION['valido']));
if(isset($nombre)){
	$datos = new Spreadsheet_Excel_Reader();  
	/* Le decimos al objeto que "lea" el archivo cargado. Esto extraerá toda la información correspondiente al archivo y la almacenará en el objeto */  
	$datos->read("xls/".$nombre);  
	/* Ahora, definimos una variable llamada celdas, en la cual guardaremos todos los datos de las celdas del archivo excel leído. Esto podemos hacerlo, llamando al método sheets sobre nuestro objeto datos, el cual contenía la información del archivo excel, e indicandole mediante los parámetros que nos pase los datos de la hoja 0 (primera hoja del archivo) y que queremos la información de sus celdas (cells) */  
	$celdas = $datos->sheets[0]['cells'];
	/* Luego, mediante un ciclo, seguiremos armando nuestra tabla y concatenamos con el contenido de las celdas. Estos valores se almacenan en la variable en una forma de array de 2 dimensiones. La primera corresponde a la fila y la segunda a la columna, siempre empezando de 1 , poniendo como condición que cuando lea una celda vacía se detenga */  
	$flag = 2;
	$flag = datos_xls($flag,$celdas,$conexion_bd); //verifica q los datos esten bien 
	if($flag==1)// guarda los datos en la base de datos 
		$flag = datos_xls($flag,$celdas,$conexion_bd);
	if($flag==1){
		$exito = "El archivo" . $nombre . " fue subido exitosamente.";
		render('subida_xls/errorFormatoAdicional.html.twig', array('error' => $exito,  'valido' => $_SESSION['valido']));
		//echo "Archivo subido con exito. <br>";
		unlink("xls/".$nombre);
	}
	if($flag==0){ //borra el archivo si es que los datos no estaban bien definidos
		unlink("xls/".$nombre);
		render('subida_xls/errorFormatoAdicional.html.twig', array('error' => "Celdas del archivo ingresadas incorrectamente, intente nuevamente.",  'valido' => $_SESSION['valido']));
		//echo "Archivo el archivo no esta bien rellenado.";
	}
	/* Cerramos la tabla */  
	// echo "<table width="300" align="center"><tbody><tr><td width="150" align="center">".$celdas[$i][1]."</td><td width="150" align="center">".$celdas[$i][2]."</td></tr></tbody></table>"; 

}

function datos_xls($flag,$celdas,$conexion_bd){
	$filas=3 ;
	$letra= array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','X','Y','Z');
	$columnas=1;
	do{
		do{
			if($columnas==1){
				$propiedad = $celdas[$filas][$columnas];
				if(!vpropiedad($propiedad) && ($flag == 2 ||$flag == 0)){
					$redaccion = "La propiedad esta mal redactada en la posición ".$letra[$columnas-1]."".$filas.".";
					render('subida_xls/errorFormatoAdicional.html.twig', array('error' => $redaccion,  'valido' => $_SESSION['valido']));
					$flag=0;
				}
			}
			if($columnas==2){
				$fecha = $celdas[$filas][$columnas];
				if(!vfecha($fecha) && ($flag == 2 || $flag == 0)){
					$date = "La fecha esta mal redactada en la posición ".$letra[$columnas-1]."".$filas . ".";
					render('subida_xls/errorFormatoAdicional.html.twig', array('error' => $date,  'valido' => $_SESSION['valido']));
					$flag=0;
				}
			}
			if($columnas==3){
				$costo = $celdas[$filas][$columnas];
				if(!vcosto($costo) && ($flag == 2 || $flag == 0)){
					$costo_error = "El costo esta mal redactado en la posición ".$letra[$columnas-1]."".$filas. ".";
					render('subida_xls/errorFormatoAdicional.html.twig', array('error' => $costp_error,  'valido' => $_SESSION['valido']));
					$flag=0;
				}
			}
			if($columnas==4){
				$tipo = $celdas[$filas][$columnas];
				if(!vtipoA($tipo, $conexion_bd) &&($flag == 2 || $flag == 0)){
					$tipoA = "El tipo del gasto es invalido en la posición ".$letra[$columnas-1]."".$filas.".";
					render('subida_xls/errorFormatoAdicional.html.twig', array('error' => $tipoA, 'valido' => $_SESSION['valido']));
					$flag=0;
				}
			}
			if($columnas==5){
				$descripcion = $celdas[$filas][$columnas];
				if(!vdecripcion($descripcion) && ($flag == 2 || $flag == 0)){
					$descripcion = "La descripcion esta mal redactada en la posición ".$letra[$columnas-1]."".$filas.".";
					render('subida_xls/errorFormatoAdicional.html.twig', array('error' => $descripcion, 'valido' => $_SESSION['valido']));
					$flag=0;
				}
			}
			$columnas++;
		}while(isset($celdas[$filas][$columnas]));
		if($flag ==1 && isset($fecha,$costo,$tipo,$descripcion,$propiedad)){
			$tipos  = $conexion_bd -> prepare("SELECT pro_id FROM  propiedad WHERE pro_numero='$propiedad' AND pro_con_id =1");
			$tipos -> execute();
			$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
			foreach ($tipos as $ids) 
				foreach ($ids as $id) 	
					$tucaita = $conexion_bd -> exec("INSERT INTO adicional VALUES (DEFAULT ,'$descripcion' ,$costo , '$fecha', $id, '$tipo')");//ingresa en la tabla
		}
		$filas++;
		$columnas=1;
	}while(isset($celdas[$filas][$columnas]));
	$conexion_bd = NULL;
	if ($flag == 2 || $flag == 1) 
		return 1;
	if($flag == 0) 
		return 0;
	
}



?>
