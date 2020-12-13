<!DOCTYPE html>
<html>
<head>
<title>Insert title here</title> </head>
<body>
<form action="index.php" method="post">
	<label for="cuenta">número de cuenta</label>
	<input type="text" name="cuenta"><br /> 
	<br /> 
	<label for="pin">PIN</label>
	<input type="text" name="pin"><br />
	<br /> 
	<input type="submit" value="ENVIAR">
</form>


<?php
	$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo4-p29-ejercicio5-6";
	$doc_root= $ruta."/data.dat";



	if ( count($_POST) > 0 ) {
		$cuenta = filter_input(INPUT_POST, "cuenta");
		$pin= filter_input(INPUT_POST, "pin");

		session_start(); 
		$_SESSION["cuenta"] = $cuenta;

		$f = fopen($doc_root, "r");
		if ($f) {
			while ( !feof($f)) {
				$linea = rtrim(fgets($f));
				$data_line =  explode(", ", $linea);
				$i=0;
				if($data_line[0] == $cuenta && $data_line[1] == $pin){
					$_SESSION["user"] = $data_line[1];
					$user = $_SESSION["user"];
					$i++;
					//break;
					header('Location: http://localhost/prueba/anexo4-p29-ejercicio5-6/gestion.php');
					}
				}
				if ($i==0) {
					echo " HTTP403 – Forbidden";
				}
				log_login();							
				fclose($f);
				
		} else echo "ERROR ABRIENDO FICHERO"; 
	}

function log_login(){
	global $ruta, $user;
	$today = date('dmy');
	$time = date("H:i:s");
	$ip = $_SERVER['REMOTE_ADDR'];
	$log_root= $ruta."/logs/log".$today.".log";
	$f = fopen($log_root, "a");
		
	if ($f) {
		$log = $user.", ".$time.", ".$ip."\n";
		fwrite($f,$log);
		fclose($f);
	} else {echo "ERROR ABRIENDO FICHERO";} 
	
}

?>
</body>
</html>