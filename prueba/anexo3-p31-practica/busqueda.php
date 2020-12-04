
<?php
$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba";
set_include_path(PATH_SEPARATOR.$ruta);
require_once "alumnos.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
    <style type="text/css">
    	table {
    		width: 50%;
    		border-collapse: collapse;
    		}
    	tr:nth-child(even){
    		background-color: grey;
    	}
    </style>
</head>
<body>
		
		<h1>RESULTADOS</h1>	

  		<?php

  		$accion = filter_input(INPUT_GET, "accion", FILTER_SANITIZE_SPECIAL_CHARS); 
  		$argumento = filter_input(INPUT_GET, "argumento", FILTER_SANITIZE_SPECIAL_CHARS);
  		$orden = filter_input(INPUT_GET, "orden", FILTER_SANITIZE_SPECIAL_CHARS);
  		$filtro = filter_input(INPUT_GET, "filtro", FILTER_SANITIZE_SPECIAL_CHARS);
  		$acc = filter_input(INPUT_GET, "acc", FILTER_SANITIZE_SPECIAL_CHARS);
		

		/*echo $accion;
		echo $argumento;
		echo $orden;
		echo $filtro;
		echo $acc;*/
		$filtros = array( "nombre" => 1, "apellido1" => 2 ,  "apellido2" => 3, "cuenta" => 4);

		function busqueda( $arg, $filtro, $matrix ) {
			$res_pos = array();
			$i = 0;
			foreach($matrix as $alumno) {
				
				foreach( $alumno as $clave => $valor) {
 					
					if ($clave == $filtro && $valor == $arg ){
						array_push($res_pos, $i);


					}
				}

			$i++;

		}
			return $res_pos;
		} 



		if($accion == "buscar"){
			$filtro_name = array_search($filtro, $filtros);
			$result = busqueda($argumento, $filtro_name, $alumnos);

		}
		
		if ($orden == "nombre"){
			$res_sort = array();
			
			foreach($result as $pos){

			array_push($res_sort, $alumnos[$pos]);
			
		}	

			$sorted = array_column($res_sort, 'nombre');

			array_multisort($sorted, SORT_ASC, $res_sort);
		} 


		if ($orden == "cuenta"){
			$res_sort = array();
			
			foreach($result as $pos){

			array_push($res_sort, $alumnos[$pos]);
			
		}	

			$sorted = array_column($res_sort, 'cuenta');

			array_multisort($sorted, SORT_ASC, $res_sort);
		} 


		if ($orden == "calificacion"){
			$res_sort = array();
			
			foreach($result as $pos){

			array_push($res_sort, $alumnos[$pos]);
			
		}	

			$sorted = array_column($res_sort, 'calificacion');

			array_multisort($sorted, SORT_ASC, $res_sort);
		} 






		




		if($accion == "filtrar"){
			$res_sort = array();
			if($filtro == "mayor"){
				foreach($alumnos as $alumno) {

					if($alumno["calificacion"]>$argumento){
						array_push($res_sort, $alumno);
					}
 				}
 			}elseif($filtro == "menor"){
				foreach($alumnos as $alumno) {

					if($alumno["calificacion"]<$argumento){
						array_push($res_sort, $alumno);
					} 
				}				
 			}
 		}

 	if($accion ==true){
		echo "<table>";
		foreach($res_sort as $pos){
			echo "<tr>";
			echo "<td>".$pos["nombre"]."</td>";
			echo "<td>".$pos['apellido1']."</td>";
			echo "<td>".$pos['apellido2']."</td>";
			echo "<td>".$pos['cuenta']."</td>";
			echo "<td>".$pos['calificacion']."</td>";
			echo "</tr>";
			}
		echo "</table>";
	}

		function suma( $resultado, $valor) {
		// Se asigna el valor actual si es mayor que el recibido
			$resultado += $valor;
			return $resultado;
		}


		if ($acc == "media"){
			$res_media = array();
			foreach($alumnos as $alumno) {
				array_push($res_media, $alumno["calificacion"]);
					}	
			$resultado = array_reduce($res_media, "suma", 0);
			$media = $resultado/count($res_media);		
			echo "Nota media es $media";		
		}

		if ($acc == "maximo"){
			$res_max = array();
			foreach($alumnos as $alumno) {
				array_push($res_max, $alumno["calificacion"]);
					}	
			$max = max($res_max);	
			echo "Nota maxima es $max";		
		}


		if ($acc == "minimo"){
			$res_min = array();
			foreach($alumnos as $alumno) {
				array_push($res_min, $alumno["calificacion"]);
					}	
			$min = min($res_min);	
			echo "Nota minima es $min";		
		}
		


		?>
	


	
	 
</body>
</html>