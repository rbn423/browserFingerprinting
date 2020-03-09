function nombreNavegador() {
    //hay que mirar que este código tenga licencia libre, sino hay que hacerlo de otra forma
    var array = new Array(2);
    var salida = function (){var ua= navigator.userAgent, tem,
        M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if(/trident/i.test(M[1])){
        tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
        return 'IE '+(tem[1] || '');
    }
    if(M[1]=== 'Chrome'){
        tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
        if(tem!= null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
    }
    M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
    if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
    return M;}
    array[0] = "Navegador y versión"
    array[1] = "navegador";
    array[2] = salida();
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

// function permiso(){
   // var result = navigator.permissions.query({name:'geolocation'});
		
		// return result;
     
// }
// async function permiso2(){
	// const result = await permiso();

	// return new Array("geo","geo", result.state);
// }
	
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

// function NavigatorPrueba(){
	// var res;
	// res = arrayNavigator();
	// return res;
// }
// async function arrayNavigator(){
    // var salida = new Array();
	// var permiso = await permiso2();
    // salida.push(nombreNavegador());
    // salida.push(plataforma());
    // salida.push(userAgent());
    // salida.push(cookieEnabled());
    // salida.push(language());
    // salida.push(onLine());
    // salida.push(appName());
	// salida.push(permiso);
	// salida.push(bateria());
    // return salida;
// }
function arrayNavigator(){
    var salida = new Array();
    salida.push(nombreNavegador());
    salida.push(plataforma());
    salida.push(userAgent());
    salida.push(cookieEnabled());
    salida.push(language());
    salida.push(onLine());
    salida.push(appName());
    salida.push(bateria());
    salida.push(doNotTrack());
    salida.push(puntosTactiles());
    salida.push(producto());
    salida.push(sistemaOperativo());
    salida.push(vendedor());
    salida.push(concurrenciaHardware());
    return salida;
}

function arrayDispositivos(listaDispositivos) {
    var salida ="<table border='visible'><th colspan='3'>Lista de dispositivos del equipo</th>"; //css por aqui
    for (var i in listaDispositivos)
        salida += "<tr><td>"+listaDispositivos[i][0]+"</td><td>"+listaDispositivos[i][1]+"</td></tr>";
    document.getElementById("dispositivos").innerHTML = salida;
}