 <?php
  $importe1 = "";
  $importe2 = "";
  $importe3 = "";
  $importe4 = "";
  $importe5 = "";
  $importe6 = "";
  $importe7 = "";
  $importe8 = "";
  $importe9 = "";
  $importe10 = "";
  
  $redirection = "";
  $error_mes1 = $_POST["quantity1"];
  $error_mes2 = $_POST["quantity2"];
  $error_mes3 = $_POST["quantity3"];
  $error_mes4 = $_POST["quantity4"];
  $error_mes5 = $_POST["quantity5"];
  $error_mes6 = $_POST["quantity6"];
  $error_mes7 = $_POST["quantity7"];
  $error_mes8 = $_POST["quantity8"];
  $error_mes9 = $_POST["quantity9"];
  $error_mes10 =$_POST["quantity10"];

  if ( count($_POST) > 0 ) {
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


      $i=0;
      $errorcount = 0;
      foreach ($muestras as &$muestra){
        $i++;
        if(empty($muestra)){
           $errorcount++;
          echo '<style type="text/css">
              input[name="quantity'.$i.'"] 
              {background: red;}</style>';
          switch($i){
             case 1: {$error_mes1 = "Campo Vacio";};break;
             case 2: {$error_mes2 = "Campo Vacio";};break;
             case 3: {$error_mes3 = "Campo Vacio";};break;
             case 4: {$error_mes4 = "Campo Vacio";};break;
             case 5: {$error_mes5 = "Campo Vacio";};break;
             case 6: {$error_mes6 = "Campo Vacio";};break;
             case 7: {$error_mes7 = "Campo Vacio";};break;
             case 8: {$error_mes8 = "Campo Vacio";};break;
             case 9: {$error_mes9 = "Campo Vacio";};break;
             case 10: {$error_mes10 = "Campo Vacio";};break;
          }

        } elseif(is_numeric($muestra)== false){
           $errorcount++;
          echo '<style type="text/css">
              input[name="quantity'.$i.'"] 
              {background: red;}</style>';
          switch($i){
             case 1: {$error_mes1 = "Valor no válido";};break;
             case 2: {$error_mes2 = "Valor no válido";};break;
             case 3: {$error_mes3 = "Valor no válido";};break;
             case 4: {$error_mes4 = "Valor no válido";};break;
             case 5: {$error_mes5 = "Valor no válido";};break;
             case 6: {$error_mes6 = "Valor no válido";};break;
             case 7: {$error_mes7 = "Valor no válido";};break;
             case 8: {$error_mes8 = "Valor no válido";};break;
             case 9: {$error_mes9 = "Valor no válido";};break;
             case 10: {$error_mes10 = "Valor no válido";};break;
          }
        }                
         
         if($errorcount == 0){
          $redirection = "resultados.php";
         }



      }}
      $errorcount = 0;
?> 
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
		
		<h1>Tabla de muestras</h1>

		<form action="<?php echo $redirection; ?>". method="post">
		<div>	
        <label for="quantity"> muestra 1 </label>
  			<input type="number" id="quantity" name="quantity1" placeholder="<?php echo $error_mes1; ?>">
        </br></br>

        <label for="quantity"> muestra 2 </label>
        <input type="number" id="quantity" name="quantity2" placeholder="<?php echo $error_mes2; ?>">
        </br></br>

        <label for="quantity"> muestra 3 </label>
        <input type="number" id="quantity" name="quantity3" placeholder="<?php echo $error_mes3; ?>">
        </br></br>

        <label for="quantity"> muestra 4 </label>
        <input type="number" id="quantity" name="quantity4" placeholder="<?php echo $error_mes4; ?>">
        </br></br>

        <label for="quantity"> muestra 5 </label>
        <input type="number" id="quantity" name="quantity5" placeholder="<?php echo $error_mes5; ?>">        
        </br></br>

        <label for="quantity"> muestra 6 </label>
        <input type="number" id="quantity" name="quantity6" placeholder="<?php echo $error_mes6; ?>">
        </br></br>

        <label for="quantity"> muestra 7 </label>
        <input type="number" id="quantity" name="quantity7" placeholder="<?php echo $error_mes7; ?>">
        </br></br>

        <label for="quantity"> muestra 8 </label>
        <input type="number" id="quantity" name="quantity8" placeholder="<?php echo $error_mes8; ?>">
        </br></br>

        <label for="quantity"> muestra 9 </label>
        <input type="number" id="quantity" name="quantity9" placeholder="<?php echo $error_mes9; ?>">                        
        </br></br>

        <label for="quantity"> muestra 10 </label>
        <input type="number" id="quantity" name="quantity10" placeholder="<?php echo $error_mes10; ?>">       
  			</br></br>
  	</div>		

    <div>
    <input id="Suma" title="Enviar" name = "operacion" type="submit" value="Calcular" />

    </br></br>
    </div>
  

    </form>        

	
	 
</body>
</html>