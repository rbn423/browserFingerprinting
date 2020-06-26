/*
Devuelve la lista de plugins que se encuentran en el navegador
 */
function plugins() {
    var x=navigator.plugins.length; //Numero total de plugins en el navegador
    var resultado = new Array();//en el array iremos añadiendo los plugins que encontramos
    for(var i=0;i<x;i++)//recorremos toda la lista de plugins y vamos añadiendo al array el nombre de cada uno que encuentra
        resultado.push(navigator.plugins[i].name);
    return resultado;
}

/*
comprueba si hay algún plugin de bloqueo de anuncios. Al cargar la página tenemos un documento con nombre ad_banner.js que al cargarse
pone a false la variable de window.adblockenabled, por lo que no estaria instalado adblock. pero si el plugin si lo está no deja
ejecutarse ese js y la variable no cambia de estado, por lo que se queda en true y si está instalado el adblock
 */
function adblock() {
    var salida;
    if (window.adblockEnabled)
        salida = new Array("AdBlock activado", "adblock", true);
    else
        salida = new Array("AdBlock activado", "adblock", false);
    return salida;
}

/*
Obtiene la version de Flash instalada en el caso de que Flash esté instalado
 */
function getFlashVersion(){
    var resultado = null;
    for(var i = 0 ; i < navigator.mimeTypes.length; i++) {
        if (navigator.mimeTypes[i].enabledPlugin.name == "Shockwave Flash")//comprueba que flash esté en el navegador
            resultado = navigator.mimeTypes[i].enabledPlugin.version;
    }
    return new Array("Versión de flash instalada", "flash", resultado);
}

/*
Devuelve el array con todos los resultados de comprobaciones de plugins
 */
function arrayPlugins(){
    var salida = new Array();
    salida.push(plugins());
    salida.push(getFlashVersion());
    salida.push(adblock());
    return salida;
}

/*
listaPlugins es la lista de plugins encontrados
Lo que hace la funcion es ordenar los plugins, pasarlos a minúscula y concatenarlos en un string que enviaremos a servidor
 */
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

/*
lista plugins es la lista de resultados obtenidos de comprobar los plugins
pinta la tabla html que muestra los resultados de los plugins
 */
function resultadoPlugins(listaPlugins) {
    var valorFlash;
    var salida = "";
    if (listaPlugins[1][2] != null)
        valorFlash = listaPlugins[1][2];
    else
        valorFlash = "Flash no disponible";
    salida += "<table><tr><th colspan='3'>Plugins</th></tr><th>Formatos</th><th>Similaridad</th><th>Valor</th>" + //aqui hay que meter css a la tabla
        "<tr><td>Plugins disponibles</td><td id='resumenPlugins'><img class='cargando' src='img/animated.png'></td><td>"; //id='ratioPlugin'
    for(var i = 0 ; i < listaPlugins[0].length ; i++)
        salida += "<p>" + listaPlugins[0][i] + "</p>";//no se si esta bien una p en una tabla
    salida += "</td></tr>" +
        "<tr><td colspan='2'>Plugins totales instalados</td><td>" + listaPlugins[0].length + "</td></tr>" +
        "<tr><td colspan='2'>"+listaPlugins[1][0]+"</td><td>"+valorFlash+"</td></tr>" +
        "<tr><td colspan='2'>"+listaPlugins[2][0]+"</td><<td>"+listaPlugins[2][2]+"</td></tr>" +
        "</table>";
    return salida;
}