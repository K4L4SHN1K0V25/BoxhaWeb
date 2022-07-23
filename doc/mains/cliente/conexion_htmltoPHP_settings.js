// Espera a que el HTML que lo mando a llamar este listo "ready"
$( document ).ready(function() {
    //Creamos un objeto que contenga la llave con la informacion que va a mandar 
    var data = { comand: "get_data_settings", };
    //Hacemos una peticion de tipo POst a settings.php, el cual necesitara la data para reconocer que instruccion realizara, y una vez realizada la instruccion correctamente ejecutara al funcion saveDataintoHTML
    $.post("./conexion/settings.php", data, saveDataintoHtml);
});

//Creamos una funcion
function saveDataintoHtml(result){
    //Hacemos un console log para saber que datos estamos obteniendo
    console.log(result);
    //Creamos un variable User que contiene toda la info que tenemos del usuario
    var user = JSON.parse(result);
    //Obtenemos el valor y se lo mandamos al html basandonos en su ID
    $("#nombres").val(user.nombre);
    $("#correo").val(user.correo);
    $("#usuario").val(user.usuario);
    $("#fecha").val(user.fecha);
    $("#direccion").val(user.direccion);
    $("#postal").val(user.postal);
    $("#telefono").val(user.tel1);
    $("#telefono2").val(user.tel2);
}

function senddata(){
    //Creamos un objeto llamado Data que obtenga toda la informacion de toda etiqueta html form
    var form = document.querySelector("form");
    var Data = Object.fromEntries(new FormData(form).entries());
    //Creamos el objeto, con la llave "comand" (La cual sera tomada por el switch de setting.php) y recibira la instruccion sent_data_settings 
    var obj = {
        comand: 'sent_data_settings',
      };
    // Combinamos los objetos que contiene la instruccion para el swtich y la infomacion recoletada por el formulario
    var data = {...Data, ...obj}
    // Hacemos una peticion de tipo Post, hacia settings.php, y como es tipo Post nos pide info que sera necesaria y la mandamos en el objeto combinado data y una vez termine la peticion correctamente ejecita la funcion notificacion correctamente
    $.post("./conexion/settings.php", data, notificacionCorrectamente);
}

function notificacionCorrectamente(){
    //Creamos la alerta que aparecera en pantalla avisando que los cambios dse guardaron correctamente
    alert("Usuario actualizado correctamente");
    window.location.reload(true);

}

