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

// function permiso(){
   // var result = navigator.permissions.query({name:'geolocation'});
		
		// return result;
     
// }
// async function permiso2(){
	// const result = await permiso();

	// return new Array("geo","geo", result.state);
// }
	


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
    return salida;
}
