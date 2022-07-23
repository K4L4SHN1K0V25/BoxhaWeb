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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/701150858a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/normalize.css">
    <link rel="stylesheet" href="./style/orderManagement.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Este es que manda la peticion al js y el js, conecta con get_data_config -->
    <!--<script type="text/javascript" src="./conexion_htmltoPHP_storage.js"></script>-->
    <title>Bodega</title>
</head>

<body>
    <!--Encabezado-->
    <header>
        <div class="div-conteiner">
            <img class="logo" src="./style/img/boxha_logo.png" alt="">
            <div>
                <a class="div-userName" href="./reportControl.html">Bienvenido</a>
                <a class="div-exit" href="./index.html">Salir</a>
            </div>
        </div>
        <nav class="nav-conteiner">
            <a href="./sto.php">
                <div class="icons"><i class="fa fa-cubes" aria-hidden="true"></i>
                    <p>Bodega</p>
                </div>
            </a>
            <a href="./orderMan.php">
                <div class="icons"><i class="fa fa-archive" aria-hidden="true"></i>
                    <p>Manejo de pedidos</p>
                </div>
            </a>
            <a href="./customerService.html">
                <div class="icons"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <p>Soporte Tecnico</p>
                </div>
            </a>
            <a href="./reportControl.html">
                <div class="icons"><i class="fa fa-window-restore" aria-hidden="true"></i>
                    <p>Creacion de reportes</p>
                </div>
            </a>
        </nav>
    </header>
    <!--Cuerpo-->
    <main>
        <!-- En le js se van a iterar los prodcutos y los agregara depsues de la clase titulos -->
        <div class="storage-grid-conteiner">
            <div class="titulos">
                <h4>BODEGA</h4>
            </div>
            <div class="pedidos">
                <div>
                    <table>
                        <tr>
                            <th>Producto</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Fecha de caducidad</th>
                            <th>Unidades Restantes</th>
                        </tr>
                        <!--CONSULTA DE DATOS-->
                        <?php
                        $queryList = mysqli_query($con, "SELECT * FROM in_vent");
                        $resList = mysqli_num_rows($queryList);
                        if ($resList > 0) {
                            while ($data = mysqli_fetch_array($queryList)) {
                        ?>
                                <tr>
                                    <div class="botones">
                                        <td align="center"><?php echo $data["producto"] ?></td>
                                        <td align="center"><?php echo $data["descripcion"] ?></td>
                                        <td align="center"><?php echo $data["precio"] ?></td>
                                        <td align="center"><?php echo $data["fecha_cad"] ?></td>
                                        <td align="center"><?php echo $data["cantidad"] ?></td>
                                    </div>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!--Pie de pagina-->
    <footer>
        <div class="div-conteiner-footer">
            <div>
                <h3>Derechos reservados ©Boxha</h3>
            </div>
            <div>
                <span class="fa-stack fa-1x" style="--fa-inverse: #1da1f2;">
                    <a href="#">
                        <i class="fa-solid fa-square fa-stack-2x "></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse "></i>
                    </a>
                </span>
                <span class="fa-stack fa-1x" style="--fa-inverse: #1da1f2;">
                    <a href="#">
                        <i class="fa-solid fa-square fa-stack-2x "></i>
                        <i class="fab fa-facebook fa-stack-1x fa-inverse "></i>
                    </a>
                </span>
                <span class="fa-stack fa-1x" style="--fa-inverse: #1eff00;">
                    <a href="#">
                        <i class="fa-solid fa-square fa-stack-2x"></i>
                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                    </a>
                </span>
                <span class="fa-stack fa-1x" style="--fa-inverse: #ff8800;">
                    <a href="#">
                        <i class="fa-solid fa-square fa-stack-2x"></i>
                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </a>
                </span>
            </div>
        </div>
    </footer>
    <div class="lds-ring loader" id="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <script src="./script/loadScreen.js"></script>
</body>

</html>