<?php

class contexto implements htmlrenderable { 
	protected $id;
	protected $valor;
	protected $pulsado;
	
public function __construct($_id, $_valor = null){ 
	$this->id = $_id;
	$this->valor = (isset($_REQUEST[$this->id]))
					?unserialize($_REQUEST[$this->id])
					:$_valor;
}	

	public function getValor(){
		return $this->valor;
	}
	public function setValor( $_valor){
		$this->valor = $_valor;
	}

	public function html() {
		echo "<input type='hidden' name='$this->id'
		value='".serialize($this->valor)."'>";
	}



}



?>