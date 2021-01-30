<?php
namespace Modelo;

abstract class Modelo{
    public abstract static function listar();
    public abstract static function insertar($obj);
    public abstract static function eliminar();
    public abstract static function listarUs();

}




?>