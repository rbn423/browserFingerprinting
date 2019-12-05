function locationBar(){
    return new Array("locationBar", window.locationbar.visible);
}

function pixelRatio(){
    return new Array("pixelRatio", window.devicePixelRatio);
}

function menuBar() {
    return new Array("menuBar", window.menubar.visible);
}

function personalBar() {
    return new Array("personalBar", window.personalbar.visible);
}

function statusBar() {
    return new Array("statusBar", window.statusbar.visible);
}

function toolBar() {
    return new Array("toolBar", window.toolbar.visible);
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