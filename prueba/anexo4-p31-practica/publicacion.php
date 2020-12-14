<!DOCTYPE html>
<html>
<head>
<title>Publicacion</title> </head>
<body>
<form action="publicacion.php" method="post">
	<label for="user">NOMBRE</label>
	<input type="text" name="user"><br /> 
	<br /> 
	<label for="password">CONTRASENA</label>
	<input type="text" name="pass"><br />
	<br /> 
	<label for="post">MENSAJE</label>
	<br /> <br /> 
	<textarea name="mensaje" rows="10" cols="40"></textarea>
	<br /> 
	<input type="submit" value="ENVIAR">
</form>

<?php
	$doc_root= "perfiles/usuarios.dat";

	// Hay datos?
		if ( count($_POST) > 0 ) {
			$checked = 1;
			// Obtención de los datos introducidos en el formulario
			$user = filter_input(INPUT_POST, "user");
			$pass= filter_input(INPUT_POST, "pass");
			$msg = filter_input(INPUT_POST, "mensaje");
			//session_start(); 
			//$_SESSION['user'] = $user;
			$error=0;
			if(strlen($user)==0 or strlen($pass)==0 or strlen($msg)==0 ){
			$error++;
			echo "Error: name, pass and message fields need to be filled";
			}
		}

		if (isset($checked) && $error == 0){
			$f = fopen($doc_root, "r"); 
			if ($f) {
				while ( !feof($f)) {
					$linea = rtrim(fgets($f));
					$curr_user = $user.",".$pass;
					$i=0;
					if($linea==$curr_user ){
						echo "User registration confirmed<br>";
						store_msg($msg);
						$i++;
						break;
					}
				}
				if ($i==0) {
					echo "User is not registered";
				}				
				fclose($f);
			} else echo "ERROR ABRIENDO FICHERO"; 

			
		} 

function store_msg($msg){
	global $user;
	$msg_clean = str_replace( array('<','>' ), ' ', $msg);
	$doc_root_msg= "foro/mensajes.dat";
	$f = fopen($doc_root_msg, "a"); 

	if ($f) {
		fwrite($f,"<mensaje>\n".$user."\n".date("Y-m-d h:i:sa")."\n".$msg_clean."\n"."</mensaje>\n");
		echo "Message saved";
		fclose($f);	
	}
}


?>



</body>
</html>