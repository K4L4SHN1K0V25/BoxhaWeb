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
    <script src="https://kit.fontawesome.com/701150858a.js"></script>
    <link rel="stylesheet" href="./style/normalize.css">
    <link rel="stylesheet" href="./style/settings.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Este es que manda la peticion al js y el js, conecta con get_data_config -->
    <script type="text/javascript"  src="./conexion_htmltoPHP_settings.js"></script>
    <title>Configuraciones</title>
</head>

<body>
    <!--Encabezado-->
    <header>
        <div class="div-conteiner">
            <div>
                <a href="/principal/index.html"><div class="div-companyName"></div></a>
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
        <div class="carrusel">
            <img src="./style/img/Imagen-1.jpg" alt="">
            <div class="div-text">
                <div>
                    <h3>Configuracion</h3>
                    <form action="javascript:senddata()">
                        <!-- <form action="conexion/sent_data_settings.php" method="POST"> -->
                        <section class="form-register">
                        <!--Campos para ingresar los datos -->
                        <div class="groupsinputs left">
                            <label class="label">Nombre Completo*</label>
                            <div class="tooltip"> i
                                <span class="tooltiptext">Nombre completo, requerido</span>
                            </div>
                            <input class="input" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" required>
                        </div>
                        <div class="groupsinputs rigth">
                            <label class="label">Correo electronico*</label>
                            <div class="tooltip"> i
                                <span class="tooltiptext">Email del usuario, requerido</span>
                            </div>
                            <input class="input" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" required>
                        </div>
                        <div class="groupsinputs left">
                            <label class="label">Nombre de usuario*</label>
                            <div class="tooltip"> i
                                <span class="tooltiptext">Nombre de usuario, requerido</span>
                            </div>
                            <input class="input" type="text" name="usuario" id="usuario" placeholder="Ingrese su Nombre de Usuario" required>
                        </div>
                        <!-- Quitamos la contraseña por temas de seguridad, ademas de que no es necesario modificarla -->
                        <!-- <input class="input" type="password" name="contra" id="contra" placeholder="Ingrese su Contraseña"> -->
                        <div class="groupsinputs right">
                            <label class="label">Fecha de nacimiento*</label>
                            <div class="tooltip"> i
                                <span class="tooltiptext">Fecha de nacimiento (dd/mm/yyyy), requerido</span>
                            </div>
                            <input class="input" type="date" name="fecha" id="fecha" placeholder="Ingrese fecha de nacimiento" required>
                        </div>
                        <div class="groupsinputs left">
                            <label class="label">Direccion*</label>
                            <div class="tooltip"> i
                                <span class="tooltiptext">Dirección del usuario, utilizada para las entregas. Requerido </span>
                            </div>
                            <input class="input" type="text" name="direccion" id="direccion" placeholder="Ingrese su direccion" required>
                        </div>
                        <div class="groupsinputs right">
                            <label class="label">Codigo Postal*</label>
                            <div class="tooltip"> i
                                <span class="tooltiptext">Codigo postal de la dirección, requerido</span>
                            </div>
                            <input class="input" type="number" name="postal" id="postal" placeholder="Ingrese su numero postal" required>
                        </div>
                        <div class="groupsinputs left">
                            <label class="label">Teléfono 1*</label>
                            <div class="tooltip"> i
                                <span class="tooltiptext">Teléfono principal del usuario, requerido</span>
                            </div>
                            <input class="input" type="number" name="telefono" id="telefono" placeholder="Ingrese su numero telefonico" required>
                        </div>
                        <div class="groupsinputs right">
                            <label class="label">Teléfono 2</label>
                            <div class="tooltip"> i
                                <span class="tooltiptext">Teléfono secundario del usuario, opcional</span>
                            </div>
                            <input class="input" type="number" name="telefono2" id="telefono2" placeholder="Puede ingresar un segundo numero telefonico">
                        </div>
                        <div class="groupsinputs center">
                            <h4>Aqui puedes modificar la informacion de tu usuario, si tiene asterico significa que el campo es obligatorio rellenarlo y puedes guardar los cambios hechos con el boton guardar</h4>
                        </div>
                        <div class="groupsinputs leftbutton">
                            <!--Este es el boton para guardar los cambios -->
                            <input class="send" type="submit" value="Guardar">
                        </div>
                        <div class="groupsinputs rigth">
                            <!--Botón para acceder a pagina para hacer login -->
                            <input class="can" type="button" value="Cancelar" onclick="location.href='./activeOrders.html'">
                        </div>
                        </section>
                    </form>
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