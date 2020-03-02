function plugins() {
    var x=navigator.plugins.length; // store the total no of plugin stored
    var resultado = new Array();
    //var txt="Total plugin installed: "+x+"<br/>";
    //txt+="Available plugins are->"+"<br/>";
    for(var i=0;i<x;i++)
        resultado.push(navigator.plugins[i].name);
    return resultado;
}
/*
function getFlashVersion(){
    var resultado = "";
    var flash = navigator.plugins.namedItem('Shockwave Flash');
    if (typeof flash != 'object') {
        // flash is not present
        return undefined;
    }
    if(flash.version){
            resultado = flash.version;
    }
    return new Array("Versión de flash instalada", "flash", resultado);
}*/

function getFlashVersion() {
    var flashy = navigator.plugins.namedItem("Shockwave Flash")
    return new Array("Versión de flash instalada", "flash", flashy.description);
}

function arrayPlugins(){
    var salida = new Array();
    salida.push(plugins());
    salida.push(getFlashVersion());
    return salida;
}

function resultadoPlugins(listaPlugins) {
    var salida = "<table border='visible'><tr><th colspan='2'>Plugins</th></tr>" + //aqui hay que meter css a la tabla
        "<tr><td>Plugins disponibles</td><td>";
    for(var i = 0 ; i < listaPlugins[0].length ; i++)
        salida += "<p>" + listaPlugins[0][i] + "</p>";//no se si esta bien una p en una tabla
    salida += "</td></tr>" +
        "<tr><td>Plugins totales instalados</td><td align='center'>" + listaPlugins[0].length + "</td></tr>" +
        "<tr><td>"+listaPlugins[1][0]+"</td><td>"+listaPlugins[1][2]+"</td></tr>" +
        "</table>";
    return salida;
}