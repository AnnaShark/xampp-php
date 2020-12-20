


<?php
class textbox implements htmlrenderable { 
	protected $id;
	protected $valor;
	

	public function __construct($_id, $_valor = null) {
		$this->id = $_id;
		if ( $_valor == null ) {
			// Recupera valor de matriz superglobal $_REQUEST
			if ( isset ($_REQUEST[$this->id])) { $this->valor = $_REQUEST[$this->id];
			} 
		} else {
		    $this->valor = $_valor;
		} 
	}


	public function getValor() { 
		return $this->valor;
	}
	
	public function html() {
		echo "<input type='text' name='$this->id' value='$this->valor'>";
	} 

}


class listbox implements htmlrenderable { 
	protected $id;
	protected $opciones = array();

	public function __construct($_id ) {
        $this->id = $_id;
	}

	public function opcion( listboxopcion $opcion ) {
		array_push($this->opciones, $opcion );
		return $this;
	}

	public function getValor() {
		return ( isset($_REQUEST[$this->id])?$_REQUEST[$this->id]:NULL);
	}

	public function html() {
		echo "<select name='$this->id'>";
		foreach ( $this->opciones as $opcion ) {

			if ( isset( $_REQUEST[$this->id])) {
		 		$opcion->estaSeleccionado
					(( $_REQUEST[$this->id] == $opcion->getValor()));
			}
         	$opcion->html();
        }
		echo "</select>";

	}

}


class listboxopcion implements htmlrenderable { 
	protected $titulo;
	protected $valor;
	protected $seleccionado;
	
	public function __construct( $_titulo, $_valor, $_seleccionado = NULL){
		$this->titulo = $_titulo;
		$this->valor = $_valor; $this->seleccionado = $_seleccionado;
	}

	public function estaSeleccionado( $_seleccionado) {
		$this->seleccionado = $_seleccionado;
	}
	
	public function html() {
		echo "<option value='$this->valor' ".
		(($this->seleccionado)?"selected":"").">$this->titulo</option>";
	}

	public function getValor() {
		return ( isset($_REQUEST[$this->valor])?$_REQUEST[$this->valor]:NULL);
	}
}


class validatebox extends textbox {
	protected $error_longitud = false;
	protected $error_numerico = false;
	protected $longitud;
	
	public function __construct($_id, $_valor = null, $_longitud = 10){
		$this->id = $_id;
		if ( $_valor == null ) {
			// Recupera valor de matriz superglobal $_REQUEST
			if ( isset ($_REQUEST[$this->id])) { 
				
				$this->valor = $_REQUEST[$this->id];
				$this->longitud = $_longitud;
				
			} 
		} else {
		    $this->valor = $_valor;
		    $this->longitud = $_longitud;
		   
		} 
	}

	public function esValido(){
		if(is_numeric($this->valor)== false){
			$this->error_numerico = true;
		}


		if(strlen("$this->valor")>$this->longitud){
			$this->error_longitud = true;
		}

	}

	public function html() {
		echo "<input type='text' name='$this->id' value='$this->valor'>";
		if($this->error_numerico == true){
			echo "VALOR NO VALIDO  ";
		}

		if($this->error_longitud == true){
			echo "LONGITUD EXCEDIDA";
		}		
		
	} 


}

interface htmlrenderable { 
	function getValor();
	function html();
}

?>