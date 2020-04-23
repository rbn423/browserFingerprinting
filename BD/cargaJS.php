<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];
$count = 1;

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los elementos JS
$query = "UPDATE `atributos` SET " ;
echo "Elemento obtenidos mediante JS: ".count($_POST);//borrar mas adelante, de momento nos interesa saber si aparece algun elemento mas en el array
foreach($_POST as $nombre_campo => $valor){
    if ($nombre_campo != "ID") {
        $query .= "`" . $nombre_campo;
        if ($nombre_campo == "canvas"){
            $valor = md5($valor); //32 bytes
        }
        if ($valor == "true" || $valor == "false")
            $query .= "`=" . $valor;
        else
            $query .= "`='" . $valor . "'";
        if ($count < count($_POST) - 1)
            $query .= ",";
        $count++;
    }
}
$query .= " WHERE `ID` = '".$id."'";
$conn->query($query);

//Estas querys hay que cambiarla en el caso de que añadamos algún campo a la tabla o lo eliminemos, ya que son muy especificas
//se obtienen con el generador automatico de MySql y le eliminamos la fecha y el id que es lo unico que no queremos
//QUERY DE ATRIBUTOS
$query = "SELECT `Accept`, `AcceptLanguage`, `UpgradeInsecureRequests`, `UserAgent`, `AcceptEncoding`, `Connection`, 
    `SecFetchMode`, `SecFetchUser`, `SecFetchSite`, `DNT`, `plataforma`, `userAgentJS`, `navegador`, `version`, 
    `cookieEnabled`, `language`, `onLine`, `appName`, `zonaHoraria`, `screenWidth`, `screenHeight`, `screenAvailWidth`, 
    `screenAvailHeight`, `screenColorDepth`, `screenPixelDepth`, `locationBar`, `pixelRatio`, `menuBar`, `personalBar`, 
    `statusBar`, `toolBar`, `localStorage`, `sessionStorage`, `windowResults`, `indexDB`, `bateria`, `DNTJS`, 
    `touchpoints`, `product`, `productSub`, `os`, `vendor`, `hardwareConcurrency`, `lenguajes`, `buildId`, `devMemory`, 
    `flash`, `canvas`, `resumenFuentes`, `resumenPlugins` FROM `atributos` WHERE id = ". $id;
$resultado = $conn->query($query);
$resultadoAtributos = $resultado->fetch_assoc();

//QUERY DE LOS FORMATOS DE AUDIO
$query = "SELECT `ogg-vorbis`, `ogg-opus`, `3gpp`, `mp4-mp4a`, `mp4-mp3`, `mp4-ac3`, `mp4-ec3`, `acc`, `pcm`, 
    `mpeg`, `flac`, `wave`, `webm-vorbis`, `mp3-mp3` FROM `formatosaudio` WHERE id = ".$id;
$resultado = $conn->query($query);
$resultadoAudio = $resultado->fetch_assoc();

//QUERY DE LOS FORMATOS DE VIDEO
$query = "SELECT `ogg-theora`, `ogg-vorbis`, `ogg-opus`, `mp4-avc1`, `mp4-mp4a`, `mp4-flac`, `webm-vp8`, `webm-vp9`,
    `webm-vorbis` FROM `formatosvideo` WHERE id = ".$id;
$resultado = $conn->query($query);
$resultadoVideo = $resultado->fetch_assoc();

//QUERY DE BUSQUE DE TODOS LOS ELEMENTOS QUE COINCIDAN CON LOS DEL NAVEGADOR ACTUAL
$query = "SELECT count(*) FROM ((SELECT * FROM atributos)a JOIN (SELECT * FROM formatosaudio)b USING (id)) JOIN 
    (SELECT * FROM formatosvideo)c USING (id) WHERE ";
//ATRIBUTOS
foreach ($resultadoAtributos as $nombre=>$valor){
    if (is_null($valor))
        $query .= "a.`".$nombre."` is null";
    else
        $query .= "a.`".$nombre."` = '".$valor."'";
    $query .= " AND ";
}
//AUDIO
foreach ($resultadoAudio as $nombre=>$valor){
    if (is_null($valor))
        $query .= "b.`".$nombre."` is null";
    else
        $query .= "b.`".$nombre."` = '".$valor."'";
    $query .= " AND ";
}
//VIDEO
$count=0;
foreach ($resultadoVideo as $nombre=>$valor){
    if (is_null($valor))
        $query .= "c.`".$nombre."` is null";
    else
        $query .= "c.`".$nombre."` = '".$valor."'";
    if ($count < count($resultadoVideo) - 1)
        $query .= " AND ";
    $count++;
}

$resultado = $conn->query($query);
$resultado = $resultado->fetch_all();
echo "<p>Existen ".($resultado[0][0]-1)." browserFingerPrint como el tuyo en nuestra base de datos</p>";
?>