<?php
require_once(dirname(__DIR__)."/comun/config.php");

class DescElemento
{
    private static $descripciones =[
        //Descripciones de cabeceras http
        "Connection" => "Controla si la conexión de red permanece abierta o no una vez finaliza la transacción actual",
        "DNT" => "Indica la preferencia de seguimiento del usuario",
        "UpgradeInsecureRequests" => "Indica la señal del cliente al servidor de obtener una respuesta autenticada y encriptada",
        "UserAgent" => "Cadena característica que permite identificar el protocolo de red, ayudando a descubrir el tipo de aplicación o SO",
        "Accept" => "Informa al servidor sobre los diferentes tipos de datos que pueden enviarse de vuelta",
        "SecFetchSite" => "Indica la relación entre el origen de la petición y el origen del recurso",
        "SecFetchMode" => "Indica el modo de la petición",
        "SecFetchUser" => "Indica si una solicitud de navegación fue activada o no por el usuario",
        "AcceptEncoding" => "Indica la codificación del contenido que puede entender el cliente",
        "AcceptLanguage" => "Indica que lenguajes es capaz de entender el cliente",
        //descripciones de elementos javascript
        
    ];

    public static function getDescripcion($clave){
        if (array_key_exists($clave,self::$descripciones))
            return self::$descripciones[$clave];
        else
            return "";
    }
}