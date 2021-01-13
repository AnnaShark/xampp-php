<?php
require "session.php";
            
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title shere</title>
<style type="text/css">
    	table {
    		width: 50%;
    		border-collapse: collapse;
    		}
    	tr:nth-child(even){
    		background-color: grey;
    	}
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

var ncuenta = <?php 
    $ncuenta = filter_input(INPUT_GET, "ncuenta", FILTER_SANITIZE_SPECIAL_CHARS);
    echo json_encode($ncuenta, JSON_HEX_TAG); ?>;

$().ready( function() {
	$.post('detalles-data.php', {'ncuenta': ncuenta}, refrescar, 'json'); 
	$("form").on( "submit", function( event ) { 
        var $btn = $(document.activeElement);
        var accion = $btn.val();

		event.preventDefault();
 		// Serializacion de datos
		var datos = $( this ).serialize();
        datos2 = datos+"&accion="+accion+"&ncuenta="+ncuenta;
		console.log(datos2)

		// Envio de datos serializados
		$.post('mov-data.php', {'datos': datos2}); 
		// Limpieza de campos
		$.post('detalles-data.php', {'ncuenta': ncuenta}, refrescar, 'json'); 
	}); 
});
//test
//$test = [{"N_CUENTA":"23454543","TITULAR":"Anya Sharkova","SALDO":"48.00","INTERES":"0.20"},{"N_CUENTA":"23454545","TITULAR":"Anya Sharkova","SALDO":"34.00","INTERES":"1.00"}]
function refrescar( movs ){
	console.log(movs)

	$('#tbl_cuentas tbody tr').not(':first').remove(); 
	// Generacion de filas por cada usuario 
	$(movs).each(function( index, mov ) {
	$("#tbl_cuentas").find('tbody') 
		.append($('<tr>')
			.append($('<td>')
					.html(mov.FECHA))
			.append($('<td>')
					.html(mov.CANTIDAD))
			.append($('<td>')
					.html(mov.CONCEPTO))			
		); 
	});
    
    //$(movs).last($('#saldo').html(mov.SALDO))
    var here = $(movs).last()[0]["SALDO"]
    console.log(here)
    $('#saldo').html(here)


}
</script>





</head>
<body>
<h1>BIENVENIDO <?= $usuario['USUARIO'] ?></h1>
<p><?= ($usuario['ADMINISTRADOR'])?"ADMINISTRADOR":"USUARIO"; ?></p> 
<a href="logout.php">CERRAR SESION</a>
<br><br><br>

<div id='capa'>
	<table id='tbl_cuentas'>
	<tr><th>FECHA</th><th>CANTIDAD</th><th>CONCEPTO</th></tr> </table>
</div>

<br><br>

<div id='capa2'>
    SALDO ACTUAL: <span id = "saldo"></span>
</div>

<br><br>

<form>

CANTIDAD: <input type="number" name="cantidad"  min="0" required><br/><br/>  
CONCEPTO: <textarea name="concepto" required></textarea><br /> <br/>
<input type="submit" id = "retirar" name="accion" value="RETIRAR"> 
<input type="submit" id = "ingresar" name="accion" value="INGRESAR">
</form>

</body>
</html>