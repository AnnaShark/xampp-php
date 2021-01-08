<?php

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

$pdo = new PDO($dsn, $user, $pass, $opt);


$sentencia = $pdo->prepare("SELECT N_CUENTA FROM Cuentas"); 
$sentencia->execute();

$cuenta_list = array();
while ($cuentas = $sentencia->fetch()) {
    array_push($cuenta_list,$cuentas["N_CUENTA"]); // Visualizacion matriz de valores de registro
    }


$bloqueada_or = 0;
$bloqueada_des = 0;
$saldo_err = "";
$bloq_err_or = "";
$bloq_err_des = "";
$operation_approved  = 1;


if ( !empty($_POST) ) {
    // Obtencion de valores del formulario
    $cuenta_or = filter_input(INPUT_POST, "ncuenta_or");
    $cuenta_des = filter_input(INPUT_POST, "ncuenta_des");
    $cantidad = filter_input(INPUT_POST, "cantidad");



    if($cuenta_or == $cuenta_des){
        $same_cuenta = "Los nomeros de cuenta destino y origen seleccionados no pueden ser el mismo";
        $operation_approved  = 0;
    }


    $sentencia = $pdo->prepare("SELECT SALDO, BLOQUEADA FROM Cuentas WHERE N_CUENTA = :cuenta ");
    $sentencia->execute([':cuenta' => $cuenta_or]);

    while ( $datos = $sentencia->fetch()) {

        if ($cantidad > intval($datos["SALDO"])){
            $operation_approved  = 0;
            $saldo_err = "SALDO INSUFICIENTE EN CUENTA DE ORIGEN";
        };
        $bloqueada_or = $datos["BLOQUEADA"];
        if($bloqueada_or){
            $operation_approved  = 0;
            $bloq_err_or = "LA CUENTA $cuenta_or ESTÁ BLOQUEADA"; }
    }

    $sentencia = $pdo->prepare("SELECT SALDO, BLOQUEADA FROM Cuentas WHERE N_CUENTA = :cuenta ");
    $sentencia->execute([':cuenta' => $cuenta_des]);

    while ( $datos = $sentencia->fetch()) {
        $bloqueada_des = $datos["BLOQUEADA"];
        if($bloqueada_des){
            $operation_approved  = 0;
            $bloq_err_des = "LA CUENTA $cuenta_des ESTÁ BLOQUEADA"; }
    }


    if($operation_approved){

        try {   

            // ---------------------------- Inicio de transacción
                $pdo->beginTransaction();
                            // Registro del movimiento 1
                $concepto_or = "TRASPASO A ".$cuenta_des;
                $sentencia = $pdo->prepare("INSERT INTO MOVIMIENTOS( CANTIDAD, CONCEPTO, N_CUENTA, FECHA ) VALUES ( :cantidad, :concepto, :cuenta, :fecha)");
                $sentencia->execute([':cuenta' => $cuenta_or, ':cantidad' => -$cantidad, ':concepto' => $concepto_or,
                ':fecha' => (new Datetime())->format('Y-m-d H:i:s')]);

                // Actualizacion de la cuenta 1
                $sentencia= $pdo->prepare("UPDATE CUENTAS SET SALDO = SALDO + :saldo WHERE N_CUENTA = :cuenta");
                $sentencia->execute([':saldo' => -$cantidad, ':cuenta' => $cuenta_or]);


                                            // Registro del movimiento 1
                $concepto_des = "TRASPASO DESDE ".$cuenta_or;
                $sentencia = $pdo->prepare("INSERT INTO MOVIMIENTOS( CANTIDAD, CONCEPTO, N_CUENTA, FECHA ) VALUES ( :cantidad, :concepto, :cuenta, :fecha)");
                $sentencia->execute([':cuenta' => $cuenta_des, ':cantidad' => $cantidad, ':concepto' => $concepto_des,
                ':fecha' => (new Datetime())->format('Y-m-d H:i:s')]);

                // Actualizacion de la cuenta 1
                $sentencia= $pdo->prepare("UPDATE CUENTAS SET SALDO = SALDO + :saldo WHERE N_CUENTA = :cuenta");
                $sentencia->execute([':saldo' => $cantidad, ':cuenta' => $cuenta_des]);



                // --------------------------- Confirmación de transacción
                $pdo->commit(); 
                $success = "traspaso con exito";} catch( Exception $ex) {
                echo "Error al realizar la operación: ".$ex->getMessage(); // --------------------------- Cancelación de transacción
                $pdo->rollBack(); die();
            }


    }
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1"> <title>Insert title here</title> 
</head>
<body>
    
<form method="post">
		
	<?php
					echo "<label for='ncuenta'>Cuenta de origen:</label>";

					echo '<select id="ncuenta" name="ncuenta_or" required>';
					
					foreach($cuenta_list as $item){
						echo "<option value ='$item'>$item</option>";
					}
                    echo "</select> $bloq_err_or";
                    
                    echo "<br/><br/>";

                    echo "<label for='ncuenta'>Cuenta de destino:</label>";

					echo '<select id="ncuenta" name="ncuenta_des" required>';
					
					foreach($cuenta_list as $item){
						echo "<option value ='$item'>$item</option>";
					}
					echo "</select> $bloq_err_des";


    ?>
<br/><br/> 
CANTIDAD: <input type="number" name="cantidad"  min="0" required><?php echo $saldo_err ?><br/><br/>  
<input type="submit" name="accion" value="TRASPASAR"> 

</form>

<?php if ( isset($same_cuenta)) { echo $same_cuenta;} ?>
<?php if ( isset($success)) { echo $success;} ?>

</body>
</html>