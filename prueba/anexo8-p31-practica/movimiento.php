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


$bloqueada = 0;
$insuf_saldo = 0;
$saldo_err = "";
$bloq_err = "";
$operation_approved  = 1;

if ( !empty($_POST) ) {
    // Obtencion de valores del formulario
    $cuenta = filter_input(INPUT_POST, "ncuenta");
    $cantidad = filter_input(INPUT_POST, "cantidad");
    $concepto = filter_input(INPUT_POST, "concepto");
    if ( array_key_exists("RETIRAR", $_POST) ) {
                    $cantidad *= -1;
    }
    $accion = filter_input(INPUT_POST, "accion");

    $sentencia = $pdo->prepare("SELECT SALDO, BLOQUEADA FROM Cuentas WHERE N_CUENTA = :cuenta ");
    $sentencia->execute([':cuenta' => $cuenta]);

    while ( $datos = $sentencia->fetch()) {

        if (-$cantidad > intval($datos["SALDO"])){
            $insuf_saldo = 1;
            $saldo_err = "SALDO INSUFICIENTE";
        };
        $bloqueada = $datos["BLOQUEADA"];
        if($bloqueada){$bloq_err = "CUENTA BLOQUEADA"; }
        }

    if($accion == "RETIRAR" && $insuf_saldo == 1){
        $operation_approved  = 0;
    }
    if($bloqueada == 1){$operation_approved = 0;}

    if($operation_approved){

        try {   

            // ---------------------------- Inicio de transacción
                $pdo->beginTransaction();
                            // Registro del movimiento
                $sentencia = $pdo->prepare("INSERT INTO MOVIMIENTOS( CANTIDAD, CONCEPTO, N_CUENTA, FECHA ) VALUES ( :cantidad, :concepto, :cuenta, :fecha)");
                $sentencia->execute([':cuenta' => $cuenta, ':cantidad' => $cantidad, ':concepto' => $concepto,
                ':fecha' => (new Datetime())->format('Y-m-d H:i:s')]);

                // Actualizacion de la cuenta
                $sentencia= $pdo->prepare("UPDATE CUENTAS SET SALDO = SALDO + :saldo WHERE N_CUENTA = :cuenta");
                $sentencia->execute([':saldo' => $cantidad, ':cuenta' => $cuenta]);

                // --------------------------- Confirmación de transacción
                $pdo->commit(); } catch( Exception $ex) {
                echo "Error al realizar la operación: ".$ex->getMessage(); // --------------------------- Cancelación de transacción
                $pdo->rollBack(); die();
            }

            $sentencia = $pdo->prepare("SELECT SALDO FROM CUENTAS WHERE N_CUENTA = :cuenta"); $sentencia->execute([':cuenta'=>$cuenta]);
            $nuevo_saldo = $sentencia->fetchColumn();

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
					echo "<label for='ncuenta'>NUM_CUENTA:</label>";

					echo '<select id="ncuenta" name="ncuenta" required>';
					
					foreach($cuenta_list as $item){
						echo "<option value ='$item'>$item</option>";
					}
					echo "</select> $bloq_err";


    ?>
<br/><br/> 
CANTIDAD: <input type="number" name="cantidad"  min="0" required><?php echo $saldo_err ?><br/><br/>  
CONCEPTO: <textarea name="concepto" required></textarea><br /> <br/>
<input type="submit" name="accion" value="RETIRAR"> 
<input type="submit" name="accion" value="INGRESAR">
</form>

<?php if ( isset($nuevo_saldo)) { ?>
El nuevo saldo es: <?= $nuevo_saldo; ?> <?php } ?>

</body>
</html>