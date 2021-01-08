<?php


$bloqueo = "";

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
        
    
 
        
        
    if ( !empty($_GET) ) {
            // Obtencion de valores del formulario
            $ncuenta = filter_input(INPUT_GET, "ncuenta", FILTER_SANITIZE_SPECIAL_CHARS);  
    
       
             // Consulta
             $sentencia = $pdo->prepare("SELECT N_CUENTA, TITULAR, SALDO, INTERES, APERTURA, BLOQUEADA FROM Cuentas WHERE N_CUENTA = :ncuenta"); 
             $sentencia->execute([':ncuenta' => $ncuenta]);    
             
             // Bucle de recorrido de conjunto de resultados
             echo "<table><tr><td>N_CUENTA</td><td>TITULAR</td><td>SALDO</td><td>INTERES</td><td>APERTURA</td><td>BLOQUEADA</td></tr>";
             while ($reg = $sentencia->fetch()) {
                 echo "<tr>";
                 foreach ($reg as $key=> $value){  
                    if ($key == "BLOQUEADA" ) {
                        if ($value == 0){echo "<td>NO</td>";
                        }else{echo "<td>YES</td>";};
                    }else{       
                     echo "<td>".$value."</td>";}
                 } echo "</tr>";
             }    
                    
        
    

    } else{
        echo "La cuenta no encontrada";
    }


    if ( !empty($_POST) ){
        $bloquear = filter_input(INPUT_POST, "bloquear");
        if ($bloquear == "BLOQUEAR")  {
            $resultados = $pdo->prepare("UPDATE CUENTAS SET BLOQUEADA = 1 WHERE N_CUENTA = :ncuenta");
            $resultados->execute([':ncuenta' => $ncuenta]); 
            $bloqueo = "la cuenta esta bloqueada";
        }
    }




?>



<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title shere</title>
<style type="text/css">
    	table {
    		width: 50%;
    		border-collapse: collapse;
    		}
    	tr:nth-child(even){
    		background-color: grey;
    	}
    </style>
</head>
<body>
<form method="post">

<input type="submit" name="bloquear" value="BLOQUEAR"> 
<?php echo $bloqueo ?>

<br/> <br/> 

</form>
</body>
</html>