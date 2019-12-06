function locationBar(){
    return new Array("Barra de localizacion visible","locationBar", window.locationbar.visible);
}

function pixelRatio(){
    return new Array("Ratio de pixels","pixelRatio", window.devicePixelRatio);
}

function menuBar() {
    return new Array("Barra de menú visible","menuBar", window.menubar.visible);
}

function personalBar() {
    return new Array("Barra personal visible","personalBar", window.personalbar.visible);
}

function statusBar() {
    return new Array("Barra de estado visible","statusBar", window.statusbar.visible);
}

function toolBar() {
    return new Array("Barra de herramientas visible","toolBar", window.toolbar.visible);
}

function arrayWindow() {
    var salida = new Array();
    salida.push(locationBar());
    salida.push(pixelRatio());
    salida.push(menuBar());
    salida.push(personalBar());
    salida.push(statusBar());
    salida.push(toolBar());
    return salida;
}