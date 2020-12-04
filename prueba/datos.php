
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
</head>
<body>
	<div>
		<?php
			echo "Nombre"."<br />";
			$nombre = $_POST["nombre"];
			echo $nombre."<br />"."<br />";

			echo "Apellidos"."<br />";
			$apellidos = $_POST["apellidos"];
			echo $apellidos."<br />"."<br />";

	
			echo "Pais"."<br />";
			$pais = $_POST["pais"];
			switch($pais) {
				case 1: {
					echo "Alemania"."<br />"."<br />";
					};break;
				case 2: {
					echo "Francia"."<br />"."<br />"; };break;
				case 3: {
					echo "Rusia"."<br />"."<br />";};break;
				case 4: {
					echo "Inglaterra"."<br />"."<br />"; };break;
				}

			
			echo "Intereses"."<br />";
			$intereses = $_POST["intereses"];
			echo "<ul>";
			// Bucle de obtención y visualización de cada idioma seleccionado.
			foreach ($intereses as $interes){
			// Visualizacion del idioma seleccionados
			echo "<li>".$interes."</li>";
			}
			echo "</ul>";
		?>
    </div>    


	 
</body>
</html>