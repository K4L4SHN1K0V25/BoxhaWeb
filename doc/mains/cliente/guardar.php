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
$direccion = $userbs["direccion"];
$id_usu = $userbs["id"];

//Creamos nuestra consulta en sql
$sql2 = "SELECT * FROM carrito WHERE id_cliente = '" . $id_usu . "'";
//Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
$result2 = mysqli_query($con, $sql2) or die('Error en el query database');
//Obtenemos la informacion de la consulta
$userbs2 = $result2->fetch_assoc();
//Obtener datos unicos
$hac1 = $userbs2["harina_ac1"];
$hac3 = $userbs2["harina_ac3"];
$hac5 = $userbs2["harina_ac5"];
$hqc1 = $userbs2["harina_qc1"];
$hqc3 = $userbs2["harina_qc3"];
$hqc5 = $userbs2["harina_qc5"];
$tot = $userbs2["total"];

//RESTA DE INVENTARIO
$queryList = mysqli_query($con, "SELECT * FROM in_vent");
while ($data = mysqli_fetch_array($queryList)) {
    if ($data["producto"] == "Harina arroz 1") {
        $res = $data["cantidad"] - $hac1;
        if ($res <= 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='0' WHERE id='1'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
        if ($res > 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='".$res."' WHERE id='1'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
    }
    if ($data["producto"] == "Harina arroz 3") {
        $res = $data["cantidad"] - $hac3;
        if ($res <= 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='0' WHERE id='2'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
        if ($res > 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='".$res."' WHERE id='2'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
    }
    if ($data["producto"] == "Harina arroz 5") {
        $res = $data["cantidad"] - $hac5;
        if ($res <= 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='0' WHERE id='3'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
        if ($res > 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='".$res."' WHERE id='3'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
    }
    if ($data["producto"] == "Harina quinoa 1") {
        $res = $data["cantidad"] - $hqc1;
        if ($res <= 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='0' WHERE id='4'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
        if ($res > 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='".$res."' WHERE id='4'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
    }
    if ($data["producto"] == "Harina quinoa 3") {
        $res = $data["cantidad"] - $hqc3;
        if ($res <= 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='0' WHERE id='5'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
        if ($res > 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='".$res."' WHERE id='5'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
    }
    if ($data["producto"] == "Harina quinoa 5") {
        $res = $data["cantidad"] - $hqc5;
        if ($res <= 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='0' WHERE id='6'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
        if ($res > 0) {
            $sqlCar = "UPDATE in_vent SET cantidad='".$res."' WHERE id='6'";
            $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
        }
    }
}

//CREACION DE ORDEN
date_default_timezone_set("America/Mexico_City");
$fech = date("Y-m-d");
$orden = "INSERT INTO ordenes_new (id_cliente, harina_ac1, harina_ac3, harina_ac5, harina_qc1, harina_qc3, harina_qc5, total, fecha, direccion, estado) VALUES ('".$id_usu."','".$hac1."','".$hac3."','".$hac5."','".$hqc1."','".$hqc3."','".$hqc5."','".$tot."','".$fech."','".$direccion."','EN ALMACEN')";
$resultOrd = mysqli_query($con, $orden) or die('Error en el query database');
$sqlCar = "UPDATE carrito SET harina_ac1='0', harina_ac3='0', harina_ac5='0', harina_qc1='0', harina_qc3='0', harina_qc5='0',  total='0' WHERE id_cliente='" . $id_usu . "'";
$resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
echo "<script>
    alert('Pedido solicitado con exito');
    window.location= './activeOrders.php'
    </script>";
