<?php

define("DOMAIN", "prueba/anexo10-p32-ejercicio/app/public");
define("JS_SCRIPTS", "prueba/anexo10-p32-ejercicio/qpp/scripts");

//directorio del proyecto
define("PROJECTPATH", dirname(__DIR__));
//directorio app
define("APPPATH", PROJECTPATH . '/App');

//función de autocarga
function autoload_classes($class_name)
{ 
    $filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) .'.php'; 
    if(is_file($filename)) {
        include_once $filename; 
    }       
}
spl_autoload_register('autoload_classes');

//creación del objeto enrutador y ejecución del controlador.
$app = new \Core\App; 
$app->render();

?>