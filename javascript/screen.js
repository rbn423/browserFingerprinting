function width() {
    return screen.width;
}

function height() {
    return screen.height;
}

function availWidth() {
    return screen.availWidth
}

function availHeight() {
    return screen.availHeight;
}

function colorDepth() {
    return screen.colorDepth;
}

function pixelDepth() {
    return screen.pixelDepth;
}

function resultadoScreen(){
    var salida = "";
    salida += "- Anchura de la pantalla = " + width() + "<br/>" ;
    salida += "- Altura de la pantalla = " + height() + "<br/>" ;
    salida += "- Anchura de la pantalla eficaz = " + availWidth() + "<br/>" ;
    salida += "- Altura de la pantalla eficaz = " + availHeight() + "<br/>" ;
    salida += "- Profundidad de color = " + colorDepth() + "<br/>" ;
    salida += "- Profundidad de pixels = " + pixelDepth() + "<br/>" ;
    return salida;
}