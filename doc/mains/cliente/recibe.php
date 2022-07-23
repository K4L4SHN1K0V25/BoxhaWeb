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

if (isset($_GET['enviar'])) {
    $num = $_GET['cantidad'];
    $pro = $_GET['txtp'];
    $pre = $_GET['txtpr'];
    $total = $num * $pre;

    if ($pro == "Harina arroz 1 kilo") {
        $queryList = mysqli_query($con, "SELECT * FROM carrito");
        while ($data = mysqli_fetch_array($queryList)) {
            if ($data["harina_ac1"] != 0 and $data["id_cliente"] == $id_usu) {
                $num += $data["harina_ac1"];
                $tot = $data["total"] + $total;
                $sqlCar = "UPDATE carrito SET harina_ac1='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
            if ($data["harina_ac1"] == 0 and $data["id_cliente"] == $id_usu) {
                $tot = $data["total"] + $total;
                $sqlCarrito = "UPDATE carrito SET harina_ac1='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCarrito = mysqli_query($con, $sqlCarrito) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
        }
    }
    if ($pro == "Harina arroz 3 kilo") {
        $queryList = mysqli_query($con, "SELECT * FROM carrito");
        while ($data = mysqli_fetch_array($queryList)) {
            if ($data["harina_ac3"] != 0 and $data["id_cliente"] == $id_usu) {
                $num += $data["harina_ac3"];
                $tot = $data["total"] + $total;
                $sqlCar = "UPDATE carrito SET harina_ac3='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
            if ($data["harina_ac3"] == 0 and $data["id_cliente"] == $id_usu) {
                $tot = $data["total"] + $total;
                $sqlCarrito = "UPDATE carrito SET harina_ac3='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCarrito = mysqli_query($con, $sqlCarrito) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
        }
    }
    if ($pro == "Harina arroz 5 kilo") {
        $queryList = mysqli_query($con, "SELECT * FROM carrito");
        while ($data = mysqli_fetch_array($queryList)) {
            if ($data["harina_ac5"] != 0 and $data["id_cliente"] == $id_usu) {
                $num += $data["harina_ac5"];
                $tot = $data["total"] + $total;
                $sqlCar = "UPDATE carrito SET harina_ac5='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
            if ($data["harina_ac5"] == 0 and $data["id_cliente"] == $id_usu) {
                $tot = $data["total"] + $total;
                $sqlCarrito = "UPDATE carrito SET harina_ac5='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCarrito = mysqli_query($con, $sqlCarrito) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
        }
    }
    if ($pro == "Harina quinoa 1 kilo") {
        $queryList = mysqli_query($con, "SELECT * FROM carrito");
        while ($data = mysqli_fetch_array($queryList)) {
            if ($data["harina_qc1"] != 0 and $data["id_cliente"] == $id_usu) {
                $num += $data["harina_aqc1"];
                $tot = $data["total"] + $total;
                $sqlCar = "UPDATE carrito SET harina_qc1='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
            if ($data["harina_qc1"] == 0 and $data["id_cliente"] == $id_usu) {
                $tot = $data["total"] + $total;
                $sqlCarrito = "UPDATE carrito SET harina_qc1='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCarrito = mysqli_query($con, $sqlCarrito) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
        }
    }
    if ($pro == "Harina quinoa 3 kilo") {
        $queryList = mysqli_query($con, "SELECT * FROM carrito");
        while ($data = mysqli_fetch_array($queryList)) {
            if ($data["harina_qc3"] != 0 and $data["id_cliente"] == $id_usu) {
                $num += $data["harina_aqc3"];
                $tot = $data["total"] + $total;
                $sqlCar = "UPDATE carrito SET harina_qc3='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
            if ($data["harina_qc3"] == 0 and $data["id_cliente"] == $id_usu) {
                $tot = $data["total"] + $total;
                $sqlCarrito = "UPDATE carrito SET harina_qc3='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCarrito = mysqli_query($con, $sqlCarrito) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
        }
    }
    if ($pro == "Harina quinoa 5 kilo") {
        $queryList = mysqli_query($con, "SELECT * FROM carrito");
        while ($data = mysqli_fetch_array($queryList)) {
            if ($data["harina_qc5"] != 0 and $data["id_cliente"] == $id_usu) {
                $num += $data["harina_aqc5"];
                $tot = $data["total"] + $total;
                $sqlCar = "UPDATE carrito SET harina_qc5='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCar = mysqli_query($con, $sqlCar) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
            if ($data["harina_qc5"] == 0 and $data["id_cliente"] == $id_usu) {
                $tot = $data["total"] + $total;
                $sqlCarrito = "UPDATE carrito SET harina_qc5='" . $num . "', total='" . $tot . "' WHERE id_cliente='" . $id_usu . "'";
                $resultCarrito = mysqli_query($con, $sqlCarrito) or die('Error en el query database');
                header('Location: ./makeOrder.php');
            }
        }
    }
}
