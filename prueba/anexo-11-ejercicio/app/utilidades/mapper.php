<?php
namespace Utilidades;

class Mapper {

    public static function MapCheck( $obj, $props = Array()) {
        foreach ($props as $prop) {
            if (!property_exists($obj, $prop)) return false;
        }
        return true;
    }
}

?>