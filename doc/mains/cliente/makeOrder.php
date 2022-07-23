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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/701150858a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/normalize.css">
    <link rel="stylesheet" href="./style/makeOrder.css">
    <title>Realizar pedidos</title>
</head>

<body>
    <!--Encabezado-->
    <header>
        <div class="div-conteiner">
            <div>
                <a href="">
                    <div class="div-companyName"></div>
                </a>
                <h3 class="div-slogan">Lorem ipsum dolor sit amet</h3>
            </div>
            <div>
                <a class="div-userName" href="./settings.html">Bienvenido: <?php echo $usuario ?></a>
                <a class="div-exit" href="./index.html">Salir</a>
            </div>
        </div>
        <nav class="nav-conteiner">
            <a href="./activeOrders.php">
                <div class="icons"><i class="fa fa-linode" aria-hidden="true"></i>
                    <p>Mis pedidos</p>
                </div>
            </a>
            <a href="./makeOrder.php">
                <div class="icons"><i class="fa fa-truck" aria-hidden="true"></i>
                    <p>Hacer pedido</p>
                </div>
            </a>
            <a href="./record.php">
                <div class="icons"><i class="fa fa-history" aria-hidden="true"></i>
                    <p>Historial de pedidos</p>
                </div>
            </a>
            <a href="./settings1.php">
                <div class="icons"><i class="fa fa-cog" aria-hidden="true"></i>
                    <p>Configuraciones</p>
                </div>
            </a>
            <a href="./customerService.php">
                <div class="icons"><i class="fa fa-user-circle" aria-hidden="true"></i>
                    <p>Soporte</p>
                </div>
            </a>
        </nav>
    </header>
    <!--Cuerpo-->
    <main>
        <div class="storage-grid-conteiner">
            <div class="titulos">
                <h4>Realizar pedidos</h4>
            </div>
            <div class="leftside">
                <h4>Productos</h4>
                <table>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Fecha de caducidad</th>
                        <th>Cantidad</th>
                    </tr>
                    <!--CONSULTA DE DATOS-->
                    <?php
                    $queryList = mysqli_query($con, "SELECT * FROM in_vent");
                    $resList = mysqli_num_rows($queryList);
                    if ($resList > 0) {
                        while ($data = mysqli_fetch_array($queryList)) {
                            if ($data["cantidad"] > 0) {
                    ?>
                                <tr>
                                    <form action="recibe.php" class="productos" method="get">
                                        <td align="center">
                                            <div class="botones">
                                                <input class="pro" type="text" name="txtp" readonly value="<?php echo $data["producto"] ?> kilo">
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div class="botones">
                                                <input class="pre" size="2" type="text" name="txtpr" readonly value="<?php echo $data["precio"] ?>">
                                            </div>
                                        </td>
                                        <div class="botones">
                                            <td align="center"><?php echo $data["cantidad"] ?></td>
                                            <td align="center"><?php echo $data["fecha_cad"] ?></td>
                                        </div>
                                        <td align="center">
                                            <div class="botones">
                                                <input class="input" type="number" name="cantidad" id="cantidad" required>
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div class="botones">
                                                <input class="send" type="submit" name="enviar" id="enviar" value="Agregar">
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
                <!-- <form action="" class="productos">
                    <p>Nombre del producto</p>
                    <p>Descripcion del producto</p>
                    <p>Precio unitario</p>
                    <div class="botones">
                        <input class="input" type="number" name="cantidad" id="cantidad">
                        <input class="send" type="submit" name="enviar" id="enviar" value="Agregar">
                    </div>
                </form>-->
            </div>
            <div class="rightside">
                <h4>Carrito</h4>
                <table>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                    <!--CONSULTA DE DATOS-->
                    <?php
                    $queryC = mysqli_query($con, "SELECT * FROM carrito");
                    $resC = mysqli_num_rows($queryC);
                    if ($resC > 0) {
                        while ($dataC = mysqli_fetch_array($queryC)) {
                    ?>
                            <tr>
                                <?php if ($dataC["harina_ac1"] != 0 and $dataC["id_cliente"] == $id_usu) { ?>
                                    <td align="center">Harina arroz 1 kilo:</td>
                                    <td align="center"><?php echo $dataC["harina_ac1"] ?></td>
                                    <td align="center">.</td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if ($dataC["harina_ac3"] != 0 and $dataC["id_cliente"] == $id_usu) { ?>
                                    <td align="center">Harina arroz 3 kilo:</td>
                                    <td align="center"><?php echo $dataC["harina_ac3"] ?></td>
                                    <td align="center">.</td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if ($dataC["harina_ac5"] != 0 and $dataC["id_cliente"] == $id_usu) { ?>
                                    <td align="center">Harina arroz 5 kilo:</td>
                                    <td align="center"><?php echo $dataC["harina_ac5"] ?></td>
                                    <td align="center">.</td>
                                <?php } ?>
                            </tr>
                            <?php if ($dataC["harina_qc1"] != 0 and $dataC["id_cliente"] == $id_usu) { ?>
                                <td align="center">Harina quinoa 1 kilo</td>
                                <td align="center"><?php echo $dataC["harina_qc1"] ?></td>
                                <td align="center">.</td>
                            <?php } ?>
                            </tr>
                            <tr>
                                <?php if ($dataC["harina_qc3"] != 0 and $dataC["id_cliente"] == $id_usu) { ?>
                                    <td align="center">Harina quinoa 3 kilo:</td>
                                    <td align="center"><?php echo $dataC["harina_qc3"] ?></td>
                                    <td align="center">.</td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if ($dataC["harina_qc5"] != 0 and $dataC["id_cliente"] == $id_usu) { ?>
                                    <td align="center">Harina quinoa 5 kilo:</td>
                                    <td align="center"><?php echo $dataC["harina_qc5"] ?></td>
                                    <td align="center">.</td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php if ($dataC["id_cliente"] == $id_usu) { ?>
                                    <td align="center">____________________:</td>
                                    <td align="center">.</td>
                                    <td align="center">$<?php echo $dataC["total"] ?></td>
                                <?php } ?>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
                <form action="guardar.php" class="productos">
                    <div class="botones">
                        <input class="send" type="submit" name="guardar" value="Guardar compra">
                    </div>
                </form>
                <form action="eliminar.php" class="productos">
                    <div class="botones">
                        <input class="can" type="submit" name="eliminar" value="Eliminar compra">
                    </div>
                </form>
                <!--<form action="">
                    <div>
                        <p>Nombre del producto</p>
                        <p>Cantidad</p>
                        <p>Precio total</p>
                    </div>
                    <span class="botones">
                        <input class="send" type="text" value="Comprar">
                        <input class="can" type="text" value="Cancelar">
                    </span>

                </form>-->
            </div>
            <div class="textos">
                <p>Una vez que se realice la compra tendra 3 dias habiles para realizar el deposito a la cuenta de paypal: ********** con el monto exacto de su compra, en caso contario el pedido sera cancelado</p>
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