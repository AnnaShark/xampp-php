<!DOCTYPE html>
<html>
<head>
</head>
<body> 

<?php

if ( count($_POST) > 0 ) {
	$pizza = filter_input(INPUT_POST, "pizza", FILTER_SANITIZE_SPECIAL_CHARS); 
	$size = filter_input(INPUT_POST, "size", FILTER_SANITIZE_SPECIAL_CHARS);
	$quantity = filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_SPECIAL_CHARS);
	$ingred = $_POST['ingred'];
	$visa = filter_input(INPUT_POST, "visa", FILTER_SANITIZE_SPECIAL_CHARS);
	$discount = filter_input(INPUT_POST, "discount", FILTER_SANITIZE_SPECIAL_CHARS);


	if ( isset($_POST["visa"])) {
		$visa = true;
	}else {
		$visa = false;
	}

	echo "Pizza: ".$pizza."<br>";
	echo "Size: ".$size."<br>";

	include_once(__DIR__ . "/classes/compra.class.php");

	$compra = new compra($pizza,$size,$quantity, $visa );
	//var_dump($ingred);

	foreach($ingred as $item => $value){
		$compra-> añadirIngrediente($value["name"], $value["size"]);
	}
	//var_dump($compra);

	$compra-> calcularPrecio();
	//var_dump($compra);

	echo "Importe: ".$compra->precio."<br>";
	echo "Oferta: ".$discount."<br>";

	include_once(__DIR__ . "/classes/ofertas.class.php");

	switch($discount){
		case "weekend":
        	$oferta = new ofertaWeekend();
        	break;

	  	case "family":
        	$oferta = new ofertaFamily();
        	break;	

	  	case "friends":
        	$oferta = new ofertaFriends();
        	break;	
	}
	

	$compra-> añadirOferta($oferta);
	//var_dump($compra);
	echo "Importe final: ".round($compra->precio, 2)."<br>";






} 


?>

</body>
</html>