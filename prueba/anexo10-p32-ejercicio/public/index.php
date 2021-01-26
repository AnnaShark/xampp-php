<?php

//define("DOMAIN", "prueba/anexo10-p32-ejercicio/app/public");
define("DOMAIN", "prueba/anexo10-p32-ejercicio");
//echo "DOMAIN: ".DOMAIN."<br>";

define("JS_SCRIPTS", "prueba/anexo10-p32-ejercicio/app/scripts");
//echo "JS_SCRIPTS: ".JS_SCRIPTS."<br>";

//directorio del proyecto
define("PROJECTPATH", dirname(__DIR__));
//echo "PROJECTPATH: ".PROJECTPATH."<br>";

//directorio app
define("APPPATH", PROJECTPATH."/app");
//echo "APPPATH: ".APPPATH."<br>";

//función de autocarga
function autoload_classes($class_name)
{ 
    $filename = APPPATH. '/' . str_replace('\\', '/', $class_name) .'.php'; 
    
    if(is_file($filename)) {
        
        include_once $filename;
        
    }        
}
//include_once '/Applications/XAMPP/xamppfiles/htdocs/prueba/anexo10-p32-ejercicio/app/core/App.php';
spl_autoload_register('autoload_classes');

//creación del objeto enrutador y ejecución del controlador.

$app = new \Core\App;

$app->render();

?>