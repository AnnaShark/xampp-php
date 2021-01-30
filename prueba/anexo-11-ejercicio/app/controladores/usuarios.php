<?php
namespace Controladores;
use Utilidades\WSException;
use Utilidades\Mapper;
use Modelo\ModeloTareas as Modelo; 
class Usuarios extends Controlador {

    public static function get($peticion) { 
        
        $res = Modelo::listarUs(); 
        if ($res == []){
            $res["id"] = -1;
        } 
        return $res;
    }

    public static function post() {

    }


    public static function delete($peticion) {

    }

}   
?>