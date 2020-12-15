<!DOCTYPE html>
<html>
<head>
</head>
<body> 
<div>
	<?php

	//spl_autoload_register(function($clase){ $ruta = "classes/$clase.class.php"; 
	//require $ruta;
	//});

	include_once "classes/automovil.class.php";
	$vehiculo = array($a_1,$a_2, $a_3, $a_4 );

function mostrarVehiculos($vehiculo){
	echo "<table>";
	echo "<tr><td>Matricula</td><td>Marca</td><td>Modelo</td><td>Combustible</td></tr>";
	foreach($vehiculo as $auto){
		$auto->mostrar();
	}
	echo "</table>";

}
	mostrarVehiculos($vehiculo)

	?>
<br />
</body>
</html>