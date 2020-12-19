
<?php
class ingrediente {
// Atributos
	private $nombre;
	private $precio_s;
	private $precio_d;

	function __construct($_nombre,$_precio_s, $_precio_d) {
	                $this->nombre = $_nombre;
	                $this->precio_s = $_precio_s;
	                $this->precio_d = $_precio_d;

	}

	function __get($atr) {
		return $this->$atr;
	}


}
/*function __get($atr) {
	return $this->$atr;
}
function __set($atr, $valor) {
       $this->$atr = $valor;
}

function mostrar(){

	echo "<tr><td>$this->matricula</td><td>$this->marca</td><td>$this->modelo</td><td>$this->combustible</td></tr>";

}*/




//check
//$a_1 = new automovil("4383-SA","Seat","Toledo", 24.56 );



?>
