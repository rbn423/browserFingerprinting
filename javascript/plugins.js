function plugins() {
    var x=navigator.plugins.length; // store the total no of plugin stored
    var resultado = new Array();
    //var txt="Total plugin installed: "+x+"<br/>";
    //txt+="Available plugins are->"+"<br/>";
    for(var i=0;i<x;i++)
        resultado.push(navigator.plugins[i].name);
    return resultado;
}

//Esta funcion no va!!!!
function flash() {
    var txt;
    if (pluginlist.indexOf("Flash")=== -1){
        txt="NO tienes flash intalado";
    }
    else{
        txt="SI tienes flash intalado";
    }
    return txt;
}

function resultadoPlugins(listaPlugins) {
    var salida = "<table border='visible'><tr><th colspan='2'>Plugins</th></tr>" + //aqui hay que meter css a la tabla
        "<tr><td>Plugins disponibles</td><td>";
    for(var i = 0 ; i < listaPlugins.length ; i++)
        salida += "<p>" + listaPlugins[i] + "</p>";//no se si esta bien una p en una tabla
    salida += "</td></tr>" +
        "<tr><td>Plugins totales instalados</td><td align='center'>" + listaPlugins.length + "</td></tr>" +
        "</table>";
    return salida;
}