<?php
$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo3-p52-practica";
set_include_path(PATH_SEPARATOR.$ruta);
require_once "elecciones.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
    <style type="text/css">
    	table {
    		width: 70%;
    		border-collapse: collapse;

    		}
    	tr:nth-child(even){
    		background-color: grey;
    	}
    </style>
</head>
<body>


<?php
$circunscripcion = filter_input(INPUT_GET, "circ", FILTER_SANITIZE_SPECIAL_CHARS); 
$comarca = filter_input(INPUT_GET, "com", FILTER_SANITIZE_SPECIAL_CHARS);
$ayuntamiento = filter_input(INPUT_GET, "ayto", FILTER_SANITIZE_SPECIAL_CHARS); 



function cabecera(){

	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos ;
	if(empty($_GET)){
		echo "<h1>Circunscripciones</h1>";
	}

	if(isset($circunscripcion)==true&&isset($comarca)==false){
		$circ_name = $circunscripciones[$circunscripcion];
		echo "<h1>Comarcas de circunscripción ".$circ_name."</h1>";
	}


	if(isset($circunscripcion)==true&&isset($comarca)==true&&isset($ayuntamiento)==false){
		$circ_name = $circunscripciones[$circunscripcion];
		$com_name = $comarcas[$circ_name][$comarca];
		echo "<h1>Ayuntamientos de comarca  ".$com_name."</h1>";
	}

	if(isset($circunscripcion)==true&&isset($comarca)==true&&isset($ayuntamiento)==true){
		$circ_name = $circunscripciones[$circunscripcion];
		$com_name = $comarcas[$circ_name][$comarca];
		$ayto_name = $ayuntamientos[$com_name][$ayuntamiento];

		echo "<h1>Ayuntamiento  ".$ayto_name."</h1>";
	}

}

function listarCircunscripciones(){
	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos;
	$i = 0;
	echo "<table>";
	while($i<count($circunscripciones)){
		foreach($circunscripciones as $circ){
			echo "<tr><td><a href='datos.php?circ=$i'>".$circ."</a></td></tr>";
			$i++;
			}
		;
		echo "</table>";
	}
}

function listarComarcas($cir){

	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos;
	$circ_name = $circunscripciones[$circunscripcion];
	$i = 0;
	echo "<table>";
	while($i<count($comarcas[$circ_name])){
		foreach($comarcas[$circ_name] as $com){
			echo "<tr><td><a href='datos.php?circ=$cir&com=$i'>".$com."</a></td></tr>";
			$i++;
			}
		;
		echo "</table>";
	}


}


function listarAyuntamientos($cir,$cor){

	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos;
	$circ_name = $circunscripciones[$circunscripcion];
	$com_name = $comarcas[$circ_name][$comarca];

	$i = 0;
	echo "<table>";
	while($i<count($ayuntamientos[$com_name])){
		foreach($ayuntamientos[$com_name] as $ayto){
			echo "<tr><td><a href='datos.php?circ=$cir&com=$cor&ayto=$i'>".$ayto."</a></td></tr>";
			$i++;
		}
		;
		echo "</table>";
	}
}

function menu($circ, $com ) {
	echo "<h2>Menu</h2>";
	echo "<h3>Circunscripciones</h3>";
	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos;
	listarCircunscripciones();

	if (isset($circunscripcion)==true){
		echo "<h3>Comarcas</h3>";
		listarComarcas( $circ );
	}

	if (isset($comarca)==true){
		echo "<h3>Ayuntamientos</h3>";
		listarAyuntamientos($circ,$com);
	}

}

function total_comarca($com){
	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos,$votos;
	$circ_name = $circunscripciones[$circunscripcion];
	$com_name = $comarcas[$circ_name][$com];

	$ayut_list = array();
	$i = 0;
	while($i<count($ayuntamientos[$com_name])){
		foreach($ayuntamientos[$com_name] as $ayto){
			$ayut_list[$i] = $ayto;
			$i++;
		}
	
	}

	$zero_matrix = array_fill(0, 12, 0);
	$keys_matrix = array_keys($votos[$ayut_list[0]]);
	$result_matrix = array_combine($keys_matrix,$zero_matrix);

	foreach($ayut_list as $ayut){

			foreach($result_matrix as $key=>$value) {
		        $result_matrix[$key] = $result_matrix[$key]+$votos[$ayut][$key];

		    }
	}

	return $result_matrix;
}


function total_circunscripcion($circ){
	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos,$votos;
	$circ_name = $circunscripciones[$circ];
	$ayut_list = array();

	$j = 0;
	foreach($comarcas[$circ_name] as $com){
				$com_name = $com;
					foreach($ayuntamientos[$com_name] as $ayto){
						$ayut_list[$j] = $ayto;
						$j++;
					}

	}
	
	$zero_matrix = array_fill(0, 12, 0);
	$keys_matrix = array_keys($votos[$ayut_list[0]]);
	$result_matrix = array_combine($keys_matrix,$zero_matrix);

	foreach($ayut_list as $ayut){

			foreach($result_matrix as $key=>$value) {
		        $result_matrix[$key] = $result_matrix[$key]+$votos[$ayut][$key];

		    }
	}	

	return $result_matrix;
}


function mostrar_total( $totales ){
	echo "<h2>Totales</h2>";
	$i = 0;
	echo "<table>";
	while($i<count($totales)){
		foreach($totales as $key=>$value){
			echo "<tr><td>$key</td><td>$value</td></tr>";
			$i++;
			}
		;
		echo "</table>";
	}
}


function votos_por_circunscripcion(){
	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos,$votos;
	$votos_sub = array();
	foreach($circunscripciones as $circ){
		$circ_pos = array_search($circ, $circunscripciones) ;
		$votos_sub += array($circ => total_circunscripcion($circ_pos));
	}
	return $votos_sub;
}

function votos_por_comarca($circ){
	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos,$votos;
	$votos_sub = array();
	$circ_name = $circunscripciones[$circ];
	$i=0;
	foreach($comarcas[$circ_name] as $com){
		$votos_sub += array($com => total_comarca($i));
		$i++;
	}
	return $votos_sub;
}

function votos_por_ayuntamiento($circ, $com){
	global $circunscripcion, $comarca, $ayuntamiento, $circunscripciones, $comarcas, $ayuntamientos,$votos;
	$votos_sub = array();
	$circ_name = $circunscripciones[$circ];
	$com_name = $comarcas[$circ_name][$com];
	$i=0;
	foreach($ayuntamientos[$com_name] as $ayut){
		$votos_sub += array($ayut => $votos[$ayut]);
		$i++;
	}	
	return $votos_sub;
}

function mostrar_subtotales( $subtotales ){
	echo "<h2>Subtotales</h2>";

	foreach ($subtotales as $row): //array_map('htmlentities', $row);
		echo array_search($row, $subtotales)."<br>";
		echo '<table style="text-align:center";><thead><tr><th>';
		echo implode('</th><th>', array_keys(current($subtotales)))."</th></tr></thead><tbody>";
    	echo "<tr><td>".implode('</td><td>', $row)."</td></tr>";
    	echo "</tbody></table>";
    	echo "<br>";
	endforeach;
  	
	}	


cabecera();
menu($circunscripcion, $comarca);

if(isset($circunscripcion)==true&&isset($comarca)==true){
	$totals = total_comarca($comarca);
} elseif (isset($circunscripcion)==true&&isset($comarca)==false) {
	$totals = total_circunscripcion($circunscripcion);
}

echo "<br><br>";

mostrar_total( $totals );



if(isset($circunscripcion)==true&&isset($comarca)==true){
	$subtotals = votos_por_ayuntamiento($circunscripcion,$comarca);
} elseif (isset($circunscripcion)==true&&isset($comarca)==false) {
	$subtotals = votos_por_comarca($circunscripcion);
}elseif(isset($circunscripcion)==false&&isset($comarca)==false){
	$subtotals = votos_por_circunscripcion();
}


mostrar_subtotales( $subtotals );

$ganador = array_search(max (array_slice($totals, 1)),$totals);

echo "<h2>Ganador: ".$ganador."</h2>";

?>

</body>
</html>