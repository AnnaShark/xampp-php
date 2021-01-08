<?php
require_once 'controls/htmlrenderable.interface.php';
require_once 'controls/textbox.class.php';
require_once 'controls/validatebox.class.php';
require_once 'controls/contexto.class.php';
require_once 'controls/tabla.class.php';
require_once 'controls/boton.class.php';
require_once 'datos/entidades/producto.class.php';
require_once 'datos/entidades/compra.class.php';
require_once 'datos/datos.class.php';


$error_producto_desconocido = ""; // mensaje de error de identificador de producto desconocido
$error_comprador = ""; // mensaje de error de comprador no indicado 
$error_mail = ""; // mensaje de error de email no válido
$sumatorio = 0; // sumatorio de importe final de compra


$context = new contexto("ctx");



// Recuperacion de la matriz de compra
if ( $context->getValor() == NULL) {
// Ningun producto -> matriz vacia 
    $lista_compra = array();
} else {
// Recuperacion
        $lista_compra = $context->getValor();
}

// Declaracion de controles de formulario
$txt_comprador = new textbox("txt_comprador"); $txt_email = new textbox("txt_email");
$txt_id = new validatebox("txt_id", 5); 
$txt_cantidad = new validatebox("txt_cantidad", 2); 

$tbl_compra = new tabla("tbl_compra", $lista_compra, ["id", "producto", "categoria", "precio", "unidades", "importe"]);
$btn_add = new boton("btn_add", "AÑADIR"); 
$btn_save = new boton("btn_registrar", "REGISTRAR");


// ¿Se pulso el botón añadir?
if ( $btn_add->fuePulsado()) { //
// AGREGADO DE OBJETO PRODUCTO INDICADO A $lista_compra
    $product_toAdd = filter_input(INPUT_POST, "txt_id", FILTER_SANITIZE_SPECIAL_CHARS);
    $quantity = filter_input(INPUT_POST, "txt_cantidad", FILTER_SANITIZE_SPECIAL_CHARS);
    $json = file_get_contents("datos/productos.json");
    $matriz = json_decode($json, true);

    if(array_key_exists($product_toAdd, $matriz)) {
        $product_info = $matriz[$product_toAdd];
        $precio = $product_info["precio"];
        $importe =  $quantity*$precio;
        $product_toShow = array();
        /*array_push($product_toShow,"id"=>$product_toAdd, "producto"=>$product_info["producto"], "categoria"=> $product_info["categoria"],"precio" =>$precio,"unidades" => $quantity, "importe"=> $importe );*/
        $product_toShow["id"] = $product_toAdd;
        $product_toShow["producto"] = $product_info["producto"];
        $product_toShow["categoria"] = $product_info["categoria"];
        $product_toShow["precio"] = $precio;
        $product_toShow["unidades"] = $quantity;
        $product_toShow["importe"] = $importe;

    
        array_push($lista_compra, $product_toShow);
    }else{$error_producto_desconocido = "No existe el producto indicado"; }

}

// ¿Se pulso el botón registrar?
if ( $btn_save->fuePulsado()) { //
// CREACION DE OBJETO COMPRA Y REGISTRO.
    $comprador = filter_input(INPUT_POST, "txt_comprador", FILTER_SANITIZE_SPECIAL_CHARS);
    $mail = filter_input(INPUT_POST, "txt_email", FILTER_SANITIZE_SPECIAL_CHARS);
    if($comprador==false){
        $error_comprador = "Comprador no esta indicado";
    }
    if($mail==false){
        $error_mail = "Mail no esta indicado";
    }

    if($comprador&&$mail){
        $compra = new compra($comprador,  $mail, $lista_compra); 
        $datos = new datos();
        $datos->registrarCompra($compra);
    }    
//
}
// Guardado de la matriz de compra actualizada
$context->setValor($lista_compra);
//var_dump($lista_compra);
// Visualizacion de la matriz de compra
$tbl_compra->setValores($lista_compra);


foreach($lista_compra as $item){
    $sumatorio += $item["importe"];
}

?>

<html>
<head>
<title>PEDIDO</title>
<style type="text/css">
        table {
            width: 50%;
            border-collapse: collapse;
            text-align: center;
            }
</style>

</head>
<body>
    <form method='post'>
    <?php $context->html(); ?>
    <h1>COMPRADOR</h1>
    NOMBRE: <?php $txt_comprador->html(); echo $error_comprador; ?><br/> <br/> 
    E-MAIL: <?php $txt_email->html(); echo $error_mail; ?>

    <h1>PEDIDO</h1>
    PRODUCTO: <?php $txt_id->html(); echo $error_producto_desconocido; ?><br/><br/> 
    CANTIDAD: <?php $txt_cantidad->html(); ?><br /><br/> 
    <?php $tbl_compra->html(); 
    echo "<h2>IMPORTE FINAL: $sumatorio €</h2>"; ?> 
    <?php $btn_add->html(); ?>
    <?php $btn_save->html(); ?>
    </form>
</body>