
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

	      $importe1 = filter_input(INPUT_POST, "quantity1", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe2 = filter_input(INPUT_POST, "quantity2", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe3 = filter_input(INPUT_POST, "quantity3", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe4 = filter_input(INPUT_POST, "quantity4", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe5 = filter_input(INPUT_POST, "quantity5", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe6 = filter_input(INPUT_POST, "quantity6", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe7 = filter_input(INPUT_POST, "quantity7", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe8 = filter_input(INPUT_POST, "quantity8", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe9 = filter_input(INPUT_POST, "quantity9", FILTER_SANITIZE_SPECIAL_CHARS);
	      $importe10 = filter_input(INPUT_POST, "quantity10", FILTER_SANITIZE_SPECIAL_CHARS);	
	      
	      $muestras = array($importe1, $importe2, $importe3, $importe4, $importe5, $importe6, $importe7, $importe8, $importe9, $importe10);         		

		$max = max($muestras);
		$min = min($muestras);
		$sum = array_sum($muestras);
		$med = $sum/10;


		echo "El valor más grande: ".$max."</br>";
		echo "El valor más pequeño: ".$min."</br>";
		echo "El sumatorio de todos los valores introducidos: ".$sum."</br>";
		echo "La media: ".$med."</br>";
			
		?>
    </div>    


	 
</body>
</html>