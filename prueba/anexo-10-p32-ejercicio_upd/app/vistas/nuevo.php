<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<h1>NUEVO USUARIO</h1>
<h2 style='background-color: #ff0000'><?= $error['mensaje']?></h2>
<a href="http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/cerrarsesion/">CERRAR SESION</a><br/>
<form action='http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/insertar/' method='post'>
	Usuario: <input type='text' name='usuario' value='<?= $error['nombre']?>'>
	Clave: <input type='text' name='clave' value='<?= $error['clave']?>'><br/>
	Administrador: <input type='checkbox' name='administrador'
	<?=(($error['administrador']==1)?'checked':'')?>><br/>
	Activo: <input type='checkbox' name='activo'
	<?=(($error['activo']==1)?'checked':'')?>><br/>
	<input type='submit' value='registrar'>
</form>
<a href='http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/listar'>Volver a lista usuarios</a>
</body>
</html>