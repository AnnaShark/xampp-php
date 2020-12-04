
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
</head>
<body>
	<div>
		<h1> Ejercicio 1 </h1>
		<?php
			for ( $i = 0; $i < 10; $i++)
        	{
            	echo $i." HOLA MUNDO";
        	}
		?>
    </div>

	<div>
		<h1> Ejercicio 2 </h1>
		<h2> Estructura repetitiva determinada</h2>
		
		<?php
			$suma = 0;
			for ( $i = 1; $i < 101; $i++)
        	{
            	$suma += $i; 
            	
        	}
        	echo " La suma de los primeros 100 números naturales es: ".$suma;
		?>

		<h2> Estructura repetitiva indeterminada 0-n</h2>
		
		<?php
			$i = 1;
			$suma = 0;
			while($i < 101){
				$suma += $i;
				$i++;
			}
        	echo " La suma de los primeros 100 números naturales es: ".$suma;
		?>
		
		<h2> Estructura repetitiva indeterminada 1-n</h2>
		
		<?php
			$i = 1;
			$suma = 0;
			do{
				$suma += $i;
				$i++;
			} while($i < 101);
        	echo " La suma de los primeros 100 números naturales es: ".$suma;
		?>
    </div> 

 	<div>
		<h1> Ejercicio 3 </h1>
		<?php
			$cols = 10;
			$rows = 10;
			echo "<table border=\"1\">";

			for ($r =1; $r < $rows; $r++){

    			echo('<tr>');

    			for ($c = 1; $c < $cols; $c++)
        			echo( '<td>' .$c*$r.'</td>');

    			echo('</tr>');

			}

			echo("</table>");
		?>
    </div>
	
	<div>
		<h1> Ejercicio 5 </h1>
		<?php
			for($i=1;$i<=19;$i+=2)
			{
			echo  str_repeat('*',$i);
			echo "<br />";
}
		?>
    </div>

	<div>
		<h1> Ejercicio 4 </h1>
		
		<?php
			echo "<table border=\"1\">";
			echo('<tr>');
			for ( $i = 0; $i < 101; $i+=10)
        	{	
            	if ($i<=20){
            		echo "<td style='background-color:blue'>".$i."C"."</tr>";
            	} elseif ($i>20&&$i<=60){
            		echo "<td style='background-color:green'>".$i."C"."</tr>";
            	} elseif ($i>60&&$i<=80){
            		echo "<td style='background-color:yellow'>".$i."C"."</tr>";
            	} elseif ($i>80&&$i<=90){
            		echo "<td style='background-color:orange'>".$i."C"."</tr>";
            	} else{
            		echo "<td style='background-color:red'>".$i."C"."</tr>";
            	}
            	
        	}
        	echo('</tr>');
		?>
    </div>    


	 
</body>
</html>