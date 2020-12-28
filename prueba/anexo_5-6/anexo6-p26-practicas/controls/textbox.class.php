<?php


class textbox implements htmlrenderable { 
	protected $id;
	protected $valor;

	public function __construct($_id, $_valor = "") {
		$this->id = $_id;
		$this->valor = (isset($_REQUEST[$this->id]))?$_REQUEST[$this->id]:$_valor;
	}

	public function esVacio() { return $this->valor == ""; }
	public function getValor() {return $this->valor;}
	public function setValor( $_valor) {$this->valor = $_valor; } 
	public function html() {
		echo "<input type='text' name='$this->id' value='$this->valor'>";
	} 

}



?>