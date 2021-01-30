<?php

namespace Vistas;

abstract class Vista{

public $estado;
// Método de codificación de los datos indicados en el parámetro $cuerpo.
public abstract function imprimir($cuerpo);
}

?>