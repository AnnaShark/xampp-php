<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
	<h1>DETALLE USUARIO <?= $user->nombre ?></h1>
	<a href="http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/cerrarsesion/">CERRAR SESION</a><br/>
	<form action='http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/actualizar/' method='post'>
		<input type='hidden' name='usuario' value='<?= $user->nombre?>'>
		Clave: <input type='text' name='clave' value='<?= $user->clave?>'><br>
		Administrador: <input type='checkbox' name='administrador'
		<?= (($user->administrador==1)?'checked':'') ?>><br>
		Activo: <input type='checkbox' name='activo'
		<?= (($user->activo==1)?'checked':'') ?>><br>
		<input type='submit' value='modificar'>
	</form>
	<a href='http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/listar'>Volver a lista usuarios</a>
</body>
</html>