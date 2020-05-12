var descripcionesJS = {
    "navegador" : "Nombre del navegador obtenido mediante el tratamiento del User-Agent",
    "version" : "Versión del navegador obtenida mediante el tratamiento del User-Agent",
    "plataforma" : "Indica para que plataforma está compilado el navegador",
    "userAgentJS" : "Cadena característica que permite identificar el protocolo de red, ayudando a descubrir el tipo de aplicación o SO",
    "cookieEnabled" : "Indica si el navegador tiene habilitadas las cookies por defecto",
    "language" : "Versión del lenguaje del navegador",
    "lenguajes" : "Lenguajes aceptados por el navegador en orden de preferencia",
    "onLine" : "Indica si el navegador está en linea o no",
    "appName" : "Indica el nombre del navegador. Por lo general todos los navegadores modernos retornan el valor 'Netscape'",
    "bateria" : "Indica si se puede acceder a la información de la bateria",
    "DNTJS" : "Indica la preferencia de seguimiento del usuario",
    "touchpoints" : "Máximo de puntos tactiles en contacto simultaneamente soporta el dispositivo actual",
    "product" : "Motor de navegación",
    "productSub" : "Numero de compilación del navegador actual",
    "os" : "Sistema operativo. Solo funciona en Firefox",
    "vendor" : "Este valor puede ser Google Inc., Apple Computer, Inc. o ninguno en el caso de Firefox",
    "hardwareConcurrency" : "Número de procesadores lógicos disponibles para ejecutar subprocesos en la computadora del usuario",
    "buildId" : "Identificador de compilación del navegador. En los navegadores modernos, esta propiedad devuelve una marca de tiempo fija como medida de privacidad",
    "devMemory" : "Cantidad aproximada de memoria del dispositivo en GB. Los límites superior e inferior se utilizan para proteger la privacidad de los propietarios de dispositivos de gama muy baja o alta",
    "zonaHoraria" : "Desplazamiento de zona horaria en minutos para la configuración regional actual. Es la diferencia de minutos entre la hora media de Greenwich(GTM) la hora relativa local",
    "screenWidth" : "Ancho de la pantalla del usuario en pixels",
    "screenHeight" : "Alto de la pantalla del usuario en pixels" ,
    "screenAvailWidth" : "Ancho de la pantalla del usuario en pixels, a excepción de los elementos de interfaz como la barra de tareas",
    "screenAvailHeight" : "Alto de la pantalla del usuario en pixels, a excepción de los elementos de interfaz como la barra de tareas",
    "screenColorDepth" : "Número de bits utilizados para definir un color",
    "screenPixelDepth" : "Número de bits utilizados para definir la profundidad de pixels de la pantalla",
    "locationBar" : "Indica si la barra de localización está activada",
    "pixelRatio" : "Relación de tamaño (vertical) de un pixel físico en el dispositivo de visualización actual respecto del de un dispositivo de tamaño de pixel independiente (dips)",
    "menuBar" : "Indica si la barra de menú está activada",
    "personalBar" : "Indica si la barra personal está activada",
    "statusBar" : "Indica si la barra de estado está activada",
    "toolBar" : "Indica si la barra de tareas está activada",
    "localStorage" : "Indica si los datos persisten almacenados entre de las diferentes sesiones de navegación",
    "sessionStorage" : "Indica si se almacena la información de la sesión. La información almacenada en sessionStorage es eliminada al finalizar la sesion de la página",
    "indexDB" : "Es una manera de almacenar datos dentro del navegador del usuario. Debido a que permite la creación de aplicaciones con habilidades de consulta enriquecidas, con independencia de la disponibilidad de la red",
    "windowResults" : "Indica si está disponible el objeto results de window para este navegador",
    "canvas" : "Pintamos un objeto canvas que será diferente dependiendo del equipo y navegador"
};

/*
clave del elemento de que queremos conocer la información
Devolvemos la descrición del elemento pedido
 */
function getDescripcionJS(clave) {
    return descripcionesJS[clave];
}