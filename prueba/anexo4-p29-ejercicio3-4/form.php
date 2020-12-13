<!DOCTYPE html>
<html>
<head>
<title>Insert title here</title> </head>
<body>
<form action="form.php" method="post">
	<label for="name">Nombre</label>
	<input type="text" name="name"><br /> 
	<br /> 
	<label for="surname">Apellidos</label>
	<input type="text" name="surname"><br />
	<br /> 
	<label for="dni">DNI</label>
	<input type="text" name="dni"><br />
	<br /> 
	<label for="fn">Fecha nacimiento</label>
	<input type="text" name="fn"><br />
	<br /> 


	<input type="submit" value="Candidato1" name="Candidato">
	<input type="submit" value="Candidato2" name="Candidato">
	<input type="submit" value="Candidato3" name="Candidato">

<?php 
	
	$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo4-p29-ejercicio3-4";
	$doc_root= $ruta."/vot.dat";	

	if (count($_POST) > 0 ) {
		$name = filter_input(INPUT_POST, "name");
		$surname= filter_input(INPUT_POST, "surname");
		$fn= filter_input(INPUT_POST, "fn");
		$dni= filter_input(INPUT_POST, "dni");
		$candidato= filter_input(INPUT_POST, "Candidato");

		$f = fopen($doc_root, "a");
		if ($f) {
			fwrite($f,$name.",".$surname.",".$fn.",".$dni.",".$candidato."\r\n");
		}
		fclose($f);		
	}

	
 ?>

</form>
</body>
</html>