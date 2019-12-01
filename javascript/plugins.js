function pluggins() {
    var x=navigator.plugins.length; // store the total no of plugin stored
    var txt="Total plugin installed: "+x+"<br/>";
    txt+="Available plugins are->"+"<br/>";
    for(var i=0;i<x;i++)
    {
        txt+=navigator.plugins[i].name+ "<br/>";
        //+= " descripcion: " + navigator.plugins[i].description + "<br/>";
    }
    return txt;
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

function resultadoPluggins() {
    var salida = "";
    salida += pluggins();
    return salida;
}