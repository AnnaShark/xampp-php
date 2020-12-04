<?php
$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/includes";
set_include_path(PATH_SEPARATOR.$ruta);
require_once "funlib.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1- transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> <meta name="author" content="SyToo" />
<title>Ejercicios</title>
</head> 
<body>


<table width="300px"> <tr><td>EJERCICIO 1</td></tr> 
<?php
$matrix1 = array(1,2,3,4,5,6,7);
foreach( $matrix1 as $clave => $valor) {
	echo " <tr><td> posición: $clave </td>";
	echo " <td> valor: $valor </td></tr>";
}
?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 2</td></tr> 
<?php
$matrix2 = array('Andres' => "Diaz", "Anna" => "Shark", "Pedro" => "Lopez");
foreach( $matrix2 as $clave => $valor) {
	echo " <tr><td>$clave </td>";
	echo " <td>$valor </td></tr>";
}
?>
</td></tr> </table>
<br><br>



<table width="300px"> <tr><td>EJERCICIO 3</td></tr> 
<?php
function maximo( $resultado, $valor) {
// Se asigna el valor actual si es mayor que el recibido
	$resultado = ($valor > $resultado ) ? $valor : $resultado; 
	return $resultado;
}
// Devuelve el máximo de todos los valores contenidos
$resultado = array_reduce($matrix1, "maximo", $matrix1[0]);

echo "<tr><td> Maximum es $resultado";

function minimo( $resultado, $valor) {
// Se asigna el valor actual si es mayor que el recibido
	$resultado = ($valor < $resultado ) ? $valor : $resultado; 
	return $resultado;
}
// Devuelve el máximo de todos los valores contenidos
$resultado = array_reduce($matrix1, "minimo", $matrix1[0]);

echo "<tr><td> Minimum es $resultado";

function suma( $resultado, $valor) {
// Se asigna el valor actual si es mayor que el recibido
	$resultado += $valor;
	return $resultado;
}
// Devuelve el máximo de todos los valores contenidos
$resultado = array_reduce($matrix1, "suma", 0);
$media = $resultado/count($matrix1);

echo "<tr><td> Media es $media";


?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 4</td></tr> 
<?php
function color($color){
	$matrix3 = array('Azul' => "#0000FF", "Rojo" => "#FF0000", "Magenta" => "#FF00FF", "Verde" => "#00FF00", "Cyan" => "#00FFFF", "Amarillo" => "#FFFF00","Blanco" => "#FFFFFF" );
	return $matrix3[$color];
}

echo "<tr><td>".color("Rojo");
?>
</td></tr> </table>
<br><br>    


<table width="300px"> <tr><td>EJERCICIO 5</td></tr> 
<?php
	$cols = 10;
	$rows = 10;
	$matrix4 = array();

	for ($r =1; $r <= $rows; $r++){
    	for ($c = 1; $c <= $cols; $c++)
        	$matrix4[$r][$c] = $c*$r;
			}

	
	function muestra ($matrix){
		echo "<table border=\"1\">";
		for ($i =1; $i <= count($matrix); $i++){
			echo('<tr>');
			for ($j = 1; $j <= count($matrix); $j++)
        		echo( '<td>' .$matrix[$i][$j].'</td>');
        	
		}
		echo("</table>");}

	
	muestra($matrix4);

?>
</td></tr> </table>
<br><br>  

<table width="300px"> <tr><td>EJERCICIO 6</td></tr> 
<?php
$lista1 = array("a","b","c","d","e");
$lista2 = array("v","w","x","y","z");

echo "<td> Combina en el array lista1 los valores que éste contiene junto con los del array lista2 </td>";
$resultado1 = array_merge($lista1, $lista2); 

foreach( $resultado1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}

echo "<br><br>";

echo " <td> Agrega al array lista1 el elemento ‘6’ por la derecha y el elemento ‘1’ por la izquierda</td>";
array_unshift($lista1, "1");
array_push($lista1, "6");
foreach( $lista1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}

echo "<td> Elimina del array lista1 los elementos insertados en el apartado anterior</td>";
unset($lista1[0],$lista1[6]);
foreach( $lista1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}

echo "<td> Añade al final del array lista1 los elementos: ‘7’,’8’,’9’</td>";
array_push($lista1, "7", "8","9");
foreach( $lista1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}


echo "<td> Elimina el último elemento del array lista1 y muestra tanto el valor extraído como el array resultante.</td></tr>";

$valor = array_pop($lista1);
echo "<td> Valor extraido es $valor</td>";
foreach( $lista1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}

echo "<td> Elimina el primer elemento del array lista1 y muestra tanto el valor extraído como el array resultante.</td></tr>";

$valor = array_shift($lista1);
echo "<td> Valor extraido es $valor</td>";
foreach( $lista1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}

echo "<td> Muestra el array lista1 en orden inverso</td></tr>";
$lista1 = array_reverse($lista1);
foreach( $lista1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}

echo "<td> Muestra el array lista1 ordenado de menor a mayor, y de mayor a menor</td></tr>";
sort($lista1); 
foreach( $lista1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}

rsort($lista1); 
foreach( $lista1 as $clave => $valor) {
	echo " <tr><td> $clave </td>";
	echo " <td> $valor </td></tr>";
}

echo "<td> Indica si el elemento ‘e’ se encuentra contenido en el array “lista1”, y la posición que ocupa.</td></tr>";
 
$hay = in_array("e",$lista1);
$pos = array_search("e",$lista1);

if($hay == true){
	echo "<td>elemento e se encuentra y tiene posicion $pos </td></tr>";
}else{
	echo "<td>elemento e no se encuentra</td></tr>";
}

?>
</td></tr> </table>
<br><br>


</body> </html>