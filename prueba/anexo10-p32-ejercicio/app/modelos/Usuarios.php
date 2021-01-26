<?php
namespace App\Modelos;
defined("APPPATH") OR die("Access denied");
use \Core\Database;
use \App\Entidades\Usuario;
use \App\Interfaces\Crud;

include_once "/Applications/XAMPP/xamppfiles/htdocs/prueba/anexo10-p32-ejercicio/app/interfaces/Crud.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/prueba/anexo10-p32-ejercicio/app/core/Database.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/prueba/anexo10-p32-ejercicio/app/entidades/Usuario.php";


class Usuarios implements Crud{

    public static function getAll(){

        $usuarios = array();
        try {
            $db = Database::instance();
            $sql = "SELECT * from usuarios";
            $query = $db->run($sql);
            // Bucle de obtención de resultados
            while($reg=$query -> fetch()){
                // Creacion de objeto Usuario por cada registro y agregado
                // a matriz de resultados array_push($usuarios,
                array_push($usuarios, 
                            new Usuario ($reg["USUARIO"],
                                        $reg["CLAVE"],
                                        $reg["ADMINISTRADOR"],
                                        $reg["ACTIVO"]
            )); 
            }
            return $usuarios;
        }catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    } 

    public static function getById($id){
        try {
            $db = Database::instance(); 
            $sql = "SELECT * from usuarios WHERE usuario LIKE :usuario";
            $query = $db->run($sql, [':usuario' => $id]);
            $reg=$query -> fetch();
            return (($reg)?
                new Usuario (
                    $reg["USUARIO"],
                    $reg["CLAVE"],
                    $reg["ADMINISTRADOR"],
                    $reg["ACTIVO"])
                :NULL);
        } catch(\PDOException $e) {
            print "Error!: " . $e->getMessage();
    }
    }

    public static function insert($user){
        try {
            $db = Database::instance(); 
            $sql = "INSERT INTO usuarios (usuario, clave, administrador, activo) VALUES (:usuario, :clave, :administrador, :activo)";
            $query = $db->run($sql, [
               ":usuario" => $user->nombre,
                ":clave" => $user->clave,
                ":administrador" => $user->administrador,
                ":activo" => $user->activo]);
        } catch(\PDOException $e) {
        print "Error!: " . $e->getMessage();
        }
    }

    public static function update($user){
        try {
            $db = Database::instance(); 
            $sql = "UPDATE usuarios SET clave=:clave, administrador= :administrador, activo=:activo WHERE usuario = :usuario";
            $query = $db->run($sql, [
                ":usuario" => $user->nombre,
                ":clave" => $user->clave,
                ":administrador" => $user->administrador,
                ":activo" => $user->activo]);
        } catch(\PDOException $e) {
        print "Error!: " . $e->getMessage();
        }
    }

    public static function delete($user){
        try {
            $db = Database::instance(); 
            $sql = "DELETE FROM usuarios WHERE usuario = :usuario"; 
            $query = $db->run($sql, [':usuario' => $id]);
        } catch(\PDOException $e) {
        print "Error!: " . $e->getMessage();
        }
    }

}
?>