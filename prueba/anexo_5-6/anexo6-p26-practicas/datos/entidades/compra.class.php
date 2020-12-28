<?php

class compra{
public $comprador; // Nombre del comprador
public $mail; // Dirección de correo electrónico 
public $productos; // Matriz de objetos producto adquiridos

public function __construct($_comprador, $_mail, $_productos) {
	$this->comprador = $_comprador;
	$this->mail = $_mail;
	$this->productos = $_productos;
}
public function calcularImporte(){
	foreach($this->productos as $item){
    $sumatorio += $item["importe"];
	}
	return $sumatorio;

}
public function calcularImporteIVA( $_iva ){
	$importeIVA = calcularImporte() * (1+ $_iva);
	return $importeIVA;
}

}


?>