<?php
require "session.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>HOME</title>


</head>
<body>

<h1>BIENVENIDO <?= $usuario['USUARIO'] ?></h1>
<p><?= ($usuario['ADMINISTRADOR'])?"ADMINISTRADOR":"USUARIO"; ?></p> 
<a href="logout.php">CERRAR SESION</a>
<br><br><br>


	<a href="alta.php">Alta de cuenta (solo para administradores)</a>
	<br>
	<a href="listado.php">Listado de cuenta</a>
	<br>
	<a href="movimiento.php">Movimiento</a>
	<br>
	<a href="traspaso.php">Traspaso</a>
	<br>

</body>
</html>