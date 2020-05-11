/*
Se encarga de lanzar de controlar que cuando se ejecuta asincroniaJS ya ha recibido la respuesta de todas las anteriores
 */
function gestionarAsincronia(id) {
    //cargamos las fuentes en la base de datos, y cuando recibimos una respuesta positiva cargamos lo siguiente, así hasta el cargaJS
    asincroniaFuentes(font,id).onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            asincroniaAudio(formatosAudio, id).onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    asincroniaPlugins(pluginsInstalados, resumen, id).onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            asincroniaVideo(formatosVideo,id).onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200)
                                    asincroniaJS(elementosJS,id); //este debe ser el ultimo metodo en lanzarse, y solo se lanza cuando han terminado todos
                            }
                        }
                    }
                }
            }
        }
    }
}

/*
elementosJS es la lista de elementos obtenidos mediante funciones javascript que queremos cargar en la base de datos
id es el id de la consulta actual
Envia todos los datos obtenidos mediante javascript a la base de datos y recibe un json al terminar con los ratios de
cada uno de los elementos en nuestra base de datos.
 */
function asincroniaJS(elementosJS,id) {
    if (elementosJS != null){
        var formData = new FormData(); //Formulario con los pares clave valor de cada uno de los elementos que vamos a enviar
        formData.append("ID",id);
        for (var i = 0; i < elementosJS.length; i++){
            formData.append(elementosJS[i][1], elementosJS[i][2]);
        }

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() { //cuando cambia el estado de la peticion
            if (this.readyState == 4 && this.status == 200) { //el estado es el ultimo y ok
                var resultado = this.response;
                for (var clave in resultado) {
                    if (document.getElementById(clave)) //si existe el id de la celda de la tabla html
                        document.getElementById(String(clave)).innerHTML = resultado[clave]; //cambiamos el contenido de la celda insertando el ratio
                }
            }
            for (let elemento of document.querySelectorAll('.cargando'))
                elemento.style.visibility = 'hidden'; //ocultamos todas las imagenes de loading
        };
        xmlhttp.open("POST","BD/cargaJS.php",true);
        xmlhttp.send(formData);
        xmlhttp.responseType="json";
    }
}

/*
listaFuentes es un array con todas las fuentes que hemos detectado
id del usuario de la consulta
Se encarga de insertar en la base de datos en la tabla de las fuentes todas las fuentes que hemos encontrado
 */
function asincroniaFuentes(listaFuentes,id) {
    var xmlhttp = null;
    if (listaFuentes != null){
        var formData = new FormData();//creamos un form en el que incluimos todas las fuentes que enviaremos a cargaFuentes.php
        formData.append("ID",id);
        formData.append("resumen", listaFuentes[1]);
        for (var i = 0; i < listaFuentes[0].length; i++){
            var nombreClave = "fuente"+i;
            formData.append(nombreClave, listaFuentes[0][i]);
        }

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("POST","BD/cargaFuentes.php",true);
        xmlhttp.send(formData);
    }
    return xmlhttp;//devolvemos el objeto xmlhttprequest para que el metodo gestionarAsincronia reciba el aviso del servidor
}

/*
listaPlugins incluye los plugins que queremos cargar en bd
resumen es una variable que tiene una cadena de todos los plugins ordenados y en minúscula
id del usuario actual
Se encarga de insertar en la base de datos en la tabla de plugins todos los plugins que hemos encontrado
 */
function asincroniaPlugins(listaPlugins, resumen, id) {
    var xmlhttp = null;
    if (listaPlugins != null){
        var formData = new FormData();//form en el que incluimos todos los plugins encontrados y el resumen de estos
        formData.append("ID",id);
        formData.append("resumen", resumen);
        for (var i = 0; i < listaPlugins[0].length; i++){
            var nombreClave = "plugin"+i;
            formData.append(nombreClave, listaPlugins[0][i]);
        }
        if (listaPlugins[1][2] != null)
            formData.append("flash", "Shockwave Flash");
        if (listaPlugins[2][2])
            formData.append("adblock", "Ad_Block");
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){//cuando recibe la respuesta del servidor pintamos en la tabla html el resultado del ratio
            if (this.readyState == 4 && this.status == 200){
                var resultado = this.response;
                for (var clave in resultado) {
                    if (document.getElementById(clave))
                        document.getElementById(String(clave)).innerHTML = resultado[clave];
                }
            }
        }
        xmlhttp.open("POST","BD/cargaPlugins.php",true);
        xmlhttp.send(formData);
        xmlhttp.responseType="json";
    }
    return xmlhttp;//devolvemos el objeto xmlhttprequest para que se gestione en orden en gestionarAsincronia
}

/*
formatos es una lista de los formatos comprobados y el resultado de estos en el navegador (maybe, probably o "")
id del usuario actual
Hace la llamada asincrona al servidor para cargar en la base de datos los formatos de video soportados
 */
function asincroniaVideo(formatos,id) {
    var xmlhttp = null;
    if (formatos != null){
        var formData = new FormData();//en el form añadimos los formatos de video y sus resultados, ademas del id
        formData.append("ID",id);
        for (var i in formatos){
            formData.append(formatos[i][1], formatos[i][2]);
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("POST","BD/cargaFormatosVideo.php",true);
        xmlhttp.send(formData);
    }
    return xmlhttp;//devolvemos el objeto xmlhttprequest para que gestionarAsincronia se encargue de lanzarlo en orden
}

/*
formatos es una lista de los formatos comprobados y el resultado de estos en el navegador (maybe, probably o "")
id del usuario actual
Hace la llamada asincrona al servidor para cargar en la base de datos los formatos de audio soportados
 */
function asincroniaAudio(formatos,id) {
    var xmlhttp = null;
    if (formatos != null){
        var formData = new FormData();//en el form añadimos los formatos comprobados con su resultado y el id actual
        formData.append("ID",id);
        for (var i in formatos){
            formData.append(formatos[i][1], formatos[i][2]);
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("POST","BD/cargaFormatosAudio.php",true);
        xmlhttp.send(formData);//enviamos el form a cargaFormatosAudio
    }
    return xmlhttp;//devolvemos el objeto xmlhttprequest para que gestionarAsincronia se encargue de lanzarlo en orden
}

/*
dispositivos
id
carga en la base de datos los dispositivos encontrados

Es probable que no los necesitemos al final!!!!!!!
 */
function asincroniaDispositivos(dispositivos,id) {
    if (dispositivos != null){
        var formData = new FormData();
        formData.append("ID",id);
        for (var i in dispositivos){
            var dispositivo = "dispositivo"+i;
            formData.append(dispositivo, dispositivos[i]);
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("POST","BD/cargaDispositivos.php",true);
        xmlhttp.send(formData);
    }
}