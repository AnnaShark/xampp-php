
<!DOCTYPE html>
<html>
<head>
<title>Insert title here</title> </head>
<body>
<?php
session_start();

//var_dump($_SESSION);
//date_default_timezone_set('Asia/Calcutta'); - You can choose any timezone
 
//Calculate 60 days in the future
//seconds * minutes * hours * days + current time
$inTwoMonths = 60 * 60 * 24 * 60 + time();
setcookie('lastVisit', date("G:i - m/d/y"), $inTwoMonths);
if(isset($_COOKIE['lastVisit'])){
	$visit = $_COOKIE['lastVisit'];
	echo "Your last visit was: ". $visit;
}else{
 echo "You've got some stale cookies!";
}

$cuenta = $_SESSION['cuenta'];

$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo4-p29-ejercicio5-6";
$doc_root= $ruta."/data.dat";
$f = fopen($doc_root, "r");
	if ($f) {
		while ( !feof($f)) {
			$linea = rtrim(fgets($f));
			$data_line =  explode(", ", $linea);
			$i=0;
			if($data_line[0] == $cuenta){
				$nombre = $data_line[2];
				$apellido = $data_line[3];
				$saldo = $data_line[4];
				$i++;
				break;
			}
		}
				
		if ($i==0) {echo "ERROR";}				
		fclose($f);
	} else {echo "ERROR ABRIENDO FICHERO";} 

echo "<br><br>Nombre: ".$nombre."<br><br>";
echo "Apellido: ".$apellido."<br><br>";
echo "Saldo: ".$saldo."<br><br>";
$_SESSION["saldo"] = $saldo;

?>

<form action="ingreso.php" method="post">
	<input type="submit" value="INGRESO">
</form>
<br>
<form action="reintegro.php" method="post">
	<input type="submit" value="REINTEGRO">
</form>
</body>
</html>