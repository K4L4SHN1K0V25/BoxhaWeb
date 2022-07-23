<?php
// Recibimso del .js la etiqueta comand y la guardamos en la variable comando
$comando = $_POST['comand'];
// Hacemos un switch para ver si es get_data_settings o sent_data_settings
switch ($comando) {
    case "get_data_settings":
        get_data_settings();
        break;
}

function get_data_settings(){
    // <!-- Este archivo hace la conexion a la base de datos y mada la info. en Json -->
    //Creamos la variable "con" conexion con la base de datos
    $con = mysqli_connect('localhost','id18930570_boxhacucei','A}IPH_cU*TK6MUgE','id18930570_db_boxha') or die('Hubo un error en la conexion con el servidor');
    
    //Obtenemos la info del usuario 
    //Obtenemos el id, del usuario que en el momento este logiado
    $id = 2;
    //Creamos nuestra consulta en sql
    // $sql = "SELECT * FROM `ordenes` WHERE id_cliente = '".$id."'";
    $sql = "SELECT * FROM `in_vent`";

    //Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
    $result = mysqli_query($con,$sql) or die('Error en el query database');
    //Obtenemos la informacion de la consulta
    // $userbs = $result->fetch_assoc();
    $userbs = [];
    while ($row = $result->fetch_assoc()) {
        array_push($userbs, $row);
    }
    
    //retornamos un JSON (JavaScript Object Notation), que es el formato que necesita javascript
    //JSON_UNESCAPED_UNICODE es para que reconozca todos los caracteres (por ejemplo la ñ)
    echo json_encode($userbs, JSON_UNESCAPED_UNICODE);
}

?>