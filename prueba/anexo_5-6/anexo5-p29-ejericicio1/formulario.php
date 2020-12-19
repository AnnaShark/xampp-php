
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta charset="utf-8" />
    <style type="text/css">

   	#descuento .yellow {
	    background-color:#FFCC00;
	    color:#333;
	}

	#descuento .blue {
		background-color:#00BFFF;
		color:#333;
	}

	#descuento .green {
    background-color:#A3D900;
    color:#333;
	}

	#size label {
    float:left;
    width:170px;
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;

	}	

	#descuento label {
    float:left;
    width:170px;
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;

	}	


    	form{
    		border-style: dotted;
    		padding: 5px;
    	}

    	td{
    		border-style: solid;
    	}
    </style>
</head>
<body>
		
		Pedido
		<form action="compra.php" method="post">

				
				
			<?php
					echo "<label for='pizza'>Choose a pizza:</label>";

					echo '<select id="pizza" name="pizza">';
					include_once "datos/pizzas.dat.php";
					
					foreach($_pizzas as $pizza=>$value){
						echo "<option value ='$pizza'>$pizza</option>";
					}
					echo "</select>";


			?>

			<br>
			<br>

			<div id="size">
			    <label><input type="radio" name="size" value ="pequeno" required><span>pequeno</span></label>
			    <label><input type="radio" name="size" value ="mediano" required><span>mediano</span></label>
			    <label><input type="radio" name="size" value ="familiar"required><span>familiar</span></label>
			</div>

			<br>
			<br>

				<label for="quantity">Cantidad</label>
  				<input type="number" id="quantity" name="quantity" min="1" max="9" required>

			<br>
			<br>  		
			<?php
					echo "<label for='ingreds'>Choose ingredients:</label>";
					echo "<br> ";
					include_once "datos/ingredientes.dat.php";
					
					$i = 0;
					foreach($_ingredientes as $ingred=>$value){

						echo "<input type='checkbox' name=ingred[$i][name] value=$ingred>";
						echo $ingred;
						echo "<label><input type='radio' value='false' name='ingred[$i][size]'>simple</label>";
						echo "<label><input type='radio' value='true' name='ingred[$i][size]'>doble</label>";
						echo "<br>";
						$i++;
						
					}
			?>


			<br>
			<br> 


			Tarjeta Visa
			<input type="checkbox" name="visa" value="true"/>

			<br>
			<br> 

			<div id="descuento">
			    <label class="blue"><input type="radio" name="discount" value ="weekend" ><span>weekend</span></label>
			    <label class="green"><input type="radio" name="discount" value ="family"> <span>family</span></label>
			    <label class="yellow"><input type="radio" name="discount" value ="friends"><span>friends</span></label>
			</div>

			<br>
			<br> 


			<br /><input id="Submit1" title="Enviar" type="submit" value="Pedir" />


		</form>  


	 
</body>
</html>