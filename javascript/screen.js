function width() {
    return new Array("Ancho de la pantalla","screenWidth", screen.width);
}

function height() {
    return new Array("Altura de la pantalla","screenHeight",screen.height);
}

function availWidth() {
    return new Array("Ancho de pantalla disponible","screenAvailWidth", screen.availWidth);
}

function availHeight() {
    return new Array("Altura de pantalla disponible","screenAvailHeight",screen.availHeight);
}

function colorDepth() {
    return new Array("Profundidad de color de la pantalla","screenColorDepth",screen.colorDepth);
}

function pixelDepth() {
    return new Array("Profundidad de color en pixels de la pantalla","screenPixelDepth",screen.pixelDepth);
}

function arrayScreen(){
    var salida = new Array();
    salida.push(width());
    salida.push(height());
    salida.push(availWidth());
    salida.push(availHeight()) ;
    salida.push(colorDepth());
    salida.push(pixelDepth());
    return salida;
}