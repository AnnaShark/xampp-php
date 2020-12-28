<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
    <style type="text/css">
    	table {
    		width: 50%;
    		border-collapse: collapse;
    		text-align: center;
    		}
    </style>
</head>
<body>
		




<?php


require_once 'controls/htmlrenderable.interface.php';
require_once 'controls/tabla.class.php';
require_once 'datos/entidades/producto.class.php';
$productos[] = new producto(1023, "producto_1", "categoria_A", 100.40);
$productos[] = new producto(3045, "producto_2", "categoria_A", 220.50);
$productos[] = new producto(5905, "producto_3", "categoria_A", 195.45);
// Parámetros
// 1.- ID de la tabla
// 2.- Matriz de nombres de columnas coincidente con atributos de la clase producto 
// 3.- Matriz de objetos producto a representar

$tbl = new tabla("tbl",  $productos, ["id", "producto", "categoria", "precio"]); 
$tbl->html();


?>

</body>
</html>