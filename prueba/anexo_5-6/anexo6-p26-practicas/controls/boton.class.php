<?php

class boton implements htmlrenderable { 
	protected $id;
	protected $valor;
	protected $pulsado;
	
	public function __construct( $_id, $_valor = null ) {
		$this->id = $_id;
		$this->valor = $_valor;

	}

	public function fuePulsado(){
		if(isset($_REQUEST[$this->id])){
			return true;
		}else{return false;}
	}

	public function html(){
		echo "<input type= 'submit' name = $this->id value=$this->valor>";

	}


	public function getValor(){
		return $this->valor;

	}

}


?>