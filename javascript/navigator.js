function navegador() {
    //hay que mirar que este código tenga licencia libre, sino hay que hacerlo de otra forma
    var ua= navigator.userAgent, tem,
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
    return M;
}

function bateria() {
    let batteryIsCharging = false;
    let batteryChargingTime;
    let batteryDischargingTime;
    let batteryLevel;
    let salida = "";
    var re = /(chrome|opera|webview android|samsung)/i;
    if (re.test(navegador())) {
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

function plataforma() {
    return navigator.platform;
}

function userAgent() {
    return navigator.userAgent;
}

function cookieEnabled() {
    return navigator.cookieEnabled;
}

function language() {
    return navigator.language;
}

function onLine() {
    return navigator.onLine;
}

function appName() {
    return navigator.appName;
}

/* funciones de la bateria por implementar
//salida += "- Bateria = " + navigator.getBattery() + "<br/>" ;
//salida += "- Bateria = " + navigator.battery + "<br/>" ;
//salida += "- Bateria cargando = " + navigator.battery.charging + "<br/>" ;
//salida += "- Bateria charginTime = " + navigator.battery.chargingTime + "<br/>" ;
//salida += "- Bateria discharginTime = " + navigator.battery.dischargingTime + "<br/>" ;
//salida += "- Bateria level = " + navigator.battery.level + "<br/>" ;
 */

function resultadoNavigator() {
    var salida = "";
    salida += "-Navegador y version = " + navegador() + "<br/>";
    salida += "-Plataforma = " + plataforma() + "<br/>";
    salida += "- userAgent javascript = " + userAgent() + "<br/>";
    salida += "- cookies habilitadas = " + cookieEnabled() + "<br/>" ;
    salida += "- Lenguaje del navegador = " + language() + "<br/>" ;
    salida += "- Navegador en linea = " + onLine() + "<br/>" ;
    salida += "- Nombre en codigo de la app = " + appName() + "<br/>" ;
    salida +=  bateria();
    return salida;
}