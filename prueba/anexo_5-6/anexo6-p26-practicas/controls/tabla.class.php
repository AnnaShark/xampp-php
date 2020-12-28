<?php


class tabla implements htmlrenderable { 
	protected $id;
	protected $columnas = array(); 
	protected $datos = array();

	public function __construct( $_id, $_datos = null, $_columnas) {
		$this->id = $_id;
		$this->datos = $_datos;
		$this->columnas = $_columnas;
	}


	public function html(){
		echo "<table><tr>";
		foreach($this->columnas as $columna){
			echo "<th>$columna</th>";
		}

		echo "<tr>";

		foreach($this->datos as $producto){
			echo "<tr>";
			foreach($producto as $key=> $value){
				echo "<td>$value</td>";
			}
			echo "</tr>";
		}

		echo "</table>";   

	}

	public function getValor() {return $this->id;}
	public function setValores($_datos) {$this->datos = $_datos;}

}




?>