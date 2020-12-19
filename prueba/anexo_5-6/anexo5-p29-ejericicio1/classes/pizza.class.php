
<?php
class pizza {
// Atributos
	private $nombre;
	private $precio_p;
	private $precio_m;
	private $precio_f;

	function __construct($_nombre,$_precio_p, $_precio_m, $_precio_f) {
	                $this->nombre = $_nombre;
	                $this->precio_p = $_precio_p;
	                $this->precio_m = $_precio_m;
	                $this->precio_f = $_precio_f;

	}





	function __get($atr) {
			return $this->$atr;
		}

}
/*
function __set($atr, $valor) {
       $this->$atr = $valor;
}

function mostrar(){

	echo "<tr><td>$this->matricula</td><td>$this->marca</td><td>$this->modelo</td><td>$this->combustible</td></tr>";

}




//check
//$a_1 = new automovil("4383-SA","Seat","Toledo", 24.56 );*/



?>
