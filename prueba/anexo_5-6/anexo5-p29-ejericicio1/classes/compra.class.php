
<?php


class compra{
// Atributos
	private $pizza;
	private $size;
	private $cantidad;
	private $visa;


	function __construct($_pizza,$_size, $_cantidad, $_visa) {
	                $this->pizza = $_pizza;
	                $this->size = $_size;
	                $this->cantidad = $_cantidad;
	                $this->visa = $_visa;

	}


	function añadirIngrediente($_ingrediente, $_doble){
		
		if(isset($this->ingrediente) == false){
			$all_ingreds = array($_ingrediente=> $_doble);
			$this->ingrediente = $all_ingreds;
		} else{
			$all_ingreds = $this->ingrediente;
			$all_ingreds[$_ingrediente]= $_doble; 
			$this->ingrediente = $all_ingreds;
		}

	}

	function calcularPrecio() {
		include_once(__DIR__ . "/../datos/pizzas.dat.php");
		include_once(__DIR__ . "/../classes/pizza.class.php");
		
		$needle = $this->pizza;

		$item = $_pizzas[$needle];

		
		switch ($this->size){
	  	 case "pequeno":
	  	 	
        	$precio = $item->__get("precio_p");
        	break;		


	  	 case "mediano":
	  	 	
        	$precio = $item->__get("precio_m");
        	break;	

	  	 case "familiar":
	  	 	
        	$precio = $item->__get("precio_f");
        	break;	

		}		

		$sum  = $precio * $this->cantidad;

		if($this->ingrediente){
			
			include_once(__DIR__ . "/../datos/ingredientes.dat.php");
			$all_ingreds = $this->ingrediente;
			$add_precio = 0;
			foreach($all_ingreds as $ingred=>$doble){
				$item_2 = $_ingredientes[$ingred];

				if($doble){
					$add_precio += $item_2->__get("precio_d");
				} else{
					$add_precio +=   $item_2->__get("precio_s");
				}

			}	
			$sum+= $add_precio;
		}
		$this->precio = $sum;
	}

	function añadirOferta($_oferta){
		$precio_off = $this->precio;
		$size_off= $this->size;
		$cantidad_off = $this->cantidad;
		$visa_off = $this->visa;

		$res = $_oferta -> computarPrecio($precio_off,$size_off, $cantidad_off, $visa_off );

		$this->precio = $res;

	}	

}





/*//check
$a_1 = new compra("New York","familiar",2, false );
var_dump($a_1);

echo "done1". "<br>";
echo "done1". "<br>";
echo "done1". "<br>";
echo "done1". "<br>";
$a_1-> añadirIngrediente("Cebolla", false);
var_dump($a_1);

echo "done2". "<br>";
echo "done2". "<br>";
echo "done2". "<br>";
echo "done2". "<br>";

$a_1-> calcularPrecio();
echo "done3". "<br>";
var_dump($a_1);
echo "done3". "<br>";
echo "done3". "<br>";
echo "done3". "<br>";
echo "done3". "<br>";

include_once "../classes/ofertas.class.php";;
$oferta = new ofertaFamily();


$a_1-> añadirOferta($oferta);

var_dump($a_1);*/

?>
