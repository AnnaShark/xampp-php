<?php
	if ( count($_POST) > 0 ) {
		$nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_SPECIAL_CHARS); 
		$apellidos = filter_input(INPUT_POST, "apellidos", FILTER_SANITIZE_SPECIAL_CHARS);
		$pais = filter_input(INPUT_POST, "pais", FILTER_SANITIZE_SPECIAL_CHARS);
		$intereses = filter_input(INPUT_POST, "intereses[]", FILTER_SANITIZE_SPECIAL_CHARS);

		header('Location: datos.php');} 
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
</head>
<body>
	<div>
		<form action="datos.php" method="post">
			Nombre
			<input id="txtUsuario" name="nombre" type="text"/><br />

			<br />Apellidos
			<input id="txtUsuario" name="apellidos" type="text"/><br />

			<br />Pais
			<select id="Select1" name="pais" size="5">
			<option value="1">Alemania</option>
			<option value="2">Francia</option>
			<option value="3">Rusia</option>
			<option value="4">Inglaterra</option>
			</select><br />

			<br />Preferencias<br />
			<input type="checkbox" name="intereses[]" value="teatro"/>Teatro<br />
			<input type="checkbox" name="intereses[]" value="cine"/>Cine<br />
			<input type="checkbox" name="intereses[]" value="libros"/>Libros<br />


			<br /><input id="Submit1" title="Enviar" type="submit" value="Enviar" />
		</form>

    </div>    


	 
</body>
</html>