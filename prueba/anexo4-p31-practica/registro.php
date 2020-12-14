<!DOCTYPE html>
<html>
<head>
<title>Insert title here</title> </head>
<body>
<form action="registro.php" method="post" enctype="multipart/form-data">
	<label for="user">NOMBRE</label>
	<input type="text" name="user"><br /> 
	<br /> 
	<label for="pass1">CONTRASENA</label>
	<input type="text" name="pass1"><br />
	<br /> 
	<label for="pass2"> REPITE TU CONTRASENA</label>
	<input type="text" name="pass2"><br />
	<br /> 
	<label for="fileToUpload"> SUBE TU AVATAR</label>
	<input type="file" name="fileToUpload" id="fileToUpload">
	<br /> <br /> 
	<input type="submit" value="REGISTRARME">
</form>

<?php

if ( count($_POST) > 0 ) {
	$error=0;
			// Obtención de los datos introducidos en el formulario
	$name = filter_input(INPUT_POST, "user");
	$pass1= filter_input(INPUT_POST, "pass1");
	$pass2= filter_input(INPUT_POST, "pass2");

	if(strlen($name)==0){
		$error++;
		echo "Error: name required";
	}

	if (strpos($name, ',') !== false or strpos($pass1, ',') !== false){ 
		$error++;
    	echo 'no commas in the name or password';
	}

	if(strlen($pass1)==0){
		$error++;
		echo "Error: password required";
	}

	if($pass1!= $pass2){
		$error++;
		echo "Error: passwords should be the same";
	}

   if(isset($_FILES['fileToUpload'])){
      $file_name = $_FILES['fileToUpload']['name'];
      $file_size =$_FILES['fileToUpload']['size'];
      $file_tmp =$_FILES['fileToUpload']['tmp_name'];
      $file_type=$_FILES['fileToUpload']['type'];
      @$file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
      
      $extensions= array("jpg");
      
      if(in_array($file_ext,$extensions)=== false){
      	$error++;
         echo "extension not allowed, please choose a JPG file.";
      }
      
      if($file_size > 512000){
      	$error++;
        echo 'File size must be no more than 500 KB';
      }
      
      if($error==0){
         move_uploaded_file($file_tmp,"perfiles/".$name.".jpg");
         //$ruta = $_SERVER['DOCUMENT_ROOT']."/prueba/anexo4-p31-practica";
		$doc_root= "perfiles/usuarios.dat";
		$f = fopen($doc_root, "a"); 
		if ($f) {
			fwrite($f,$name.",".$pass1."\n");
			}		
		fclose($f);
      }
   }

	// Check if image file is a actual image or fake image

  }


?>

</body>
</html>