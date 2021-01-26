<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<script src="<?= JS_SCRIPTS?>/jquery-3.0.0.min.js"></script>
<script>
$().ready(function() {
	$('form').submit(function(e){
		var user = $(this).find('input:hidden').val();
		var response = confirm("Desea eliminar usuario: " + user );
		if ( !response) e.preventDefault();
	});
});
</script>
</head>

<body>
	<h1>LISTADO DE USUARIOS</h1>
	<a href="http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/cerrarsesion/">CERRAR SESION</a><br/>
	<a href='http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/nuevo'>Insertar nuevo usuario</a><br/>
	<table border='1' class="table">
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Clave</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($users as $user) { ?>
		<tr>
			<td><a href='http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/ver/<?=$user->nombre?>'><?=$user->nombre ?></a></td>
			<td><?= $user->clave ?></td>
			<td>
				<form action='http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/eliminar' method='post'>
				<input type='hidden' name='usuario' value='<?= $user->nombre?>'>
				<input type='submit' value='Eliminar'>
				</form>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	</table>
</body>
</html>