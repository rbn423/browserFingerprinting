<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];
$count = 1;

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los elementos JS
$query = "UPDATE `atributos` SET " ;
//echo "Elemento obtenidos mediante JS: ".count($_POST);//borrar mas adelante, de momento nos interesa saber si aparece algun elemento mas en el array
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


//Conseguir el número total de registros en la tabla, lo usaremos luego para calcular el porcentaje de similaridad para cada atributo.
$query_total = "SELECT count(*) FROM atributos";
$total_reg = $conn->query($query_total);
$total_reg = $total_reg->fetch_all();

//Lo usaremos para devolver el JSON
$arrayRatio = array();

//ATRIBUTOS
foreach ($resultadoAtributos as $nombre=>$valor){

    $query_ratio = "SELECT count(*) FROM `atributos` WHERE ";

    //Linea comentada para hacer el porcentaje en SQL
    //$query_ratio = "SELECT ROUND ( (SELECT 100 * count(*) FROM `atributos` WHERE ";

    if (is_null($valor)){
        $query .= "a.`".$nombre."` is null";
        $query_ratio .= "`".$nombre."` is null";
    }
    else {
        $query .= "a.`" . $nombre . "` = '" . $valor . "'";
        $query_ratio .= "`".$nombre . "` = '" . $valor . "'";

        //La linea comentada es para sacar el ratio desde SQL
        //$query_ratio .= "`".$nombre . "` = '" . $valor . "'".") / (SELECT count(*) FROM `atributos` WHERE `" .$nombre ."` IS NOT NULL), 2)";
    }
    $query .= " AND ";

    //Sacar la similaridad por cada elemento
    $single_ratio = $conn->query($query_ratio);
    $single_ratio = $single_ratio->fetch_all();


    $ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
    $ratio = round($ratio, 2);
    $arrayRatio += [$nombre => $ratio."%"];

    //Para hacer el porcentaje mediante SQL
    //$arrayRatio += [$nombre => $single_ratio[0][0]];
}
//AUDIO
foreach ($resultadoAudio as $nombre=>$valor){

    $query_ratio = "SELECT count(*) FROM `atributos` WHERE ";

    //Linea comentada para hacer el porcentaje en SQL
    //$query_ratio = "SELECT ROUND ( (SELECT 100 * count(*) FROM `atributos` WHERE ";

    if (is_null($valor)){
        $query .= "b.`".$nombre."` is null";
        $query_ratio .= "`".$nombre."` is null";
    }
    else{
        $query .= "b.`".$nombre."` = '".$valor."'";
        $query_ratio .= "`".$nombre . "` = '" . $valor . "'";

        //La linea comentada es para sacar el ratio desde SQL
        //$query_ratio .= "`".$nombre . "` = '" . $valor . "'".") / (SELECT count(*) FROM `atributos` WHERE `" .$nombre ."` IS NOT NULL), 2)";
    }
    $query .= " AND ";

    //Sacar la similaridad por cada elemento
    //$single_ratio = $conn->query($query_ratio);
    //$single_ratio = $single_ratio->fetch_all();


    //$ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
    //$ratio = round($ratio, 2);
    $arrayRatio += ["audio-".$nombre => $ratio."%"];

    //Para hacer el porcentaje mediante SQL
    //$arrayRatio += ["audio-".$nombre => $single_ratio[0][0]];
}
//VIDEO
$count=0;
foreach ($resultadoVideo as $nombre=>$valor){

    $query_ratio = "SELECT count(*) FROM `atributos` WHERE ";

    //Linea comentada para hacer el porcentaje en SQL
    //$query_ratio = "SELECT ROUND ( (SELECT 100 * count(*) FROM `atributos` WHERE ";

    if (is_null($valor)) {
        $query .= "c.`" . $nombre . "` is null";
        $query_ratio .= "`" . $nombre . "` is null";
    }
    else{
        $query .= "c.`".$nombre."` = '".$valor."'";
        $query_ratio .= "`".$nombre . "` = '" . $valor . "'";

        //La linea comentada es para sacar el ratio desde SQL
        //$query_ratio .= "`".$nombre . "` = '" . $valor . "'".") / (SELECT count(*) FROM `atributos` WHERE `" .$nombre ."` IS NOT NULL), 2)";
    }
    if ($count < count($resultadoVideo) - 1)
        $query .= " AND ";
    $count++;

    //Sacar la similaridad por cada elemento
    //$single_ratio = $conn->query($query_ratio);
    //$single_ratio = $single_ratio->fetch_all();

    //$ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
    //$ratio = round($ratio, 2);
    $arrayRatio += ["video-".$nombre => $ratio."%"];

    //Para hacer el porcentaje mediante SQL
    //$arrayRatio += ["video-".$nombre => $single_ratio[0][0]];

}

// Conseguimos la unicidad total
$resultado = $conn->query($query);
$resultado = $resultado->fetch_all();

//Añadimos la unicidad total al JSON
$porcentajeUnicidad = round((($total_reg[0][0]-$resultado[0][0]+1)/$total_reg[0][0])*100,2);
$arrayRatio += ["resultadoJS" => "Hay ".($resultado[0][0]-1)." browserFingerPrint como el tuyo de ".$total_reg[0][0]." en nuestra base de datos. (".$porcentajeUnicidad."% único)"];

//Devolvemos el JSON tanto con el similarity ratio individual como con la unicidad total en la ultima clave del JSON.
echo json_encode($arrayRatio);
?>