
<?php
class ofertaWeekend implements Calculable {
// Atributos

	function computarPrecio($_precio,$_size, $_cantidad,  $_visa) {
		
		$res =  $_precio * 0.9;
		if ($_visa){
			$res *= 0.95;

		} else{$res =$_precio;}

		return  $res ;
	}

}

class ofertaFamily implements Calculable {
// Atributos

	function computarPrecio($_precio,$_size, $_cantidad,  $_visa) {

		if ($_size == "familiar" && $_cantidad>1){

			$res =  $_precio * 0.8;

			if(($_cantidad-2)!=0){
				$res -=(($_cantidad-2)*4);
			}

			if ($_visa){
				$res *= 0.98;

			}
		}else{$res =$_precio;}


		return  $res ;
	}

}


class ofertaFriends implements Calculable {
// Atributos


	function computarPrecio($_precio,$_size, $_cantidad,  $_visa) {

		if ($_size == "pequeno" or $_size == "mediano"){
			$res =  $_precio * 0.98;
		} else{$res =$_precio;}


		return  $res ;
	}

}


interface Calculable { function computarPrecio($_precio,$_size, $_cantidad,  $_visa);}
?>
