<?php
//Creamos la variable "con" conexion con la base de datos
$con = mysqli_connect('localhost','id18930570_boxhacucei','A}IPH_cU*TK6MUgE','id18930570_db_boxha') or die('Hubo un error en la conexion con el servidor');

//Llama a las variables del login donde se recogen los datos de inicio de sesion
session_start();
$mc = $_SESSION["correo"];
$mco = $_SESSION["contrasena"];

//Creamos nuestra consulta en sql
$sql1 = "SELECT * FROM pagina_web_clientes WHERE correo = '" . $mc . "' and contraseña = '" . $mco . "'";
//Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
$result = mysqli_query($con, $sql1) or die('Error en el query database');
//Obtenemos el numero de consultas que nos arrojo nuestro resultado
$nr = mysqli_num_rows($result);
//Obtenemos la informacion de la consulta
$userbs = $result->fetch_assoc();
//Obtener datos unicos
$usuario = $userbs["usuario"];
$id_usu = $userbs["id"];

$sqlCar = "UPDATE carrito SET harina_ac1='0', harina_ac3='0', harina_ac5='0', harina_qc1='0', harina_qc3='0', harina_qc5='0',  total='0' WHERE id_cliente='" . $id_usu . "'";
$resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
echo "<script>
    alert('Carrito Vacio');
    window.location= './makeOrder.php'
    </script>";
//header('Location: ./makeOrder.php');
