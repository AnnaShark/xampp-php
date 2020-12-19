
<?php


include_once(__DIR__ . "/../classes/ingrediente.class.php");


$anchoas = new ingrediente("Anchoas",0.25,0.3 );
$atun = new ingrediente("Atun",0.25,0.35);
$bacon = new ingrediente("Bacon",0.2,0.4);
$carneVacuno = new ingrediente("Carne Vacuno",0.2,0.45);
$cebolla = new ingrediente("Cebolla",0.1,0.15);
$cerdo = new ingrediente("Cerdo",0.4,0.65 );
$champinon = new ingrediente("Champinon",0.2,0.4);
$gambas = new ingrediente("Gambas",0.3,0.45);
$pepperoni = new ingrediente("Pepperoni",0.15,0.3);
$pimientos = new ingrediente("Pimientos",0.2,0.25);
$jalapenos = new ingrediente("Jalapenos",0.15,0.25);
$polloMarinado = new ingrediente("Pollo marinado",0.35,0.45);
$quesoCheddar = new ingrediente("Queso cheddar",0.25,0.5);
$quesoProvolone = new ingrediente("Queso provolone",0.3,0.45);
$quesoSuizo = new ingrediente("Queso Suizo",0.4,0.65);
$salchicha = new ingrediente("Salchicha",0.25,0.5);
$tomateNatural = new ingrediente("Tomate natural",0.15,0.25);
$jamonYork = new ingrediente("Jamon york",0.15,0.25);



$_ingredientes = array(
	"Anchoas"=>$anchoas,
	"Atun"=>$atun,
	"Bacon"=>$bacon,
	"Carne_Vacuno"=>$carneVacuno,
	"Cebolla"=>$cebolla,
	"Cerdo" => $cerdo,
	"Champinon" => $champinon,
	"Gambas" => $gambas,
	"Pepperoni" => $pimientos,
	"Pimientos" => $pimientos,
	"Jalapenos" => $jalapenos,
	"Pollo_marinado" => $polloMarinado,
	"Queso_cheddar" => $quesoCheddar,
	"Queso_provolone" => $quesoProvolone,
	"Queso_Suizo" => $quesoSuizo,
	"Salchicha" => $salchicha,
	"Tomate_natural" => $tomateNatural,
	"Jamon_york" => $jamonYork
);


//var_dump($_ingredientes);


?>
