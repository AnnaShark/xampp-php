<?php


class datos {

	public static function obtenerProducto( $_id ) {
		$producto = null;
		$document_root = $_SERVER["DOCUMENT_ROOT"];
		$json = file_get_contents("$document_root/prueba/anexo_5-6/anexo6-p26-practicas/datos/productos.json"); // decodificacion de json como matriz asociativa
		$datos = json_decode($json, true);
		// Existe la clave indicada como identificador?
		if ( array_key_exists($_id, $datos) ) {
		// Obtengo array con los valores del objeto producto
		    $array_producto = $datos[$_id];
		        // Obtengo el objeto producto
			$objeto_producto =
				new producto(
					$array_producto['id'],
					$array_producto['producto'],
					$array_producto['categoria'],
					$array_producto['precio']
				);
		}
		return $objeto_producto;
		}

	public static function registrarCompra( compra $compra ){
		$json_data = json_encode($compra);
		$time = time();
		$name = "datos/compras/$time.json";
		file_put_contents($name, $json_data);
	}

}		



?>