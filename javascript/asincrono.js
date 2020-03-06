function asincroniaJS(elementosJS,id) {
    if (elementosJS != null){
        var formData = new FormData();
        formData.append("ID",id);
        for (var i = 1; i < elementosJS.length; i++){
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
                document.getElementById("resultadoJS").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","BD/cargaJS.php",true);
        xmlhttp.send(formData);
    }
}

function asincroniaFuentes(listaFuentes,id) {
    if (listaFuentes != null){
        var formData = new FormData();
        formData.append("ID",id);
        for (var i = 1; i < listaFuentes.length; i++){
            var nombreClave = "fuente"+i;
            formData.append(nombreClave, listaFuentes[i]);
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
}

function asincroniaPlugins(listaPlugins,id) {
    if (listaPlugins != null){
        var formData = new FormData();
        formData.append("ID",id);
        for (var i = 0; i < listaPlugins[0].length; i++){
            var nombreClave = "plugin"+i;
            formData.append(nombreClave, listaPlugins[0][i]);
        }
        formData.append("flash", listaPlugins[1][2]);
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("POST","BD/cargaPlugins.php",true);
        xmlhttp.send(formData);
    }
}