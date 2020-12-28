
<?php
class producto { 
	public $id;
	public $nombre;
	public $categoria;
	public $precio;
	public $unidades;
	public $importe;
	
	public function __construct( $_id, $_producto, $_categoria, $_precio ){
		$this->id = $_id;
		$this->nombre = $_producto;
		$this->categoria = $_categoria;
		$this->precio = $_precio;
	}

	public function compra( $_unidades ) {
		$this->unidades = $_unidades;
		$this->importe = $this->unidades * $this->precio;
	}


}


?>