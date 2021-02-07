<?php
require "session.php";
$titular_err = "";

 
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
        
    
 
        
        
    if ( !empty($_POST) ) {
            // Obtencion de valores del formulario
            $titular = filter_input(INPUT_POST, "titular");  

        // Comprueba de la exsistencia
        $sentencia =  $pdo->prepare("SELECT TITULAR FROM Cuentas WHERE TITULAR = :titular");
        $sentencia->execute([':titular' => $titular]);
        $comprueba = $sentencia->fetchColumn();
    
        if(!$comprueba){$titular_err = "No existe el titular!";
        }else{
             // Consulta
             $sentencia = $pdo->prepare("SELECT N_CUENTA, TITULAR, SALDO FROM Cuentas WHERE TITULAR = :titular"); 
             $sentencia->execute([':titular' => $titular]);    
             
             // Bucle de recorrido de conjunto de resultados
             echo "<table><tr><td>N_CUENTA</td><td>TITULAR</td><td>SALDO</td></tr>";
             while ($reg = $sentencia->fetch()) {
                 echo "<tr>";
                 foreach ($reg as $key=> $value){  
                     if ($key == "N_CUENTA") {echo "<td><a href='detalles.php?ncuenta=$value'>$value</a></td>";
                    }else{       
                     echo "<td>".$value."</td>";}
                 } echo "</tr>";
             }    
                    
        }
        
    
    } else{
            // Consulta
            $sentencia = $pdo->prepare("SELECT N_CUENTA, TITULAR, SALDO FROM Cuentas"); 
            $sentencia->execute();    
            
            // Bucle de recorrido de conjunto de resultados
            echo "<table><tr><td>N_CUENTA</td><td>TITULAR</td><td>SALDO</td></tr>";
            while ($reg = $sentencia->fetch()) {
                echo "<tr>";
                foreach ($reg as $key=> $value){          
                    if ($key == "N_CUENTA") {echo "<td><a href='detalles.php?ncuenta=$value'>$value</a></td>";
                    }else{       
                     echo "<td>".$value."</td>";}
                } echo "</tr>";
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
<h1>BIENVENIDO <?= $usuario['USUARIO'] ?></h1>
<p><?= ($usuario['ADMINISTRADOR'])?"ADMINISTRADOR":"USUARIO"; ?></p> 
<a href="logout.php">CERRAR SESION</a>
<br><br><br>


<form method="post">

TITULAR (max 50 letras): <input type="text" name="titular" value="<?php echo isset($_POST['titular']) ? $_POST['titular'] : '' ?>" pattern=".{1,50}" required><?php echo $titular_err ?>
<br/> <br/> 

<input type="submit" name="filtrar" value="FILTRAR"> 

<br/> <br/> 

</form>
</body>
</html>