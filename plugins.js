function plugins() {
    var x=navigator.plugins.length; // store the total no of plugin stored
    var resultado = new Array();
    //var txt="Total plugin installed: "+x+"<br/>";
    //txt+="Available plugins are->"+"<br/>";
    for(var i=0;i<x;i++)
        resultado.push(navigator.plugins[i].name);
    return resultado;
}

function adblock() {
    var salida;
    if (window.adblockEnabled)
        salida = new Array("AdBlock activado", "adblock", true);
    else
        salida = new Array("AdBlock activado", "adblock", false);
    return salida;
}

function getFlashVersion(){
    var resultado = null;
    for(var i = 0 ; i < navigator.mimeTypes.length; i++) {
        if (navigator.mimeTypes[i].enabledPlugin.name == "Shockwave Flash")
            resultado = navigator.mimeTypes[i].enabledPlugin.version;
    }
    return new Array("Versión de flash instalada", "flash", resultado);
}

function arrayPlugins(){
    var salida = new Array();
    salida.push(plugins());
    salida.push(getFlashVersion());
    salida.push(adblock());
    return salida;
}

function resumenPlugins(listaPlugins){
    var array = new Array();//En este array guardaremos solo los nombres de los plugins
    var aux;
    for(var i in listaPlugins[0]) {//lista de los plugins instalados solo los nombres
        aux = listaPlugins[0][i].toString().toLowerCase();
        array.push(aux);
    }
    if(listaPlugins[1][2] != null) {//comprueba si hay flash en los plugins
        aux = listaPlugins[1][1].toString().toLowerCase();
        array.push(aux);
    }
    if(listaPlugins[2][2]) {//comprueba si hay adblock en los plugins
        aux = listaPlugins[2][1].toString().toLowerCase();
        array.push(aux);
    }
    array.sort();
    aux = "";
    for (var i in array)//concatenamos los nombres de los plugins ya ordenados y en minuscula
        aux += array[i];
    return aux;
}

function resultadoPlugins(listaPlugins) {
    var valorFlash;
    if (listaPlugins[1][2] != null)
        valorFlash = listaPlugins[1][2];
    else
        valorFlash = "Flash no disponible";
    var salida = "<table><tr><th colspan='2'>Plugins</th></tr>" + //aqui hay que meter css a la tabla
        "<tr><td>Plugins disponibles</td><td>";
    for(var i = 0 ; i < listaPlugins[0].length ; i++)
        salida += "<p>" + listaPlugins[0][i] + "</p>";//no se si esta bien una p en una tabla
    salida += "</td></tr>" +
        "<tr><td>Plugins totales instalados</td><td>" + listaPlugins[0].length + "</td></tr>" +
        "<tr><td>"+listaPlugins[1][0]+"</td><td>"+valorFlash+"</td></tr>" +
        "<tr><td>"+listaPlugins[2][0]+"</td><td>"+listaPlugins[2][2]+"</td></tr>" +
        "</table>";
    return salida;
}