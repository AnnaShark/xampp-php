<?php

define("DOMAIN", "prueba/anexo-10-p32-ejercicio_upd/public");

/* DEBUG */ echo "DOMAIN:".DOMAIN."<br>";

define("JS_SCRIPTS", "prueba/anexo-10-p32-ejercicio_upd/app/scripts");

/* DEBUG */ echo "JS_SCRIPTS:".JS_SCRIPTS."<br>";

//directorio del proyecto
define("PROJECTPATH", dirname(__DIR__));

/* DEBUG */ echo "PROJECTPATH:".PROJECTPATH."<br>";

//directorio app
define("APPPATH", PROJECTPATH . '/App');

/* DEBUG */ echo "APPPATH:".APPPATH."<br>";

//función de autocarga
function autoload_classes($class_name){

	/* DEBUG */ echo "SE HA LLAMADO A AUTOLOAD ". $class_name."<br>";

	$filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) .'.php';

	/* DEBUG */ echo "CARGANDO ...".$filename."<br>";

	if(is_file($filename)) {
		include_once $filename;
		/* DEBUG */echo "<b>CLASE ".$class_name." CARGADA</b><br>";
	}
}
spl_autoload_register('autoload_classes');

//creación del objeto enrutador y ejecución del controlador.
$app = new \Core\App;
$app->render();


