<!DOCTYPE html>
<html>
<head>
<title>Insert title here</title> </head>
<body>

<?php


	if ( count($_POST) > 0 ){
		$user= filter_input(INPUT_POST, "user");
		$pass= filter_input(INPUT_POST, "pass");

		if($user == "alumno" && $pass== "cipsa"){
			$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo4-p29-ejercicio3-4";
			$doc_root= $ruta."/vot.dat";

			$f = fopen($doc_root, "r"); 
			$count_1 = 0;
			$count_2 = 0;
			$count_3 = 0;
			if ($f) {
				while ( !feof($f)) {
					$linea = rtrim(fgets($f));
					$post =  explode(",", $linea);
					switch (@$post[4]){
						case "Candidato1": $count_1++; break;
						case "Candidato2": $count_2++; break;
						case "Candidato3": $count_3++; break;
					}
				}
				$suma = $count_1 + $count_2 + $count_3;
				$cand_1_vote = round($count_1/$suma*100);
				$cand_2_vote = round($count_2/$suma*100);
				$cand_3_vote = round($count_3/$suma*100);
				echo "<h2>Resultados</h2>";
				echo "<table style='text-align:center'>";
				echo "<tr><td>Candidato1</td><td>".$cand_1_vote."%</td></tr>";
				echo "<tr><td>Candidato2</td><td>".$cand_2_vote."%</td></tr>";
				echo "<tr><td>Candidato3</td><td>".$cand_3_vote."%</td></tr>";
				echo "</table><br><br><br>";

			}	

		}
			//header("Refresh:0");
			fclose($f);
		}




?>

<form action="show_res.php" method="post">
	<label for="user">USUARIO</label>
	<input type="text" name="user"><br /> 
	<br /> 
	<label for="password">CONTRASENA</label>
	<input type="text" name="pass"><br />
	<br /> 
	<input type="submit" value="ENVIAR">
	<br /> 
</form>
</body>
</html>