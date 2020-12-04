
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1- transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> <meta name="author" content="SyToo" />
<title>Ejercicios</title>
</head> 
<body>


<table width="700px"> <tr><td>EJERCICIO 1</td></tr> 
<?php

$cadena = "Estoy estudiando el capítulo relativo a las Cadenas de PHP";
echo "<tr><td> La cadena: ".$cadena."</td></tr>";

$strcount = strlen($cadena);
echo "<tr><td> La cantidad de caracteres que contiene la cadena: ".$strcount."</td></tr>";

$strcountsinesp = $strcount - substr_count($cadena, ' ');
echo "<tr><td> La cantidad de caracteres que contiene la cadena sin contar espacios: ".$strcountsinesp."</td></tr>";

$strmayu = strtoupper($cadena);
echo "<tr><td> La cadena expresada en mayúsculas: ".$strmayu."</td></tr>";

echo "<tr><td> La longitud de la cadena: ".$strcount."</td></tr>";


$strlas = strstr($cadena , 'las');
echo "<tr><td> El texto existente en la cadena tras la palabra “las“: ".$strlas."</td></tr>";


$str_exp = explode(" ", $cadena );
$rel = array_search("relativo",$str_exp,true);
echo "<tr><td> La posición de la palabra “relativo“: ".$rel."</td></tr>";

$stspart = substr($cadena, 8, 16);
echo "<tr><td> La subcadena que se inicia en el carácter 8o y finaliza en el 15o: ".$stspart."</td></tr>";

$stspart2 = substr($cadena, -5);
echo "<tr><td> La subcadena con los últimos cinco caracteres: ".$stspart2."</td></tr>";


$str_rep = str_replace("capítulo", "tema", $cadena);
echo "<tr><td> La cadena con la palabra “capítulo” reemplazada por “tema”: ".$str_rep."</td></tr>";


$count_a = substr_count($cadena,"a");
echo "<tr><td> El número de “a” existentes en la cadena: ".$count_a."</td></tr>";


$words = count($str_exp);
echo "<tr><td> El número de palabras contenidas en la cadena: ".$words."</td></tr>";

echo "<tr><td> Todas las palabras comprendidas en la cadena con una “o”:</td></tr>";
foreach ($str_exp as $key => $value) {
  if(strpos($value, "o") !== false){
    echo "<tr><td>".$value."</td></tr>";
  }
}


?>
</td></tr> </table>
<br><br>

<table width="700px"> <tr><td>EJERCICIO 2</td></tr> 
<?php
function cmp($cadena1, $candena2){
	$res = strcasecmp($cadena1, $candena2);
	if($res = 1){
		return "true";
	}else{return "false";}
}

echo "<tr><td>".cmp("Anya", "anya");


?>
</td></tr> </table>
<br><br>

<table width="700px"> <tr><td>EJERCICIO 3</td></tr> 
<?php
function decimstr($numero){
	$res = "#".number_format($numero, 2, '.', '')."#";
	return $res;
}

$conv = decimstr(23434);
echo "<tr><td>".$conv;


?>
</td></tr> </table>
<br><br>

<table width="700px"> <tr><td>EJERCICIO 4</td></tr> 
<?php
echo "<tr><td>";

function relleno($cadena){

	if(strlen($cadena)<=30){
		printf("%0-30s",$cadena);

	} else{
		$res =substr($cadena,0,30);
		echo $res;
	}
}
	

relleno("fkgjhh");

//relleno("fkgjhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh");
//echo "<tr><td>".$cad2;

?>
</td></tr> </table>
<br><br>


<table width="700px"> <tr><td>EJERCICIO 5</td></tr> 
<?php
function serialcheck($serial){
	$expr_reg = "^[0-9]{5}-[0-9]{5}-[0-9]{5}-[0-9]{5}^";
	if(preg_match($expr_reg,$serial) == true)
		{return "true";}
	return "false";
}

echo "<tr><td>".serialcheck("02394-45677-37950-34503");
?>
</td></tr> </table>
<br><br>


<table width="700px"> <tr><td>EJERCICIO 6</td></tr> 
<?php

function paircheck($serial){
	$expr_reg = "^(0|2|4|6|8)(1|3|5|7|9)(0|2|4|6|8)(1|3|5|7|9)-(0|2|4|6|8)(1|3|5|7|9)(0|2|4|6|8)(1|3|5|7|9)-(0|2|4|6|8)(1|3|5|7|9)(0|2|4|6|8)(1|3|5|7|9)-(0|2|4|6|8)(1|3|5|7|9)(0|2|4|6|8)(1|3|5|7|9)^";
	if(preg_match($expr_reg,$serial) == true)
		{return "true";}
	return "false";
}
//0345-0345-0345-0345

echo "<tr><td>".paircheck("0345-0345-0345-0345");



?>
</td></tr> </table>
<br><br>

</body> </html>