function gestionarAsincronia() {
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

function asincroniaJS(elementosJS,id) {
    if (elementosJS != null){
        var formData = new FormData();
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
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var resultado = this.response;
                for (var clave in resultado) {
                    if (document.getElementById(clave))
                        document.getElementById(String(clave)).innerHTML = resultado[clave];
                }
            }
            document.getElementById("cargando").style.display='none'; //ocultamos la imagen de loading
        };
        xmlhttp.open("POST","BD/cargaJS.php",true);
        xmlhttp.send(formData);
        xmlhttp.responseType="json";
    }
}

function asincroniaFuentes(listaFuentes,id) {
    var xmlhttp = null;
    if (listaFuentes != null){
        var formData = new FormData();
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
    return xmlhttp;
}

function asincroniaPlugins(listaPlugins, resumen, id) {
    var xmlhttp = null;
    if (listaPlugins != null){
        var formData = new FormData();
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
        xmlhttp.onreadystatechange = function(){
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
    return xmlhttp;
}

function asincroniaVideo(formatos,id) {
    var xmlhttp = null;
    if (formatos != null){
        var formData = new FormData();
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
    return xmlhttp;
}

function asincroniaAudio(formatos,id) {
    var xmlhttp = null;
    if (formatos != null){
        var formData = new FormData();
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
        xmlhttp.send(formData);
    }
    return xmlhttp;
}

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