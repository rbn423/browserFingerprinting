function locationBar(){
    return window.locationbar.visible;
}

function pixelRatio(){
    return window.devicePixelRatio;
}

function menuBar() {
    return  window.menubar.visible;
}

function personalBar() {
    return window.personalbar.visible;
}

function statusBar() {
    return window.statusbar.visible;
}

function toolBar() {
    return window.toolbar.visible;
}

function resultadoWindow() {
    var salida = "";
    salida += "- Barra de localizacion visible = " + locationBar() + "<br/>";
    salida += "- Ratio de pixels del dispositivo = " + pixelRatio() +"<br/>";
    salida += "- Barra de menu visible = " + menuBar() + "<br/>";
    salida += "- Barra personal visible = " + personalBar() + "<br/>";
    salida += "- Barra de estado visible = " + statusBar() + "<br/>";
    salida += "- Barra de herramientas visible = " + toolBar() + "<br/>";
    return salida;
}