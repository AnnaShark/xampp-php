<?php
	if ( count($_POST) > 0 ) {
		$frutas = filter_input(INPUT_POST, "frutas", FILTER_SANITIZE_SPECIAL_CHARS); 
		$quantity = filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_SPECIAL_CHARS);
		$visa = filter_input(INPUT_POST, "visa", FILTER_SANITIZE_SPECIAL_CHARS);

		header('Location: factura.php');} 
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
    <style type="text/css">
    	form{
    		border-style: dotted;
    		padding: 5px;
    	}

    	td{
    		border-style: solid;
    	}
    </style>
</head>
<body>
		
		Producto
		<form action="factura.php" method="post">
		<table> <tr>
			<td>
			<div class = "frutas">	
				<div>
				  <input type="radio" id="judias" name="frutas" value="judias">
				  <label for="judias">Judias</label>
				</div>
				<div>
				  <input type="radio" id="garbanzos" name="frutas" value="garbanzos">
				  <label for="garbanzos">Garbanzos</label>
				</div>
				<div>
				  <input type="radio" id="lentejas" name="frutas" value="lentejas">
				  <label for="lentejas">Lentejas</label>
				</div>
			</div>
			</td>

			<td>
			<div class = "frutas">	
				<label for="quantity">Cantidad</label>
  				<input type="number" id="quantity" name="quantity">
  				Kgs
  			</div>
  			</td>

  			<td>
  			<div class = "frutas">	
				Tarjeta Visa
				<input type="checkbox" name="visa" value="visa"/>
			</div>
			</td>

			<td>
			<div class = "frutas">
			<br /><input id="Submit1" title="Enviar" type="submit" value="Enviar datos" />
			</div>
			</td>

		</tr></table>

		</form>  


	 
</body>
</html>