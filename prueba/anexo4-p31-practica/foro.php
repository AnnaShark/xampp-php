<!DOCTYPE html>
<html>
<head>
<title>Insert title here</title> </head>
<body>

<?php
	$doc_root_names = "perfiles/usuarios.dat";
	$n = fopen($doc_root_names, "r"); 
	if ($n) { 
		$names = array();
		while ( !feof($n)) {
			$linea = rtrim(fgets($n));
			$credentials =  explode(",", $linea);
			if(strlen($credentials[0])>0){ array_push($names,$credentials[0]);}
		}
	}

	$doc_root= "foro/mensajes.dat";

	$f = fopen($doc_root, "r"); 

	if ($f) {
		echo "<table style='text-align:center'>";
		while ( !feof($f)) {
			$linea = rtrim(fgets($f));
			//echo $linea;
			$post =  explode("/n", $linea);
			//echo "post: ";
			//var_dump($post);
			//echo "<br>";

				foreach($post as $cell){
						if (array_search($cell, $names)!== false ){
							$author = array_search($cell, $names);
							echo "<tr><td>";
							echo "<img src='perfiles/$names[$author].jpg' width='100' height='100'>";
							echo "</td>";
							echo "<td>".$cell."<br></td>";
						} else{echo "<td>".$cell."<br></td></tr>";}
						
						
				}

			echo "</table>";
		}
		fclose($f);
	}	





?>

</body>
</html>