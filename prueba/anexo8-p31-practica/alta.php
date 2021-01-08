<?php
$cuenta_dupl_err = "";
if ( !empty($_POST) ) {
    // Obtencion de valores del formulario
    $cuenta = filter_input(INPUT_POST, "ncuenta");
    $titular = filter_input(INPUT_POST, "titular");  
    $saldo_ini = filter_input(INPUT_POST, "saldo_ini");
    $interes = floatval(filter_input(INPUT_POST, "interes"))/100; 
 
    $host = '127.0.0.1';
    $db = 'banco';
    $port = 3306;
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port"; 
    $user = 'root'; // Usuario
    $pass = ''; // Contraseña
    // Opciones de configuracion
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false ];

    try {
        $pdo = new PDO($dsn,  $user, $pass, $opt);
        // ---------------------------- Inicio de transacción
        $pdo->beginTransaction();

        // Comprueba de la exsistencia
        $sentencia =  $pdo->prepare("SELECT N_CUENTA FROM Cuentas WHERE N_CUENTA = :cuenta");
        $sentencia->execute([':cuenta' => $cuenta]);
        $comprueba = $sentencia->fetchColumn();
        //echo " $comprueba"
        if($comprueba){$cuenta_dupl_err = "la cuenta ya existe!";
        }else{

            // Registro de la cuenta
            $sentencia = $pdo->prepare("INSERT INTO Cuentas(
                N_CUENTA, TITULAR, SALDO, INTERES,  APERTURA, BLOQUEADA) VALUES ( :cuenta, :titular, :saldo_ini, :interes, :fecha, 0)"); 
            $sentencia->execute([
                ':cuenta' => $cuenta,
                ':titular' => $titular,
                ':saldo_ini' => $saldo_ini,
                ':interes' => $interes,
                ':fecha' => (new Datetime())->format('Y-m-d H:i:s')]);    

        // --------------------------- Confirmación de transacción
        $pdo->commit();
    }
    } catch( Exception $ex) {
        echo "Error al realizar la operación: ".$ex->getMessage(); 
        // --------------------------- Cancelación de transacción 
        $pdo->rollBack(); 
        die();
    }      

}

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1"> <title>Insert title shere</title> </head>
<body>
<form method="post">
NUMERO DE CUENTA (8 numeros): <input type="numeric" name="ncuenta" value="<?php echo isset($_POST['ncuenta']) ? $_POST['ncuenta'] : '' ?>" pattern=".{8,8}" required> <?php echo $cuenta_dupl_err ?><br/> <br/> 
TITULAR (max 50 letras): <input type="text" name="titular" value="<?php echo isset($_POST['titular']) ? $_POST['titular'] : '' ?>" pattern=".{1,50}" required><br/> <br/> 
SALDO INICIAL: <input type="number" name="saldo_ini" value="<?php echo isset($_POST['saldo_ini']) ? $_POST['saldo_ini'] : '' ?>" min="0" required><br/> <br/> 
INTERES (%): <input type="number" name="interes" value="<?php echo isset($_POST['interes']) ? $_POST['interes'] : '' ?>" min="0" max="100"required><br/> <br/> 

<input type="submit" name="registrar" value="REGISTRAR"> 

</form>
</body>
</html>