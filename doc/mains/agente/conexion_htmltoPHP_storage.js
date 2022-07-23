// Espera a que el HTML que lo mando a llamar este listo "ready"
$( document ).ready(function() {
    //Creamos un objeto que contenga la llave con la informacion que va a mandar 
    var data = { comand: "get_data_settings", };
    //Hacemos una peticion de tipo POst a settings.php, el cual necesitara la data para reconocer que instruccion realizara, y una vez realizada la instruccion correctamente ejecutara al funcion saveDataintoHTML
    $.post("./storage.php", data, saveDataintoHtml);
});

//Creamos una funcion
function saveDataintoHtml(results){
    //Hacemos un console log para saber que datos estamos obteniendo
    console.log(results);
    //Creamos un variable User que contiene toda la info que tenemos del usuario
    var productos = JSON.parse(results);
    //Obtenemos nuestra clase .storage-grid-conteiner de nuestro html y lo guardamos en nuestra var container
    let container = document.querySelector('.storage-grid-conteiner');
    //Creamos un for, que haga ciclos como catidad de veces haya productos en la base de datos
    for (i in productos){ 
        //Creamos un div 
        let div = document.createElement('div');
        //Le añadimos al div la clase "producto" para el css
        div.classList.add("producto");
        //Creamos un parrafo 
        let pProducto = document.createElement('p');
        //Le añadimos el nombre del producto a nuestro parrafo
        pProducto.innerText += productos[i].producto;
        //Parrafo (descripcion)
        let pDescripcion = document.createElement('p');
        //A descripcion le añadimos la clase descripcion
        // pDescripcion.classList.add("descripcion");
        //Añadimos texto
        pDescripcion.innerText += productos[i].descripcion;
        //Peso
        let pPeso = document.createElement('p');
        pPeso.innerText += productos[i].peso + " kg";
        //Precio
        let pPrecio = document.createElement('p');
        pPrecio.innerText += "$" + productos[i].precio;
        //Unidades
        let pUnidades = document.createElement('p');
        pUnidades.innerText += productos[i].cantidad;

        //Agreagmos nuestros parrafos a nuestro div
        div.appendChild(pProducto);
        div.appendChild(pDescripcion);
        div.appendChild(pPeso);
        div.appendChild(pPrecio);
        div.appendChild(pUnidades);
        //Agregamos el div a container 
        container.appendChild(div)

    }
   

}
