function nombreNavegadorYVersion() {
    //hay que mirar que este código tenga licencia libre, sino hay que hacerlo de otra forma
    var array = new Array();
    var salida = function (){var ua= navigator.userAgent, tem,
        M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if(/trident/i.test(M[1])){
        tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
        return 'IE '+(tem[1] || '');
    }
    if(M[1]=== 'Chrome'){
        tem= ua.match(/\b(OPR|Edg|Edge)\/(\d+)/);
        if(tem!= null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
    }
    M= M[2]? [M[1] + " " + M[2]]: [navigator.appName, navigator.appVersion, '-?'];
    if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
    return M;};
    if (navigator.brave && navigator.brave.isBrave() || false) //https://www.ctrl.blog/entry/brave-user-agent-detection.html
        var navegador = "Brave";
    else {
        navegador = salida().toString();
        var version = navegador.split(" ").pop();
        navegador = navegador.split(" ").slice(0, -1).join(" ");
        if (navegador == "Edg")
            navegador = "Edge-Chromium";
    }
    array.push(new Array("Navegador", "navegador", navegador));
    array.push(new Array("Versión", "version", version));
    return array;
}

function bateria() {
    var salida;
    //comprueba que se puede ejecutar la funcion getBattery
    if(typeof navigator.getBattery === 'function')
        salida = true ;
    else
        salida = false;
    return new Array("Se puede obtener información de la bateria","bateria",salida);
}

function concurrenciaHardware() {
    return new Array("Concurrencia hardware", "hardwareConcurrency", navigator.hardwareConcurrency);
}

function lenguajes() {
    var lenguajes = navigator.languages;
    var salida = "";
    for (var i in lenguajes) {
        salida += lenguajes[i];
        if (i < lenguajes.length - 1)
            salida += " // " ;
    }
    return new Array("Lenguajes soportados", "lenguajes", salida);
}

function buildId() {
    return new Array("Build ID de navigator", "buildId", navigator.buildID);
}

function doNotTrack() {
    return new Array("Do-not-track Javascript","DNTJS",navigator.doNotTrack);
}

function puntosTactiles() {
    return new Array("Número máximo de puntos táctiles soportados","touchpoints",navigator.maxTouchPoints);
}

function producto() {
    return new Array("Motor del navegador","product",navigator.product);
}

function dispositivos(){
    var salida = new Array();
    //esta parte se ejecuta de forma asíncrona si se puede ejecutar el método
    if (navigator.mediaDevices && navigator.mediaDevices.enumerateDevices) {
        navigator.mediaDevices.enumerateDevices().then(function (devices) {
                devices.forEach(function (device) {
                    salida.push(new Array(device.kind, device.deviceId));//el device ID varia en cada lanzamiento para edge
                });
                arrayDispositivos(salida);
                asincroniaDispositivos(salida,id);
            })
    }//a lo mejor habria que capturar si ocurre un error en la asincronia
    //sino se ejecuta directamente para un array vacio.
    else
        arrayDispositivos(salida);
}

function sistemaOperativo() {
    return new Array("Sistema operativo", "os", navigator.oscpu); //solo funciona en firefox
}

function vendedor() {
    return new Array("Vendedor", "vendor", navigator.vendor);
}

function plataforma() {
    return new Array("Plataforma","plataforma", navigator.platform);
}

function userAgent() {
    return new Array("User-Agent en javascript","userAgentJS", navigator.userAgent);
}

function cookieEnabled() {
    return new Array("Cookies habilitadas","cookieEnabled", navigator.cookieEnabled);
}

function language() {
    return new Array("Lenguaje","language", navigator.language);
}

function onLine() {
    return new Array("Navegador en linea","onLine", navigator.onLine);
}

function appName() {
    return new Array("AppName","appName", navigator.appName);
}

function productSub() {
    return new Array("Product sub", "productSub", navigator.productSub);
}

function memoriaDispositivo(){
    return new Array("Memoria del dipositivo (GB)", "devMemory", navigator.deviceMemory);
}

function arrayNavigator(){
    var salida = new Array();
    var navegadorVersion = nombreNavegadorYVersion(); //sacamos un array con dos valores, el navegador y la version
    salida.push(navegadorVersion[0]);//hacemos push del navegador y de la version del navegador
    salida.push(navegadorVersion[1]);
    salida.push(plataforma());
    salida.push(userAgent());
    salida.push(cookieEnabled());
    salida.push(language());
    salida.push(lenguajes());
    salida.push(onLine());
    salida.push(appName());
    salida.push(bateria());
    salida.push(doNotTrack());
    salida.push(puntosTactiles());
    salida.push(producto());
    salida.push(productSub());
    salida.push(sistemaOperativo());
    salida.push(vendedor());
    salida.push(concurrenciaHardware());
    salida.push(buildId());
    salida.push(memoriaDispositivo());
    return salida;
}

function arrayDispositivos(listaDispositivos) {
    var salida ="<table><tr><th colspan='2'>Lista de dispositivos del equipo</th></tr><th>Dispositivo</th><th>Valor</th>";
    for (var i in listaDispositivos)
        salida += "<tr><td>"+listaDispositivos[i][0]+"</td><td>"+listaDispositivos[i][1]+"</td></tr>";
    document.getElementById("dispositivos").innerHTML = salida;
}