function width() {
    return new Array("screenWidth", screen.width);
}

function height() {
    return new Array("screenHeight",screen.height);
}

function availWidth() {
    return new Array("screenAvailWidth", screen.availWidth);
}

function availHeight() {
    return new Array("screenAvailHeight",screen.availHeight);
}

function colorDepth() {
    return new Array("screenColorDepth",screen.colorDepth);
}

function pixelDepth() {
    return new Array("screenPixelDepth",screen.pixelDepth);
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