<?php

namespace Controladores;
abstract class Controlador {

    public abstract static function get($peticion); 
    public abstract static function post();
    public abstract static function delete($peticion);
}

?>