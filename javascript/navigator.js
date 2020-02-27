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

/*Hay que comprobar que es util y funciona bien
function bateria() {
    let batteryIsCharging = false;
    let batteryChargingTime;
    let batteryDischargingTime;
    let batteryLevel;
    let salida = "";
    var re = /(chrome|opera|webview android|samsung)/i;
    if (re.test(nombreNavegador())) {
        navigator.getBattery().then(function (battery) {
            batteryIsCharging = battery.charging;
            batteryChargingTime = battery.chargingTime;
            batteryDischargingTime = battery.dischargingTime;
            batteryLevel = battery.level;
        });
    }
    else
        return "- Bateria = No se puede comprobar la bateria en este navegador<br/>";
    salida += "- La bateria se esta cargando = " + batteryIsCharging + "<br/>";
    salida += "- Tiempo de carga de la bateria = " + batteryChargingTime + "<br/>";
    salida += "- Tiempo de descarga de la bateria = " + batteryDischargingTime + "<br/>";
    salida += "- Nivel de bateria = " + batteryLevel + "<br/>";
    return salida;
}
*/

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

function arrayNavigator(){
    var salida = new Array();
    salida.push(nombreNavegador());
    salida.push(plataforma());
    salida.push(userAgent());
    salida.push(cookieEnabled());
    salida.push(language());
    salida.push(onLine());
    salida.push(appName());
    return salida;
}