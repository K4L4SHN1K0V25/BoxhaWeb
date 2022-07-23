<?php
    //Creamos la variable "con" conexion con la base de datos
    $con = mysqli_connect('localhost','id18930570_boxhacucei','A}IPH_cU*TK6MUgE','id18930570_db_boxha') or die('Hubo un error en la conexion con el servidor');

    //Creamos nuestras variables con la informacion del formulario 
    $corr = $_POST["correo"];
    $contra = $_POST["contra"];
    //Creacion de la variable global de sesion
    session_start();
    $_SESSION["correo"] = $corr;
    $_SESSION["contrasena"] = $contra;
    //Creamos nuestra consulta en sql
    $sql = "SELECT * FROM pagina_web_usuarios WHERE correo = '".$corr."' and contraseña = '".$contra."'";

    //Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
    $result = mysqli_query($con,$sql) or die('Error en el query database');
    //Obtenemos el numero de consultas que nos arrojo nuestro resultado
    $nr = mysqli_num_rows($result);
    //Obtenemos la informacion de la consulta
    $userbs = $result->fetch_assoc();


    //Creamos un if, si el numero es diferente de 0, significa que si encontro al usuario en la base de datos
    if($nr != 0){
        //Dependiendo de que nivel sea, sera direccionado a su main correspondiente
        if($userbs["nivel"] == 1){
            header('Location: ./doc/mains/cliente/activeOrders.php');
        }
        elseif($userbs["nivel"] == 2){
            header('Location: ./doc/mains/agente/sto.php');
        }
        elseif($userbs["nivel"] == 3){
            header('Location: ./doc/mains/administracion/userControl.html');
        }
    }
    //Si no es asi...
    else{
        //regresamos al login
        header('Location: login.html');
    }

    //Cerramos la conexion con la base de datos
    //mysqli_close($con);

?>