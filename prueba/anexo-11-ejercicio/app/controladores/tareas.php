<?php
namespace Controladores;
use Utilidades\WSException;
use Utilidades\Mapper;
use Modelo\ModeloTareas as Modelo; 
class Tareas extends Controlador {

    public static function get($peticion) { 
        $res = Modelo::listar(); 
        if ($res == []){
            $res["id"] = -1;
        } 
        return $res;
    }

    public static function post() {
    // POST: /participantes
    // Obtencion de los datos inscritos en la peticion
    $body = file_get_contents('php://input');
    var_dump($body);
    // Decodificacion del objeto enviado
    $nueva_tarea = json_decode($body);
    var_dump( $nueva_tarea);
    // Comprobacion del objeto enviado
    if ( !Mapper::MapCheck($nueva_tarea, ['id_usuario', 'titulo', 'fecha', 'importancia', 'descripcion']) )
        throw new WSException(WSException::ESTADO_JSON_FORMATO_INCORRECTO,"Formato JSON incorrecto");
    // Insercion en el modelo y obtención del identificador
    $idContacto = Modelo::insertar($nueva_tarea); 
    // Retorno de matriz con identificador como respuesta.
    return [
        "id" => $idContacto
        ];
    }


    public static function delete($peticion) {
        //var_dump($peticion);
    // DELETE: /participantes/:id
    // Comprobacion de existencia de parámetro :id 
      //  if ( count($peticion) == 1) {
    // Obtención de parámetro :id
           // $id = $peticion[0];
            
    // Eliminación de registro
            $rowCount = Modelo::eliminar();
            return [
                "rows" => $rowCount
                ];

        //} else throw new \WSException(\WSException::ESTADO_URL_INCORRECTA, "Se esperaba un parámetro");
    }

}   
?>