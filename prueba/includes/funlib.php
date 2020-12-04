<?php
/**
* @author SyToo * @copyright 2012 */
// Ejercicio 1
function FechaActual() { date_default_timezone_set("Europe/Madrid"); return Date("r");}


//Ejercicio 2

function println($valor) {echo $valor."<br>";}


//Ejercicio 3

function aleatorio($max,$min) {$res = rand($min, $max); return $res;}

//Ejercicio 4

function dia() {date_default_timezone_set("Europe/Madrid"); return Date("D");}
function mes() {date_default_timezone_set("Europe/Madrid"); return Date("M");}

//Ejercicio 5

function operaciones($v1, $v2, $oper = "suma") {
	switch($oper){
		case "suma": {
			$res = $v1 + $v2;};break;
		case "resta": {
			$res = $v1 - $v2;};break;
		case "producto": {
			$res = $v1 * $v2;};break;
		case "cociente": {
			$res = $v1 / $v2;};break;			

	}

	return $res;
}

//Ejercicio 6

function sumatorio($val) {
	static $suma = 0;
	$suma =$suma + $val ; return $suma;}


//Ejercicio 7

function  producto_iterativo($v1, $v2) {
	$mul = $v1 * $v2;
	static $suma = 0;
	$suma =$suma + $mul ; return $suma;}

function  producto_recursivo($v1, $v2) {
	$mul = $v1 * $v2;
	static $supermul = 1;
	$supermul =$supermul * $mul ; return $supermul;}


//Ejercicio 8

function validarEdad($validar) {
	if(is_int($validar) && $validar > 18 && $validar < 65 ){
		$res = true;
	} else{
		$res = false;
	}
	return $res;}


//Ejercicio 9

function media() {
	$r = 0;
	// Bucle de obtencion de argumentos
	for( $i = 0; $i < func_num_args(); $i++) {
	// Obtención y sumatorio de argumento. 
		$r = $r + func_get_arg($i);
	}
	$res = $r/func_num_args();
	return $res;
}

//Ejercicio 10

function tiempo($hora, $minuto) {
	$minuto++;
	if ($minuto > 59){
		$hora++;
		$minuto = 0; 
	}
	echo $hora." : ".$minuto;
}



?>