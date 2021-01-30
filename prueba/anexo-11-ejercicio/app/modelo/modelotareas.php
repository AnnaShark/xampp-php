<?php
namespace Modelo;

use Utilidades\WSException;
use Entidades\Usuario;

class ModeloTareas extends Modelo {
    
    public static function listar(){
    
    $params = getParametrosURL();

// filtrado
    if ( !empty($params)) { $where = "WHERE ";
        foreach($params as $campo => $valor ) {
            $where .= $campo. " = '".$valor."' AND ";   
        }

    $where = substr($where, 0, -4); // Quita el ultimo AND sobrante.
    } else $where = "";

    // Composicion de la consulta
    $sql = "SELECT * FROM tareas $where";
    try {
        $datos = array();
        $db = Database::instance(); 
        $query = $db->run($sql);
        while( $reg = $query->fetch(\PDO::FETCH_OBJ)) {
            array_push($datos, $reg); 
        }
        return $datos;
    } catch(\PDOException $e) {
        throw new WSException(WSException::ESTADO_ERROR_BD, $e->getMessage());
    }
}    

public static function listarUs(){
    
    $params = getParametrosURL();
     var_dump($params);
// filtrado
    if ( !empty($params)) { $where = "WHERE ";
        foreach($params as $campo => $valor ) {
            $where .= $campo. " = '".$valor."' AND ";   
        }

    $where = substr($where, 0, -4); // Quita el ultimo AND sobrante.
    } else $where = "";

    // Composicion de la consulta
    $sql = "SELECT * FROM usuarios $where";
    //try {
        $datos = array();
        $db = Database::instance(); 
        $query = $db->run($sql);
        while( $reg = $query->fetch(\PDO::FETCH_OBJ)) {
            array_push($datos, $reg); 
        }
        return $datos;
   // } catch(\PDOException $e) {
    //    throw new WSException(WSException::ESTADO_ERROR_BD, $e->getMessage());
    //}
}    

    public static function eliminar() {
        //try {
            $params = getParametrosURL();
            var_dump("sjkdhfsjk");
            // filtrado
            if ( !empty($params)) { $where = "WHERE ";
                foreach($params as $campo => $valor ) {
                    $where .= $campo. " = '".$valor."' AND ";   
                }
        
            $where = substr($where, 0, -4); // Quita el ultimo AND sobrante.
            }
        
            // Composicion de la consulta
            $sql = "DELETE FROM tareas $where";
            $db = Database::instance();
            $query = $db->run($sql);
            return $query->rowCount();
       // } catch(\PDOException $e) {
           // throw new WSException(WSException::ESTADO_ERROR_BD, $e->getMessage());
      //  }
	}


    public static function insertar($obj) {
         try {
            $db = Database::instance();
            $sql = "INSERT INTO tareas (id_usuario, titulo, fecha, importancia, descripcion) VALUES (:id_usuario, :titulo, :fecha, :importancia, :descripcion )"; 
            $query = $db->run($sql, [
                ":id_usuario" => $obj->id_usuario,
                ":titulo" => $obj->titulo,
                ":fecha" => date("Y-m-d H:i:s", $obj->fecha),
                ":importancia" => $obj->importancia,
                ":descripcion" => $obj->descripcion]);
            

           $sql_2 = "SELECT * from tareas WHERE id = LAST_INSERT_ID()";
          
           $db = Database::instance();
           $query = $db->run($sql_2);
           $tarea = $query->fetch(\PDO::FETCH_OBJ);
           return $tarea;
       }  catch(\PDOException $e) {
           throw new WSException(WSException::ESTADO_ERROR_BD, $e->getMessage());
        }
    }
        


	/*public function autentificar() {
		$nombre = filter_input(INPUT_POST, "usuario");
		$clave = filter_input(INPUT_POST, "clave");
		$user = Usuarios::getById($nombre);
		$pass = $user->clave;
		if($pass==$clave){
			session_start();
			$_SESSION['usuario'] = $user;
			$this->listar();
		} else{
			$error = "Usuario desconocido";
			View::render("login");
		}
	}*/

	

}