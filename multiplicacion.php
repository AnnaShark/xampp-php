
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
    		background-color: yellow;
    	}
    </style>
</head>
<body>
		
		<h1>DESGLOSE DE MONEDAS</h1>

		<form action="desglose.php" method="post">
		<div>	
			<label for="quantity">Cantidad a desglosar: </label>
  			<input type="number" id="quantity" name="quantity">
  			
  		</div>		

  		<?php

  		$importe = filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_SPECIAL_CHARS); 
		
		$monedas = array(10000,5000, 2000, 1000, 500, 200,100, 50, 25, 10,5,1);
		echo "<br/>";
		echo "<table>";
		foreach ($monedas as &$value){
			echo "<tr><td>".$value."</td>";
			if ($value > $importe){
				echo "<td>0</td>";
			}else{
				$cambio = floor($importe/$value);
				echo "<td>".$cambio."</td></tr>";
				$importe=$importe-($cambio*$value);
				}
		}

		?>

		<div>
		<br /><input id="Submit1" title="Enviar" type="submit" value="Ejecutar Desglose" />
		</div>
	

		</form>  

	
	 
</body>
</html>