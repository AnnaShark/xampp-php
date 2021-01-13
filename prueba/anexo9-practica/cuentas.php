<?php
require "session.php";
header('Content-Type: application/json; charset=utf-8');

// Decodifica la URL en una matriz asociativa de parámetros
function JQUnserialize( $cadena_datos ) {
    $datos = array();
    //foreach (explode('&', $cadena_datos ) as $dato) {
        $param = explode("=", $cadena_datos);
        //echo var_dump($param);
        if ($param) {
            $clave = urldecode($param[0]);
            $valor = urldecode($param[1]);
            $datos[$clave] = $valor;
        }    
    
    return $datos;
}



// Devuelve matriz de objetos usuario con todos los usuarios.
function obtenerCuentas() {
    global $datos;
    $host = '127.0.0.1';
    $db = 'banco';
    $port = 3306;
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port"; 
    $user = 'root'; // Usuario
    $pass = ''; // Contraseña
    // Opciones de configuracion
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false ];
    $pdo = new PDO($dsn,  $user, $pass, $opt);
    $resultados =  $pdo->prepare("SELECT N_CUENTA, TITULAR, SALDO, INTERES FROM Cuentas WHERE TITULAR LIKE :titular");
    $titular = $datos["titular"];
    //echo var_dump($titular);
    $resultados->execute([':titular' => "%$titular%"]);
    
    return $resultados->fetchAll(PDO::FETCH_OBJ);
    
}
   



try {
    //$cadena_datos = "titular=Anya";
    // Obtencion de lista actualizada de usuarios registrados
    $cadena_datos =filter_input(INPUT_POST, "datos");  
    $datos = JQUnserialize($cadena_datos); 

    $cuentas = obtenerCuentas();
   
    echo json_encode($cuentas);
} catch( Exception $ex) {
    // Envio de código de error de alta
    echo json_encode((object)['error' => $ex->getMessage()]);   
}

?>