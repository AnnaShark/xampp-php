<?php
require "session.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>HOME</title>

<style>
td {background-color: #ffff00;text-align: center}
th {width: 100px; background-color: #eeeeee} 
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
$().ready( function() {
	$.getJSON('cuentas.php', refrescar);
	$( "form").on( "submit", function( event ) { 
		event.preventDefault();
	// Validación de campos. No pueden estar vacios 
		if (!$("input[name='titular']").val())
			{ alert("Titular vacio"); return; } 

		// Serializacion de datos
		var datos = $( this ).serialize();
		
		// Envio de datos serializados
		$.post('cuentas.php', {'datos': datos}, refrescar, 'json'); 
		//console.log("here1")
		// Limpieza de campos
		$("input[name='titular']").val('');
		
	}); 
});
//test
//$test = [{"N_CUENTA":"23454543","TITULAR":"Anya Sharkova","SALDO":"48.00","INTERES":"0.20"},{"N_CUENTA":"23454545","TITULAR":"Anya Sharkova","SALDO":"34.00","INTERES":"1.00"}]
function refrescar( cuentas ){
	console.log(cuentas)
	// Se ha devuelto una matriz?
	/*if ( !$.isArray(cuentas)) {
		alert(cuentas.error);
		return; 
	}*/
	// Eliminar filas existentes
	$('#tbl_cuentas tbody tr').not(':first').remove(); 
	// Generacion de filas por cada usuario 
	$(cuentas).each(function( index, cuenta ) {
	$("#tbl_cuentas").find('tbody') 
		.append($('<tr>')
			.append($('<td>')
				.html("<a href='detalles.php?ncuenta="+cuenta.N_CUENTA+"'>"+cuenta.N_CUENTA+"</a>"))
			.append($('<td>')
					.html(cuenta.TITULAR))
			.append($('<td>')
					.html(cuenta.SALDO))
			.append($('<td>')
					.html(cuenta.INTERES))			
		); 
	});
}
</script>

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
	<br/> <br/> 

	<form>

	TITULAR: <input type="text" name="titular" value="<?php echo isset($_POST['titular']) ? $_POST['titular'] : '' ?>">

	<input type="submit" name="obtener" value="Obtener"> 

	<br/> <br/> 

	</form>

	<div id='capa'>
	<table id='tbl_cuentas'>
	<tr><th>NCUENTA</th><th>TITULAR</th><th>SALDO</th><th>INTERES</th></tr> </table>
    </div>

</body>
</html>