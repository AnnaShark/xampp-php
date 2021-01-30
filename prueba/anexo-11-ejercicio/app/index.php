<?php

define("APPPATH", dirname(__FILE__));

// Función de autocarga de clases
function autoload_classes($class_name){
	$filename = APPPATH. '/' . str_replace('\\', '/', $class_name) .'.php'; 
	if(is_file($filename)){
		include_once $filename; 
	}
 }

 spl_autoload_register('autoload_classes');

use Utilidades\WSException;
use Vistas\VistaJson; 

// Generador de vistas
$vista = new VistaJson();

// Manejador de excepciones


set_exception_handler(function ($exception) use ($vista) {
// Se crea una matriz con los datos de la excepcion
	$cuerpo = array( "tipo" => get_class($exception),"mensaje" => $exception->getMessage());
	if ( get_class($exception) == "WSException") {
		$cuerpo['estado'] = $exception->estado;
		$vista->estado = $exception->getCode();
	} else {
		$cuerpo['traza'] = $exception->getTrace(); 
		$vista->estado = 500;
	}
	$vista->imprimir($cuerpo);
	}
);

// Decodificacion de URL

$peticion = explode('/', $_GET['PATH_INFO']); 
$recurso = "Controladores\\".array_shift($peticion); 
$metodo = strtolower($_SERVER['REQUEST_METHOD']);
var_dump($recurso);
// ENRUTADO: Comprobacioon: Existe el controlador? 
if ( class_exists($recurso) == true ) {
	$respuesta = call_user_func(array($recurso, $metodo), $peticion);
	$vista->imprimir($respuesta);
}else{
	throw new WSException(WSException::ESTADO_INEXISTENCIA_RECURSO, "Recurso no existente");
}

function getParametrosURL(){
	$parametros = $_GET;
	unset($parametros["PATH_INFO"]);
	return $parametros;
}

?>