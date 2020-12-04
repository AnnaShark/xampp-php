
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


			echo "<em><strong>FACTURA</strong></em>"."<br />"."<br />";

			echo "Producto:	";
			$frutas = $_POST["frutas"];
			echo $frutas."<br />";

			echo "Unidades: ";
			$quantity = $_POST["quantity"];
			echo $quantity."<br />";
			switch($frutas) {
				case "garbanzos": {
					$importe_basico = $quantity * 2.5;
					};break;
				case "judias": {
					$importe_basico = $quantity * 2;
					};break;
				case "lentejas": {
					$importe_basico = $quantity * 1.25;
					};break;

			}	

	
			echo "VISA: ";
			if ( isset($_POST["visa"])) {
				echo "SI";
			}else {
				echo "NO";
			}


			echo "<br />"."<br />";
			echo "<strong>Importe: </strong>"."<br />";

			If( $quantity > 10 && $quantity <= 50 ){
				$importe_final = $importe_basico * 0.98;
			} else if ($quantity > 50) {
				$importe_final = $importe_basico * 0.90;
			}

			if(isset($_POST["visa"])){
				$importe_final = $importe_basico * 0.95;
			}

			echo $importe_final;

		?>
    </div>    


	 
</body>
</html>