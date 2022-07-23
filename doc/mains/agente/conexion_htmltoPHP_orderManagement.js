// Espera a que el HTML que lo mando a llamar este listo "ready"
$( document ).ready(function() {
    //Creamos un objeto que contenga la llave con la informacion que va a mandar 
    var data = { comand: "get_data_settings", };
    //Hacemos una peticion de tipo POst a settings.php, el cual necesitara la data para reconocer que instruccion realizara, y una vez realizada la instruccion correctamente ejecutara al funcion saveDataintoHTML
    $.post("./orderManagement.php", data, saveDataintoHtml);
});

//Creamos una funcion
function saveDataintoHtml(results){
    //Hacemos un console log para saber que datos estamos obteniendo
    console.log(results);
    //Creamos un variable User que contiene toda la info que tenemos del usuario
    var pedidos = JSON.parse(results);
    //Obtenemos nuestra clase .storage-grid-conteiner de nuestro html y lo guardamos en nuestra var container
    let container = document.querySelector('.storage-grid-conteiner');
    //Creamos un for, que haga ciclos como catidad de veces haya pedidos en la base de datos
    for (i in pedidos){ 
        console.log(pedidos[i]);
        //Creamos un div 
        let div = document.createElement('div');
        //Le añadimos al div la clase "producto" para el css
        div.classList.add("pedidos");
        //Creamos un parrafo 
        let pUsuario = document.createElement('p');
        //Le añadimos el nombre del producto a nuestro parrafo
        pUsuario.innerText += pedidos[i].id_cliente;
        //Parrafo (datos)
        let pDatos = document.createElement('p');
        //Añadimos texto
        pDatos.innerText += "Producto: " + pedidos[i].producto + "\nCantidad de productos: " + pedidos[i].cantidad + "\nPrecio: $" + pedidos[i].precio;
        //Direccion
        let pDireccion= document.createElement('p');
        pDireccion.innerText += pedidos[i].direccion;
        //Estado
        let pEstado = document.createElement('p');
        pEstado.innerText += pedidos[i].estado;
        
        //Agreagmos nuestros parrafos a nuestro div
        div.appendChild(pUsuario);
        div.appendChild(pDatos);
        div.appendChild(pDireccion);
        div.appendChild(pEstado);

        //Agregamos el div a container 
        container.appendChild(div)

    }
   

}
