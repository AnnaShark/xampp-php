<?php
namespace App\Controladores;
defined("APPPATH") OR die("Access denied");
use \Core\View;
use \App\Modelos\Usuarios;
use \App\Entidades\Usuario;

class ControlUsuarios
{
//Solicitud de listado de todos los usuarios * URL: controladorusuarios/listar   
    public function listar(){
        $users = Usuarios::getAll();
        View::set("users", $users);
        View::render("lista");
    }

    public function ver($nombre){
        $user = Usuarios::getById($nombre);
        View::set("user", $user); 
        View::render("edicion");
    }

    public function nuevo() {
        View::set("error",[
            'mensaje'=> '',
            'nombre' => '', 
            'clave' => '', 
            'administrador' => 0, 
            'activo' => 0 ]);
        View::render("nuevo");
    }
    
    public function actualizar() {
        $nombre = filter_input(INPUT_POST, "usuario"); 
        $clave = filter_input(INPUT_POST, "clave"); 
        $administrador = isset($_POST['administrador'])?1:0; 
        $activo = isset($_POST['activo'])?1:0;
        $usuario = new Usuario($nombre, $clave, $administrador, $activo); 
        Usuarios::update($usuario);
        $this->listar();
    }
   
    public function eliminar() {
        $nombre = filter_input(INPUT_POST, "usuario");
        Usuarios::delete($nombre);
        $this->listar();
    }

    public function insertar() {
        $nombre = filter_input(INPUT_POST, "usuario"); 
        $clave = filter_input(INPUT_POST, "clave"); 
        $administrador = isset($_POST['administrador'])?1:0; 
        $activo = isset($_POST['activo'])?1:0;
        $usuario_existente = Usuarios::getById($nombre);
        if ( $usuario_existente == NULL ) {
            $nuevo_usuario = new Usuario($nombre, $clave, $administrador, $activo); 
            Usuarios::insert($nuevo_usuario);
            $this->listar();
        } else { 
            View::set("error",[
                'mensaje'=> "Usuario $nombre ya existe",
                'nombre' => $nombre,
                'clave' => $clave,
                'administrador' => $administrador, 
                'activo' => $activo]);
            View::render("nuevo");
        }
    }

}
?>