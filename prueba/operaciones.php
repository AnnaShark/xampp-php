
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
    <style type="text/css">

    </style>
</head>
<body>
		
		<h1>Calculadora</h1>

		<form action="operaciones.php" method="post">
		<div>	

  			<input type="number" id="quantity" name="quantity1">
        <input type="number" id="quantity" name="quantity2">
  			</br></br>
  	</div>		

    <div>
    <input id="Suma" title="Enviar" name = "operacion" type="submit" value="Suma" />
    <input id="Resta" title="Enviar" name = "operacion" type="submit" value="Resta" />
    <input id="Producto" title="Enviar" name = "operacion" type="submit" value="Producto" />
    <input id="Divisón" title="Enviar" name = "operacion" type="submit" value="Divisón" />
    </br></br>
    </div>
  

    </form>        

  		<?php


  		$importe1 = filter_input(INPUT_POST, "quantity1", FILTER_SANITIZE_SPECIAL_CHARS);
      $importe2 = filter_input(INPUT_POST, "quantity2", FILTER_SANITIZE_SPECIAL_CHARS);
  		
      if (empty($_POST)){
		   exit;
		}

	
		if ($importe1 == NULL  ||  $importe2 == NULL){
      echo "Tienes que introducir ambos números.";
		}else{
      switch($_POST['operacion']) {
        case "Suma": {
          $resultado = $importe1+ $importe2;
          };break;
        case "Resta": {
         $resultado = $importe1- $importe2;
          };break;
        case "Producto": {
          $resultado = $importe1* $importe2;
        };break;
        case "Divisón": {
           $resultado = $importe1/ $importe2;
            };break;
        }
        echo $resultado;
			}


		?>



	
	 
</body>
</html>