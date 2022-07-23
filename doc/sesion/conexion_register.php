<?php
    //Creamos la variable "con" conexion con la base de datos
    $con = mysqli_connect('localhost','root','','db_test') or die('Hubo un error en la conexion con el servidor');
	
    $nom = $_POST["nombres"];
    $corr = $_POST["correo"];
    $usu = $_POST["usuario"];
    $contr = $_POST["contra"];
    $fe = $_POST["fecha"];
    $dir = $_POST["direccion"];
    $pos = $_POST["postal"];
    $tel1 = $_POST["telefono"];
    $tel2 = $_POST["telefono2"];
    //Utilizando el valor Fecha de Nacimiento, calculamos la edad del usuario
    $fn = new DateTime($_POST["fecha"]);
    $hoy = new DateTime();                 //Obtenemos la fecha de hoy
    $edad = $hoy->diff($fn);               //Restamos las dos fechas y obtenemos la edad, meses y dias exactos de la persona

    //Creamos la varible sql e insertamos en los clientes TODO lo recopilado en el formulario (me duele que las variables esten en espanol)
    $sql1 = "INSERT INTO pagina_web_clientes
    VALUES('null', '".$nom."', '".$corr."', '".$usu."', '".$contr."', '1', '".$edad->y."', '".$fe."', '".$dir."', '".$pos."', '".$tel1."', '".$tel2."')";
		
	// Obtenemos datos de la columna de correo
	$sql2="SELECT * from pagina_web_clientes where correo='".$_POST["correo"]."'";
  
    //Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
    $result = mysqli_query($con,$sql1) or die('Error en el query database');
	
	
	//validamos que no se repitan
	if(mysqli_num_rows($result)==0){
		
    //Insertamos solo los datos pertinenetes a los usuarios
    $sql3="INSERT INTO pagina_web_usuarios
    VALUES('null', '".$_POST["nombres"]."', '".$_POST["correo"]."', '".$_POST["contra"]."', '".$_POST["usuario"]."', '1')";
    
    //Agregamos a la tabla Usuarios los datos necesarios
    $result=mysqli_query($con,$sql3) or die('Error en el query database');

    header('Location: ./doc/sesion/login.html');
	}else{
          echo '<script>alert("Ese correo o usuario ya están registrados")
		  window.location.href="javascript: history.go(-1)";
		  </script>';
        
	}
    
    //Cerramos la conexion con la base de datos
    //mysqli_close($con);
?>