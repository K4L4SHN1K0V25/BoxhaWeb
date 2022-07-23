<?php
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
    <link rel="stylesheet" href="./style/activeOrders.css">
    <title>Mis pedidos</title>
</head>

<body>
    <!--Encabezado-->
    <header>
        <div class="div-conteiner">
            <div>
                <a href="#"><div class="div-companyName"></div></a>
                <h3 class="div-slogan">Lorem ipsum dolor sit amet</h3>
            </div>
            <div>
                <a class="div-userName" href="./settings.html">Bienvenido: <?php echo $usuario?></a>
                <a class="div-exit" href="./index.html">Salir</a>
            </div>
        </div>
        <nav class="nav-conteiner">
            <a href="./activeOrders.php"><div class="icons"><i class="fa fa-linode" aria-hidden="true"></i><p>Mis pedidos</p></div></a>
            <a href="./makeOrder.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p>Hacer pedido</p></div></a>
            <a href="./record.php"><div class="icons"><i class="fa fa-history" aria-hidden="true"></i><p>Historial de pedidos</p></div></a>
            <a href="./settings1.php"><div class="icons"><i class="fa fa-cog" aria-hidden="true"></i><p>Configuraciones</p></div></a>
            <a href="./customerService.php"><div class="icons"><i class="fa fa-user-circle" aria-hidden="true"></i><p>Soporte</p></div></a>
        </nav>
    </header>
    <!--Cuerpo-->
    <main>
        <<div class="storage-grid-conteiner"> 
                <div class="titulos">
                    <h4>Historial de pedidos</h4>
                </div>
                <div class="pedidos">
                    <!--Los diseños ya esta automatizados-->
    
                    <!--El modelo de abajo es el ejemplo de como deben de rellenarce los campos y como se debe
                    de generarsu html TIENEN QUE USAR DE ETIQUETAS LAS MISMAS DE ABAJO EL  CONTENIDO ES EL QUE
                    SE CAMBIA CUANDO LO GENEREN-->
    
                    <div><!--Div ejemplo !ELIMINAR CUANDO SE TRABAJE CON LOS REALES!-->
                        <!--<p>Usuario</p>
                        <p>Datos del envio</p>
                        <p>Direccion</p>
                        <p>Estado</p>-->

                        <table>
                        <tr>
                            <th>*</th>
                            <th>Harina arroz 1k</th>
                            <th>Harina arroz 3k</th>
                            <th>Harina arroz 5k</th>
                            <th>Harina quinoa 1k</th>
                            <th>Harina quinoa 3k</th>
                            <th>Harina quinoa 5k</th>
                            <th>Total</th>
                            <th>fecha</th>
                            <th>Direccion</th>
                            <th>Estado</th>
                        </tr>
                        <!--CONSULTA DE DATOS-->
                        <?php
                            $queryList = mysqli_query($con, "SELECT * FROM ordenes_new WHERE id_cliente = '".$id_usu."'");
                            $resList = mysqli_num_rows($queryList);
                            if($resList > 0){
                                while($data = mysqli_fetch_array($queryList)){
                                    if($data["estado"] != "ENTREGADO"){
                        ?>
                                    <tr>
                                        <td>Cantidades</td>
                                        <td  align="center"><?php echo $data["harina_ac1"]?></td>
                                        <td align="center"><?php echo $data["harina_ac3"]?></td>
                                        <td align="center"><?php echo $data["harina_ac5"]?></td>
                                        <td align="center"><?php echo $data["harina_qc1"]?></td>
                                        <td align="center"><?php echo $data["harina_qc3"]?></td>
                                        <td align="center"><?php echo $data["harina_qc5"]?></td>
                                        <td><?php echo $data["total"]?></td>
                                        <td><?php echo $data["fecha"]?></td>
                                        <td><?php echo $data["direccion"]?></td>
                                        <td><?php echo $data["estado"]?></td>
                                    </tr>
                        <?php
                                    }
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
                        <i class="fa-solid fa-square fa-stack-2x " ></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse "></i>
                    </a>
                </span>
                <span class="fa-stack fa-1x" style="--fa-inverse: #1da1f2;">
                    <a href="#">
                        <i class="fa-solid fa-square fa-stack-2x " ></i>
                        <i class="fab fa-facebook fa-stack-1x fa-inverse "></i>
                    </a>
                </span>
                <span class="fa-stack fa-1x" style="--fa-inverse: #1eff00;">
                    <a href="#">
                        <i class="fa-solid fa-square fa-stack-2x" ></i>
                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                    </a>
                </span>
                <span class="fa-stack fa-1x" style="--fa-inverse: #ff8800;">
                    <a href="#">
                        <i class="fa-solid fa-square fa-stack-2x" ></i>
                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </a>
                </span>
            </div>
        </div>
    </footer>
    <div class="lds-ring loader" id="loader"><div></div><div></div><div></div><div></div></div>
    <script src="./script/loadScreen.js"></script>
</body>

</html>