<?php
    //Creamos la variable "con" conexion con la base de datos
    $con = mysqli_connect('localhost','id18930570_boxhacucei','A}IPH_cU*TK6MUgE','id18930570_db_boxha') or die('Hubo un error en la conexion con el servidor');

    //Llama a las variables del login donde se recogen los datos de inicio de sesion
    session_start();
    $mc = $_SESSION["correo"];
    $mco = $_SESSION["contrasena"];

    //Creamos nuestra consulta en sql
    $sql1 = "SELECT * FROM pagina_web_usuarios WHERE correo = '".$mc."' and contraseña = '".$mco."'";
    //Por ultimo utilizamos la variable con y sql, para insertar la informacion a la base de datos
    $result = mysqli_query($con,$sql1) or die('Error en el query database');
    //Obtenemos el numero de consultas que nos arrojo nuestro resultado
    $nr = mysqli_num_rows($result);
    //Obtenemos la informacion de la consulta
    $userbs = $result->fetch_assoc();
    //Obtener datos unicos
    $usuario = $userbs["usuario"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/701150858a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/normalize.css">
    <link rel="stylesheet" href="./style/customerService.css">
    <title>Atencion a cliente</title>
</head>

<body>
    <!--Encabezado-->
    <header>
        <div class="div-conteiner">
            <div>
                <a href=""><div class="div-companyName"></div></a>
                <h3 class="div-slogan">Lorem ipsum dolor sit amet</h3>
            </div>
            <div>
                <a class="div-userName" href="./settings.html">Bienvenido: <?php echo $usuario?></a>
                <a class="div-exit" href="./BoxhaWeb/index.html">Salir</a>
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
        <div class="storage-grid-conteiner">
            <div class="titulos">
                <h4>Soporte</h4>
            </div>
            <div class="reportes">
                    <form action="sendCustomerService.php" method="post" class="form-container"  enctype="multipart/form-data">
                        <fieldset>
                            <legend>Nombre</legend>
                            <label for="nombre"></label>
                            <input class="input" type="text" name="nombre" id="nombre" placeholder="nombre completo">
                        </fieldset>
                        <fieldset>
                            <legend>Correo</legend>
                            <label for="correo"></label>
                            <input class="input" type="email" name="correo" id="correo" placeholder="correo Institucional">
                        </fieldset>
                        <fieldset>
                            <legend>Problematica</legend>
                            <label for="problema"></label>
                            <input class="input" type="text" name="problema" id="problema" placeholder="breve y consciso">
                        </fieldset>
                        <fieldset>
                            <legend>Descripcion de la problematica</legend>
                            <label for="telefono"></label>
                            <textarea class="input" name="mensaje" id="mensaje" cols="30" rows="10" placeholder="descripcion detallada del problema"></textarea>
                        </fieldset>
                        <fieldset>
                            <legend>Imagenes de la problematica</legend>
                            <label for="adjunto"></label>
                            <input class="file" type="file" name="adjunto" id="adjunto" accept=".jpg,.png" multiple>
                        </fieldset>
                        <label for="boton"></label>
                        <input class="send" type="submit" id="boton" value="Enviar">
                    </form>
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