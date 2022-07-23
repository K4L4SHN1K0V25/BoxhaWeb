<?php
// Recibimso del .js la etiqueta comand y la guardamos en la variable comando
$comando = $_POST['comand'];
// Hacemos un switch para ver si es get_data_settings o sent_data_settings
switch ($comando) {
    case "get_data_settings":
        get_data_settings();
        break;
    case "sent_data_settings":
        sent_data_settings();
        break;
}

function get_data_settings(){
    // <!-- Este archivo hace la conexion a la base de datos y mada la info. en Json -->
    //Creamos la variable "con" conexion con la base de datos
    $con = mysqli_connect('localhost','id18930570_boxhacucei','A}IPH_cU*TK6MUgE','id18930570_db_boxha') or die('Hubo un error en la conexion con el servidor');
    //Llama a las variables del login donde se recogen los datos de inicio de sesion
    session_start();
    $mc = $_SESSION["correo"];
    $mco = $_SESSION["contrasena"];
    //Creamos nuestra consulta en sql
    $sql1 = "SELECT * FROM pagina_web_clientes WHERE correo = '".$mc."' and contraseña = '".$mco."'";
    //Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
    $result = mysqli_query($con,$sql1) or die('Error en el query database');
    //Obtenemos el numero de consultas que nos arrojo nuestro resultado
    $nr = mysqli_num_rows($result);
    //Obtenemos la informacion de la consulta
    $userbs = $result->fetch_assoc();
    //Obtener datos unicos
    $id_usu = $userbs["id"];
    //Obtenemos la info del usuario 
    //Creamos nuestra consulta en sql
    $sql = "SELECT `id`, `nombre`, `correo`, `usuario`, `edad`, `fecha`, `direccion`, `postal`, `tel1`, `tel2` FROM pagina_web_clientes WHERE id = '".$id_usu."'";
    
    //Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
    $result = mysqli_query($con,$sql) or die('Error en el query database');
    //Obtenemos la informacion de la consulta
    $userbs = $result->fetch_assoc();
    
    //retornamos un JSON (JavaScript Object Notation), que es el formato que necesita javascript
    //JSON_UNESCAPED_UNICODE es para que reconozca todos los caracteres (por ejemplo la ñ)
    echo json_encode($userbs, JSON_UNESCAPED_UNICODE);
}

function sent_data_settings(){
    // <!-- Este archivo es el que envia la info modificada a la base de datos -->
    //Creamos la variable "con" conexion con la base de datos
    $con = mysqli_connect('localhost','root','','db_test') or die('Hubo un error en la conexion con el servidor');
    //Llama a las variables del login donde se recogen los datos de inicio de sesion
    session_start();
    $mc = $_SESSION["correo"];
    $mco = $_SESSION["contrasena"];
    //Creamos nuestra consulta en sql
    $sql1 = "SELECT * FROM pagina_web_clientes WHERE correo = '".$mc."' and contraseña = '".$mco."'";
    //Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
    $result = mysqli_query($con,$sql1) or die('Error en el query database');
    //Obtenemos el numero de consultas que nos arrojo nuestro resultado
    $nr = mysqli_num_rows($result);
    //Obtenemos la informacion de la consulta
    $userbs = $result->fetch_assoc();
    //Obtener datos unicos
    $id_usu = $userbs["id"];
    //Utilizando el valor Fecha de Nacimiento, calculamos la edad del usuario
    $fn = new DateTime($_POST["fecha"]);
    $hoy = new DateTime();                 //Obtenemos la fecha de hoy
    $edad = $hoy->diff($fn);               //Restamos las dos fechas y obtenemos la edad, meses y dias exactos de la persona

    //Creamos la varible sql e insertamos en los clientes TODO lo recopilado en el formulario (me duele que las variables esten en espanol)
    $sql= "UPDATE pagina_web_clientes SET nombre = '".$_POST["nombres"]."', correo = '".$_POST["correo"]."', usuario = '".$_POST["usuario"]."', edad = '$edad->y' ,fecha = '".$_POST["fecha"]."', direccion = '".$_POST["direccion"]."', postal = '".$_POST["postal"]."', tel1 = '".$_POST["telefono"]."', tel2 = '".$_POST["telefono2"]."' WHERE id = '".$id_usu."' ";
    
    //Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos"
    $result = mysqli_query($con,$sql) or die('Error en el query database');

    //Insertamos solo los datos pertinenetes a los usuarios
    $sql= "UPDATE pagina_web_usuarios SET nombre = '".$_POST["nombres"]."', correo = '".$_POST["correo"]."', 
    usuario = '".$_POST["usuario"]."'  WHERE id = '".$id_usu."'";

    echo $sql;
}
