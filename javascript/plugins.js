function plugins() {
    var x=navigator.plugins.length; // store the total no of plugin stored
    var resultado = new Array();
    //var txt="Total plugin installed: "+x+"<br/>";
    //txt+="Available plugins are->"+"<br/>";
    for(var i=0;i<x;i++)
        resultado.push(navigator.plugins[i].name);
    return resultado;
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
    return salida;
}

function resultadoPlugins(listaPlugins) {
    var valorFlash;
    if (listaPlugins[1][2] != null)
        valorFlash = listaPlugins[1][2];
    else
        valorFlash = "Flash no disponible";
    var salida = "<table border='visible'><tr><th colspan='2'>Plugins</th></tr>" + //aqui hay que meter css a la tabla
        "<tr><td>Plugins disponibles</td><td>";
    for(var i = 0 ; i < listaPlugins[0].length ; i++)
        salida += "<p>" + listaPlugins[0][i] + "</p>";//no se si esta bien una p en una tabla
    salida += "</td></tr>" +
        "<tr><td>Plugins totales instalados</td><td align='center'>" + listaPlugins[0].length + "</td></tr>" +
        "<tr><td>"+listaPlugins[1][0]+"</td><td>"+valorFlash+"</td></tr>" +
        "</table>";
    return salida;
}