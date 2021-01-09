<?php

require 'session.php';
// Eliminacion de la sesion 
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1"> <title>Insert title here</title> </head>
<body>
<h1>HAS CERRADO SESION <?= $usuario['USUARIO'] ?></h1> 
<a href="access.html">VOLVER A FORMULARIO DE ACCESO</a> 
</body>
</html>