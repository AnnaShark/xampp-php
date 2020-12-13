<!DOCTYPE html>
<html>
<head>
<title>Insert title here</title> </head>
<body>

<?php
	session_start();
	$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo4-p29-ejercicio1-2";
	$doc_root= $ruta."/foro.dat";

	$f = fopen($doc_root, "r+"); 

	if ($f) {
		echo "<table style='text-align:center'>";
		while ( !feof($f)) {
			$linea = rtrim(fgets($f));
			$post =  explode(";", $linea);
			echo "<tr>";
			foreach($post as $cell){
					echo "<td>".$cell."</td>";
			}
			echo "</tr>";
		}
		fclose($f);
	}	

	if ( count($_POST) > 0 ){
		$post= filter_input(INPUT_POST, "post");
		if(strlen($post) > 0)	{

			$f = fopen($doc_root, "a"); 

			if ($f) {
				fwrite($f,$_SESSION['user'].";<img src='shark.png' width='100' height='100'>;".$post.";".date("Y-m-d h:i:sa")."\r\n");
			}
			header("Refresh:0");
			fclose($f);
		}
	}



?>

<form action="foro_UI.php" method="post">
	<label for="post">MENSAJE</label>
	<br /> <br /> 
	<input type="text" name="post"><br />
	<br /> 
	<input type="submit" value="ENVIAR">
</form>
</body>
</html>