
<?php
class persona {
// Atributos
private $nombre;
private $edad;

function __construct($_nombre,$_edad ) {
                $this->nombre = $_nombre;
                echo "Persona created<br>";
}

function __get($atr) {
	return $this->$atr;
}
function __set($atr, $valor) {
	switch($atr) {
		case "edad": {
			if ($valor>0&&$valor<100){
                 $this->edad = $valor;
			} else {echo "below 0 or above 100";}
		}; break;
		case "nombre": {
			$this->nombre = $valor;
		}; break;
	}
}

function Saludar(){
	echo "Hola ".$this->nombre;
}

function add_edad($years){
	$this->edad += $years;
}

}


//check
$p = new persona("Albert",20);
$p->Saludar();
$p->nombre = "Yulius";
echo "<br>".$p->nombre ;
echo "<br>";
$p->edad = -30;

$p->edad = 30;
echo "<br>".$p->edad." years" ;
$p->add_edad(5);
echo "<br>".$p->edad." years" ;

?>
