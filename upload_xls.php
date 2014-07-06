<?php
include_once 'vistas/subida_xls/header.html';
include_once 'vistas/subida_xls/subida.html';
include ("lib/reader.php"); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($_FILES["archivo"]["type"] == "application/vnd.ms-excel" && $_FILES["archivo"]["size"] < 20000000){
		if($_FILES["archivo"]["error"] > 0){
			echo $_FILES["archivo"]["error"] . "";
		}else{
			if(file_exists("xls/" . $_FILES["archivo"]["name"])){
				echo $_FILES["archivo"]["name"]." ya existe.";
			}
			else{
				move_uploaded_file($_FILES["archivo"]["tmp_name"],"xls/" . $_FILES["archivo"]["name"]);
				echo "Archivo Subido ";
				$nombre=$_FILES["archivo"]["name"];
			}
		}
	}
	else
		echo "Archivo no permitido";
}
if(isset($nombre)){
	$datos = new Spreadsheet_Excel_Reader();  
	/* Le decimos al objeto que "lea" el archivo cargado. Esto extraerá toda la información correspondiente al archivo y la almacenará en el objeto */  
	$datos->read("xls/".$nombre);  
	/* Ahora, definimos una variable llamada celdas, en la cual guardaremos todos los datos de las celdas del archivo excel leído. Esto podemos hacerlo, llamando al método sheets sobre nuestro objeto datos, el cual contenía la información del archivo excel, e indicandole mediante los parámetros que nos pase los datos de la hoja 0 (primera hoja del archivo) y que queremos la información de sus celdas (cells) */  
	$celdas = $datos->sheets[0]['cells'];  
	echo "";  
	/* Luego, mediante un ciclo, seguiremos armando nuestra tabla y concatenamos con el contenido de las celdas. Estos valores se almacenan en la variable en una forma de array de 2 dimensiones. La primera corresponde a la fila y la segunda a la columna, siempre empezando de 1 , poniendo como condición que cuando lea una celda vacía se detenga */  
	$filas=3 ;
	$columnas=1;
	do{
		do{
			echo " ".$celdas[$filas][$columnas]." ";//imprime dato de columna
			$columnas++;
		}while(isset($celdas[$filas][$columnas]));
		echo "<br>";
		$filas++;
		$columnas=1;
	}while(isset($celdas[$filas][$columnas]));
	/* Cerramos la tabla */  
	// echo "<table width="300" align="center"><tbody><tr><td width="150" align="center">".$celdas[$i][1]."</td><td width="150" align="center">".$celdas[$i][2]."</td></tr></tbody></table>";  
	include_once 'vistas/footer.html';

}




?>
