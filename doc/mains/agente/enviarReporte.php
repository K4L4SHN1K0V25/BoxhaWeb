<?php
    $name = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $header = 'From: ' . $correo . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";
  
    $mensaje = "Este mensaje fue enviado por: " . $name . " \r\n";
    $mensaje .= "e-mail: " . $correo . " \r\n";
    $mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
    $mensaje .= "Enviado el: " . date('d/m/Y', time()) ;
    
    $para = 'boxhaweb@gmail.com';
    $asunto = 'Creacion de reportes';


    if(mail($para, $asunto, utf8_decode($mensaje), $header)){
        echo "<script>alert('Formulario enviado exitosamente.');</script>";
    }else{
        echo "<script>alert('Error al enviar el formulario');</script>";
    }
    header("Location:reportControl.html");
?>