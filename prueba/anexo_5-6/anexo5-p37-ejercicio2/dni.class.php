<?php



class dni {
	protected $dni;


	public function __construct($_dni){
		 $this->dni = $_dni;

	}
	public function getNumero(){
		$numeros = substr($this->dni, 0, -1);
 		return $numeros;
	}

	public function getLetra(){
		 $letra = substr($this->dni, -1);
		 return $letra;
	}

	public function validar($numeros,$letra){

		if(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ("$numeros") == 8 ){
			echo "valido";
			return true;
		} else{echo "no valido"; return false; }
	}
}


//checks
//'73547889M'
//'73547889F'
$dni_1 = new dni('73547889M');

$numerosX = $dni_1-> getNumero();

//echo "<br>$numerosX";
$letraX = $dni_1-> getLetra();

//echo "<br>$letraX";
$dni_1->validar($numerosX,$letraX);

















?>
