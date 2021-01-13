<?php
// Inicialización del estado de sesion
session_start();
// Existen datos del usuario en el estado de sesion? 
if ( isset($_SESSION['usuario'])) {
    // Existen: Se almacenen en la variable $usuario
    $usuario = $_SESSION['usuario'];
} else {
    // No existen: Redireccion a la página de error.
    header('Location: '.'error.html');
}
?>