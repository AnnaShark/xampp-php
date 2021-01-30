<?php
namespace Utilidades;

class WSException extends \Exception{

    const ESTADO_URL_INCORRECTA = 2;
    const ESTADO_INEXISTENCIA_RECURSO = 3; 
    const ESTADO_METODO_NO_PERMITIDO = 4; 
    const ESTADO_ERROR_BD = 5;
    const ESTADO_JSON_FORMATO_INCORRECTO = 6;
    
    public $estado;
    public function __construct($estado, $mensaje, $codigo = 400){
        $this->estado = $estado;
        $this->mensaje = $mensaje;
        $this->codigo = $codigo;
    }

}
?>