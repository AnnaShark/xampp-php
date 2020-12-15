
<?php
class automovil {
// Atributos
private $matricula;
private $marca;
private $modelo;
private $combustible;

function __construct($_matricula,$_marca, $_modelo, $_combustible) {
                $this->matricula = $_matricula;
                $this->marca = $_marca;
                $this->modelo = $_modelo;
                $this->combustible = $_combustible;

}


function __get($atr) {
	return $this->$atr;
}
function __set($atr, $valor) {
       $this->$atr = $valor;
}

function mostrar(){

	echo "<tr><td>$this->matricula</td><td>$this->marca</td><td>$this->modelo</td><td>$this->combustible</td></tr>";

}

}


//check
$a_1 = new automovil("4383-SA","Seat","Toledo", 24.56 );
$a_2 = new automovil("3949-SS","Citron","Saxo", 20.345 );
$a_3 = new automovil("7644-GH","Peugeot","307", 14.56);
$a_4 = new automovil("4955-FF","Fiat","Punto", 37.54);

//$a_1->mostrar();*/


?>
