<?php
require "session.php";
header('Content-Type: application/json; charset=utf-8');

// Decodifica la URL en una matriz asociativa de parámetros
function JQUnserialize( $cadena_datos ) {
    $datos = array();
    foreach (explode('&', $cadena_datos ) as $dato) {
        $param = explode("=", $dato);
       // echo var_dump($param);
        if ($param) {
            $clave = urldecode($param[0]);
            $valor = urldecode($param[1]);
            $datos[$clave] = $valor;
        }    
    }
    return $datos;
}




function regMovimiento() {
    global $datos;

    $cantidad = $datos["cantidad"];
    $concepto = $datos["concepto"];
    $accion = $datos["accion"];
    $ncuenta = $datos["ncuenta"];

    if($accion=="RETIRAR"){$cantidad *= -1;}


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

    try {   

        // ---------------------------- Inicio de transacción
            $pdo->beginTransaction();
                        // Registro del movimiento
            $sentencia = $pdo->prepare("INSERT INTO MOVIMIENTOS( CANTIDAD, CONCEPTO, N_CUENTA, FECHA ) VALUES ( :cantidad, :concepto, :cuenta, :fecha)");
            $sentencia->execute([':cuenta' => $ncuenta, ':cantidad' => $cantidad, ':concepto' => $concepto,
            ':fecha' => (new Datetime())->format('Y-m-d H:i:s')]);

            // Actualizacion de la cuenta
            $sentencia= $pdo->prepare("UPDATE CUENTAS SET SALDO = SALDO + :saldo WHERE N_CUENTA = :cuenta");
            $sentencia->execute([':saldo' => $cantidad, ':cuenta' => $ncuenta]);

            // --------------------------- Confirmación de transacción
            $pdo->commit(); } catch( Exception $ex) {
            echo "Error al realizar la operación: ".$ex->getMessage(); // --------------------------- Cancelación de transacción
            $pdo->rollBack(); die();
        }
    
    
}
   



try {
    //$cadena_datos = "cantidad=3&concepto=dsf&accion=RETIRAR&ncuenta=23454543";
    // Obtencion de lista actualizada de usuarios registrados
    $cadena_datos =filter_input(INPUT_POST, "datos");  
    $datos = JQUnserialize($cadena_datos); 
    //var_dump($datos);

    regMovimiento();
   
} catch( Exception $ex) {
    // Envio de código de error de alta
    echo json_encode((object)['error' => $ex->getMessage()]);   
}

?>