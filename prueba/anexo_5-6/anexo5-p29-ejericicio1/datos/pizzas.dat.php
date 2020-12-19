
<?php


//include_once "../classes/pizza.class.php";
include_once(__DIR__ . "/../classes/pizza.class.php");

$napolitana = new pizza("Napolitana",4.00,4.50, 5.20 );
$newYork = new pizza("New York",4.20,4.80, 5.50 );
$pizzaATaglio = new pizza("Pizza a Taglio",5.20,5.80, 6.50 );
$argentina = new pizza("Argentina",6.00,6.80, 7.20 );
$chicago = new pizza("Chicago",4.20,4.50, 5.00 );
$sfincione = new pizza("Sfincione",5.80,6.20, 6.50 );

$_pizzas = array("Napolitana"=>$napolitana, "New York"=>$newYork, "Pizza a Taglio"=>$pizzaATaglio, "Argentina"=>$argentina, "Chicago"=>$chicago,"Sfincione" => $sfincione);
//var_dump($_pizzas);


?>
