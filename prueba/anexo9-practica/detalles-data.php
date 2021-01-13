<?php
require "session.php";
header('Content-Type: application/json; charset=utf-8');




// Devuelve matriz de objetos usuario con todos los usuarios.
function obtenerMovs($ncuenta) {
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
    $resultados1 =  $pdo->prepare("SELECT FECHA, CANTIDAD, CONCEPTO FROM Movimientos WHERE N_CUENTA = :ncuenta");
    //var_dump($ncuenta);
    $resultados1->execute([':ncuenta' => $ncuenta]);
    $final_answer = $resultados1->fetchAll(PDO::FETCH_OBJ);

    $resultados2 =  $pdo->prepare("SELECT SALDO FROM Cuentas WHERE N_CUENTA = :ncuenta");
    $resultados2->execute([':ncuenta' => $ncuenta]);
    $saldo = $resultados2->fetchAll(PDO::FETCH_OBJ);

    array_push( $final_answer,  $saldo[0]);

    //var_dump( $saldo[0]->SALDO );
    //var_dump( $final_answer);

    
    return $final_answer;
    
    
}
   



try {
    //$ncuenta = "23454543";
    // Obtencion de lista actualizada de usuarios registrados
    $ncuenta =filter_input(INPUT_POST, "ncuenta");  
    
    $movs = obtenerMovs($ncuenta);
    //var_dump($movs);
    echo json_encode($movs);
} catch( Exception $ex) {
    // Envio de código de error de alta
    echo json_encode((object)['error' => $ex->getMessage()]);   
}

?>