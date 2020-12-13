<!DOCTYPE html>
<html>
<head>
<title>Insert title here</title> </head>
<body>
<form action="reintegro.php" method="post">
	<label for="sum">Importe</label>
	<input type="number" name="sum"><br /> 
	<br /> 
	<input type="submit" value="Reintegro">
</form>


<?php

	session_start();
	$cuenta = $_SESSION['cuenta'];
	$saldo = intval($_SESSION['saldo']);
	if ( count($_POST) > 0 ) {
		$sum_reint = filter_input(INPUT_POST, "sum");

		if ($sum_reint >0 && $sum_reint<=$saldo){
			reintegrar($sum_reint);
			header('Location: http://localhost/prueba/anexo4-p29-ejercicio5-6/gestion.php');
		} else {echo "Error: El importe debe ser mayor de cero  e inferior o igual al saldo del usuario";}
	}

	function replace_a_line($data_line) {
		global $cuenta, $rewritten_line;
		if(substr($data_line, 0, 3)==$cuenta){
     		return $rewritten_line."\n";
  		} else {return $data_line;}
	}

function reintegrar ($sum){
	global $cuenta;
	$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo4-p29-ejercicio5-6";
	$doc_root= $ruta."/data.dat";

	$f = fopen($doc_root, "r+");
	if ($f) {
		while ( !feof($f)) {
			$linea = rtrim(fgets($f));
			$data_line =  explode(", ", $linea);

			$i=0;
			if($data_line[0] == $cuenta){
				//echo $data_line[0]."<br>";
				//echo $data_line[4]."<br>";
				$data_line[4] = $data_line[4]-$sum;
				//echo $data_line[4]."<br>";
				global $rewritten_line ;
				$rewritten_line = implode(", ", $data_line);

				
				$data = file($doc_root); // reads an array of lines

				$data = array_map('replace_a_line',$data);

				file_put_contents($doc_root, implode('', $data));
				$i++;
				break;
			}
		}
		if ($i==0) {echo "<br>ERROR";}				
		fclose($f);
	} else {echo "ERROR ABRIENDO FICHERO";}
} 
?>
</body>
</html>