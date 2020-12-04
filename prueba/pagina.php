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


<table width="300px"> <tr><td>EJERCICIO 1</td></tr> <tr><td>
<?php
echo( FechaActual());
?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 2</td></tr> <tr><td>
<?php
$valor1 = "Hola!";
println($valor1);
?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 3</td></tr> <tr><td>
<?php
$max = 100;
$min = 10;
echo aleatorio($max,$min);
?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 4</td></tr> <tr><td>
<?php
echo dia();
echo "<br>";
echo mes();
?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 5</td></tr> <tr><td>
<?php
$num1 = 5;
$num2 = 4;
$oper = "cociente";
echo operaciones($num1,$num2,$oper);
?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 6</td></tr> <tr><td>
<?php
$val1 = 4;
$val2 = 3;
$val3 = 5;

echo sumatorio($val1)."<br>" ; 
echo sumatorio($val2)."<br>" ;
echo sumatorio($val3)."<br>" ;
?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 7</td></tr> <tr><td>
<?php
$mul1 = 4;
$mul2 = 5;
echo "iterativo <br>";
echo producto_iterativo($mul1,$mul2)."<br>" ;
echo producto_iterativo($mul1,$mul2)."<br>" ;
echo producto_iterativo($mul1,$mul2)."<br>" ;

echo "recursivo <br>";
echo producto_recursivo($mul1,$mul2)."<br>" ;
echo producto_recursivo($mul1,$mul2)."<br>" ;
echo producto_recursivo($mul1,$mul2)."<br>" ;

?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 8</td></tr> <tr><td>
<?php
$validar1 = 100;
$validar2 = 20.2;
$validar3 = 20;
echo validarEdad($validar1)."<br>";
echo validarEdad($validar2)."<br>";
echo validarEdad($validar3)."<br>";
?>
</td></tr> </table>
<br><br>


<table width="300px"> <tr><td>EJERCICIO 9</td></tr> <tr><td>
<?php
$med1 = 2;
$med2 = 4;
$med3 = 8;
$med4 = 9;

echo media($med1, $med2, $med3, $med4);
?>
</td></tr> </table>
<br><br>



<table width="300px"> <tr><td>EJERCICIO 10</td></tr> <tr><td>
<?php
$hora = 4;
$minuto = 59;

tiempo($hora, $minuto);
?>
</td></tr> </table>
<br><br>

</body> </html>