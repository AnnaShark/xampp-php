
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
		
		<h1>LA TABLA DE MULTIPLICAR</h1>

		<form action="multiplicacion.php" method="post">
		<div>	

  			<input type="number" id="quantity" name="quantity">
  			
  		</div>		

  		<?php


  		$importe = filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_SPECIAL_CHARS); 
  		if (empty($_POST)){
		   exit;
		}

		
		if ($importe >= 0  && $importe <=10){
			echo "<br/>";
			echo "<table>";
			for ( $i = 0; $i < 11; $i++)
        	{
            	echo "<tr><td>".$importe." x ".$i."</td>";
            	$result = $importe * $i;
            	echo "<td>".$result."</td>.</tr>";
            	
        	}
		}else{
			echo "Tienes que introducir un número comprendido entre 1 y 10 ambos incluidos.";}


		?>

		<div>
		<input id="Submit1" title="Enviar" type="submit" value="MOSTRAR" />
		</div>
	

		</form>  

	
	 
</body>
</html>