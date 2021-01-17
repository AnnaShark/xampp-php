<?php
namespace App\Entidades;
defined("APPPATH") OR die("Access denied");


class Usuario {
    public $nombre;
    public $clave;
    public $administrador;
    public $activo;

    public function __construct($nombre,$clave,$administrador, $activo){
        $this->nombre = $_nombre;
        $this->clave = $_clave;
        $this->administrador = $_administrador; 
        $this->activo = $_activo;
    }
    
}
?>