<?php

session_start();
// Comprobacion de valores enviados 
if ( count($_POST) > 0 ) {
    // Obtencion de valores
    $usuario = filter_input(INPUT_POST, "usuario");
    $clave = filter_input(INPUT_POST, "clave");
// Comprobacion de valores
// Acceso a la base de datos
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

    $pdo = new PDO($dsn,  $user, $pass, $opt);    

    $sentencia =  $pdo->prepare("SELECT USUARIO, CLAVE, ADMINISTRADOR FROM USUARIOS WHERE USUARIO = :usuario AND CLAVE = :clave");
    $sentencia->execute([':usuario' => $usuario,':clave' => $clave]);

    // Obtencion de datos del usuario con las credenciales indicadas
    if ( $registro = $sentencia->fetch(PDO::FETCH_ASSOC)) {
        // Existe el usuario. Sus datos se almacenan en el estado de sesion 
        $_SESSION['usuario'] = $registro;
        header('Location: '.'home.php');
        } else {
        // No existe el usuario. Usuario desconocido 
        header('Location: '.'error.html');
        }
    } else {
        // Error --> Parámetros de usuario inexistentes.
        header('Location: '.'error.html');
    }


?>