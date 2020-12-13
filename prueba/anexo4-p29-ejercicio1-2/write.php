<!DOCTYPE html>
<html>
<head>
</head>
<body> 
<div>
	<?php
	$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo4-p29-ejercicio1-2";
	$doc_root= $ruta."/pwd.dat";

	// Hay datos?
		if ( count($_POST) > 0 ) {
			// Obtención de los datos introducidos en el formulario
			$user = filter_input(INPUT_POST, "user");
			$pass= filter_input(INPUT_POST, "pass");
			session_start(); 
			$_SESSION['user'] = $user;
			$f = fopen($doc_root, "r"); 
			if ($f) {
				while ( !feof($f)) {
					$linea = rtrim(fgets($f));
					$curr_user = $user.",".$pass;
					echo "<br>";
					$i=0;
					if($linea==$curr_user ){
						header('Location: http://localhost/prueba/anexo4-p29-ejercicio1-2/foro_UI.php');
						$i++;
						break;
					}
				}
				if ($i==0) {
					echo " HTTP403 – Forbidden";
				}				
				fclose($f);
			} else echo "ERROR ABRIENDO FICHERO"; 
		} else echo "NO HAY DATOS";
		 // Fichero no pudo abrirse
		// No se enviaron datos.
	?>
<br />
</body>
</html>