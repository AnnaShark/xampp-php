<?php
require_once 'clases/controles.class.php';
$txt_cifra = new validatebox("txt_cifra");
$txt_cifra->esValido();
//var_dump($txt_cifra);
$lst_moneda = new listbox("lst_moneda"); 
$lst_moneda->opcion(new listboxopcion("EURO -> DOLAR", 1));
$lst_moneda->opcion(new listboxopcion("DOLAR -> EURO", 2));
//EL CODIGO DE VALIDACION & CONVERSION DE VALORES DEBERÍA IR AQUI

if($_GET["lst_moneda"]==1){
	$res = $_GET["txt_cifra"] * 1.23;
	$curr = "DOLARS";
} elseif ($_GET["lst_moneda"]==2) {
	$res = $_GET["txt_cifra"] * 0.82;
	$curr = "EUROS";
}




?>

<!DOCTYPE html>
<html>
<head>
<title>Selecciona una imagen para subirla al servidor</title> </head>
<body>
<form>
	<h1>CAMBIO MONEDA</h1>
	CANTIDAD: <?php $txt_cifra->html(); ?><br/> <br/>
	MONEDA: <?php $lst_moneda->html(); ?> 
	<br/><br/>
	<input type="submit" value="CALCULAR">
	<br/><br/>

</form>

	<?php
		if(isset($res)){
			echo "RESULT: ".$res." $curr";
		}
	?>
</body>
</html>