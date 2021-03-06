<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];
$plataforma = $_POST["plataforma"];
$userAgentJS = $_POST["userAgentJS"];
$navegador = $_POST["navegador"];
$version = $_POST["version"];
$cookieEnabled = $_POST["cookieEnabled"];
$language = $_POST["language"];
$onLine = $_POST["onLine"];
$appName = $_POST["appName"];
$zonaHoraria = $_POST["zonaHoraria"];
$screenWidth = $_POST["screenWidth"];
$screenHeight = $_POST["screenHeight"];
$screenAvailWidth = $_POST["screenAvailWidth"];
$screenAvailHeight = $_POST["screenAvailHeight"];
$screenColorDepth = $_POST["screenColorDepth"];
$screenPixelDepth = $_POST["screenPixelDepth"];
$locationBar = $_POST["locationBar"];
$pixelRatio = $_POST["pixelRatio"];
$menuBar = $_POST["menuBar"];
$personalBar = $_POST["personalBar"];
$statusBar = $_POST["statusBar"];
$toolBar = $_POST["toolBar"];
$localStorage = $_POST["localStorage"];
$sessionStorage = $_POST["sessionStorage"];
$windowResults = $_POST["windowResults"];
$indexDB = $_POST["indexDB"];
$bateria = $_POST["bateria"];
$DNTJS = $_POST["DNTJS"];
$touchpoints = $_POST["touchpoints"];
$product = $_POST["product"];
$productSub = $_POST["productSub"];
$os = $_POST["os"];
$vendor = $_POST["vendor"];
$hardwareConcurrency = $_POST["hardwareConcurrency"];
$lenguajes = $_POST["lenguajes"];
$buildId = $_POST["buildId"];
$devMemory = $_POST["devMemory"];
//$flash = $_POST["flash"];
$canvas = $_POST["canvas"];
$canvas = md5($canvas);
//$resumenFuentes = $_POST["resumenFuentes"];
//$resumenPlugins = $_POST["resumenPlugins"];

$count = 1;

$columnas_posibles = [
    'ID' => null,
    'plataforma'=> null,
    'userAgentJS'=> null,
    'navegador'=> null,
    'version'=> null,
    'cookieEnabled'=> null,
    'language'=> null,
    'onLine'=> null,
    'appName'=> null,
    'zonaHoraria' =>null,
    'screenWidth' =>null,
    'screenHeight' =>null,
    'screenAvailWidth' =>null,
    'screenAvailHeight' =>null,
    'screenColorDepth' =>null,
    'screenPixelDepth' =>null,
    'locationBar' =>null,
    'pixelRatio' =>null,
    'menuBar' =>null,
    'personalBar'=>null,
    'statusBar' =>null,
    'toolBar' =>null,
    'localStorage' =>null,
    'sessionStorage' =>null,
    'windowResults' =>null,
    'indexDB' =>null,
    'bateria' =>null,
    'DNTJS '=>null,
    'touchpoints' =>null,
    'product' =>null,
    'productSub' =>null,
    'os' =>null,
    'vendor' =>null,
    'hardwareConcurrency' =>null,
    'lenguajes' =>null,
    'buildId' =>null,
    'devMemory' =>null,
    'flash' =>null,
    'canvas' =>null,
    'resumenFuentes'=>null,
    'resumenPlugins'=>null
];

// Cogemos los valores de POST que coinciden con nuestra lista de columnas posibles
$columnas = array_intersect_key($_POST, $columnas_posibles);
// Comprobamos que están las columnas que deberían.
$columnas = array_merge($columnas_posibles, $columnas);

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//Insertamos en la base de datos los elementos JavaScript
$stmt = $conn->prepare("UPDATE `conexiones` SET `plataforma`=?, `userAgentJS`=?, `navegador`=?, `version`=?, 
    `cookieEnabled`=?, `language`=?, `onLine`=?, `appName`=?, `zonaHoraria`=?, `screenWidth`=?, `screenHeight`=?,
    `screenAvailWidth`=?, `screenAvailHeight`=?, `screenColorDepth`=?, `screenPixelDepth`=?, `locationBar`=?,
    `pixelRatio`=?, `menuBar`=?, `personalBar`=?, `statusBar`=?, `toolBar`=?, `localStorage`=?, `sessionStorage`=?,
    `windowResults`=?, `indexDB`=?, `bateria`=?, `DNTJS`=?, `touchpoints`=?, `product`=?, `productSub`=?, `os`=?,
    `vendor`=?, `hardwareConcurrency`=?, `lenguajes`=?, `buildId`=?, `devMemory`=?, `canvas`=? WHERE `ID` =?");
$stmt->bind_param("sssssssssssssssssssssssssssssssssssssi", $plataforma, $userAgentJS, $navegador, $version,
    $cookieEnabled, $language, $onLine, $appName, $zonaHoraria, $screenWidth, $screenHeight,
    $screenAvailWidth, $screenAvailHeight, $screenColorDepth, $screenPixelDepth, $locationBar, $pixelRatio,
    $menuBar, $personalBar, $statusBar, $toolBar, $localStorage, $sessionStorage, $windowResults, $indexDB,
    $bateria, $DNTJS, $touchpoints, $product, $productSub, $os, $vendor, $hardwareConcurrency, $lenguajes,
    $buildId, $devMemory, $canvas, $id);
$stmt->execute();
$stmt->close();

//QUERY DE Conexiones
$stmt = $conn->prepare("SELECT `Accept`, `AcceptLanguage`, `UpgradeInsecureRequests`, `UserAgent`, `AcceptEncoding`, `Connection`, 
    `SecFetchMode`, `SecFetchUser`, `SecFetchSite`, `DNT`, `plataforma`, `userAgentJS`, `navegador`, `version`, 
    `cookieEnabled`, `language`, `onLine`, `appName`, `zonaHoraria`, `screenWidth`, `screenHeight`, `screenAvailWidth`, 
    `screenAvailHeight`, `screenColorDepth`, `screenPixelDepth`, `locationBar`, `menuBar`, `personalBar`, 
    `statusBar`, `toolBar`, `localStorage`, `sessionStorage`, `windowResults`, `indexDB`, `bateria`, `DNTJS`, 
    `touchpoints`, `product`, `productSub`, `os`, `vendor`, `hardwareConcurrency`, `lenguajes`, `buildId`, `devMemory`, 
    `flash`, `canvas`, `resumenFuentes`, `resumenPlugins` FROM `conexiones` WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt -> store_result();
$stmt -> bind_result($Accept, $AcceptLanguage, $uir, $UserAgent, $AcceptEncoding, $Connection,
    $SecFetchMode, $SecFetchUser, $SecFetchSite, $DNT, $plataforma, $userAgentJS, $navegador, $version,
    $cookieEnabled, $language, $onLine, $appName, $zonaHoraria, $screenWidth, $screenHeight,
    $screenAvailWidth, $screenAvailHeight, $screenColorDepth, $screenPixelDepth, $locationBar,
    $menuBar, $personalBar, $statusBar, $toolBar, $localStorage, $sessionStorage, $windowResults, $indexDB,
    $bateria, $DNTJS, $touchpoints, $product, $productSub, $os, $vendor, $hardwareConcurrency, $lenguajes,
    $buildId, $devMemory, $flash, $canvas, $resumenFuentes, $resumenPlugins);
$stmt -> fetch();
$stmt->close();

//QUERY DE LOS FORMATOS DE AUDIO
$stmt = $conn->prepare("SELECT `ogg-vorbis`, `ogg-opus`, `3gpp`, `mp4-mp4a`, `mp4-mp3`, `mp4-ac3`, `mp4-ec3`, `acc`, `pcm`, 
    `mpeg`, `flac`, `wave`, `webm-vorbis`, `mp3-mp3` FROM `formatosaudio` WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt -> store_result();
$stmt -> bind_result($audio_ogg_vorbis, $audio_ogg_opus, $audio_3gpp, $audio_mp4_mp4a,
    $audio_mp4_mp3, $audio_mp4_ac3, $audio_mp4_ec3, $audio_acc, $audio_pcm, $audio_mpeg, $audio_flac ,
    $audio_wave, $audio_webm_vorbis, $audio_mp3_mp3);
$stmt -> fetch();
$stmt->close();

//QUERY DE LOS FORMATOS DE VIDEO
$stmt = $conn->prepare("SELECT `ogg-theora`, `ogg-vorbis`, `ogg-opus`, `mp4-avc1`, `mp4-mp4a`, `mp4-flac`, `webm-vp8`, `webm-vp9`,
    `webm-vorbis` FROM `formatosvideo` WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt -> store_result();
$stmt -> bind_result($video_ogg_theora, $video_ogg_vorbis, $video_ogg_opus, $video_mp4_avc1,
    $video_mp4_mp4a, $video_mp4_flac, $video_webm_vp8, $video_webm_vp9, $video_webm_vorbis);
$stmt -> fetch();
$stmt->close();

$resultadoConexiones= array("Accept"=>$Accept, "AcceptLanguage"=>$AcceptLanguage, "UpgradeInsecureRequests"=>$uir,
    "UserAgent"=>$UserAgent, "AcceptEncoding" => $AcceptEncoding, "Connection" => $Connection,
    "SecFetchMode" => $SecFetchMode, "SecFetchUser" => $SecFetchUser, "SecFetchSite" => $SecFetchSite, "DNT" => $DNT,
    "plataforma" => $plataforma, "userAgentJS" => $userAgentJS, "navegador" => $navegador, "version" => $version,
    "cookieEnabled" => $cookieEnabled, "language" => $language, "onLine" => $onLine, "appName" => $appName,
    "zonaHoraria" => $zonaHoraria, "screenWidth" => $screenWidth, "screenHeight" => $screenHeight,
    "screenAvailWidth" => $screenAvailWidth, "screenAvailHeight" => $screenAvailHeight,
    "screenColorDepth" => $screenColorDepth, "screenPixelDepth" => $screenPixelDepth,
    "locationBar" => $locationBar, "pixelRatio" => $pixelRatio, "menuBar" => $menuBar,
    "personalBar" => $personalBar, "statusBar" => $statusBar, "toolBar" => $toolBar,
    "localStorage" => $localStorage, "sessionStorage" => $sessionStorage,  "windowResults" => $windowResults,
    "indexDB" => $indexDB, "bateria" => $bateria, "DNTJS" => $DNTJS, "touchpoints" => $touchpoints,
    "product" => $product, "productSub" => $productSub,
    "os" => $os, "vendor" => $vendor, "hardwareConcurrency" => $hardwareConcurrency, "lenguajes" => $lenguajes,
    "buildId" => $buildId, "devMemory" => $devMemory, "flash" => $flash, "canvas" => $canvas,
    "resumenFuentes" => $resumenFuentes, "resumenPlugins" => $resumenPlugins);

$resultadoAudio= array("ogg-vorbis" => $audio_ogg_vorbis, "ogg-opus" => $audio_ogg_opus,
    "3gpp" => $audio_3gpp, "mp4-mp4a" => $audio_mp4_mp4a,
    "mp4-mp3" => $audio_mp4_mp3, "mp4-ac3" => $audio_mp4_ac3,
    "mp4-ec3" => $audio_mp4_ec3, "acc" => $audio_acc,
    "pcm" => $audio_pcm, "mpeg" => $audio_mpeg,
    "flac" => $audio_flac ,
    "wave" => $audio_wave, "webm-vorbis" => $audio_webm_vorbis,
    "mp3-mp3" => $audio_mp3_mp3);


$resultadoVideo = array("ogg-theora" => $video_ogg_theora, "ogg-vorbis" => $video_ogg_vorbis,
    "ogg-opus" => $video_ogg_opus, "mp4-avc1" => $video_mp4_avc1,
    "mp4-mp4a" => $video_mp4_mp4a, "mp4-flac" => $video_mp4_flac,
    "webm-vp8" => $video_webm_vp8, "webm-vp9" => $video_webm_vp9,
    "webm-vorbis" => $video_webm_vorbis);

//QUERY DE BUSQUE DE TODOS LOS ELEMENTOS QUE COINCIDAN CON LOS DEL NAVEGADOR ACTUAL
$query = "SELECT count(*) FROM ((SELECT * FROM conexiones)a JOIN (SELECT * FROM formatosaudio)b USING (id)) JOIN (SELECT * FROM formatosvideo)c USING (id) WHERE ";


//Conseguir el número total de registros en la tabla, lo usaremos luego para calcular el porcentaje de similaridad para cada atributo.
$query_total = "SELECT count(*) FROM conexiones";
$total_reg = $conn->query($query_total);
$total_reg = $total_reg->fetch_all();

//Lo usaremos para devolver el JSON
$arrayRatio = array();

//Conexiones
foreach ($resultadoConexiones as $nombre=>$valor){

    $query_ratio = "SELECT count(*) FROM `conexiones` WHERE ";

    if (is_null($valor)){
        $query .= "a.".$nombre." is null";
        $query_ratio .= "".$nombre." is null";
    }
    else {
        $query .= "a." . $nombre . " = '" . $valor . "'";
        $query_ratio .= "".$nombre . " = '" . $valor . "'";
    }
    $query .= " AND ";

    //Sacar la similaridad por cada elemento
    $single_ratio = $conn->query($query_ratio);
    $single_ratio = $single_ratio->fetch_all();


    $ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
    $ratio = round($ratio, 2);
    $arrayRatio += [$nombre => $ratio."%"];
}

//AUDIO
foreach ($resultadoAudio as $nombre=>$valor){

    $query_ratio = "SELECT count(*) FROM `formatosaudio` WHERE ";

    if (is_null($valor)){
        $query .= "b.`".$nombre."` is null";
        $query_ratio .= "`".$nombre."` is null";
    }
    else{
        $query .= "b.`".$nombre."` = '".$valor."'";
        $query_ratio .= "`".$nombre . "` = '" . $valor . "'";
    }
    $query .= " AND ";

    //Sacar la similaridad por cada elemento
    $single_ratio = $conn->query($query_ratio);
    $single_ratio = $single_ratio->fetch_all();

    $ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
    $ratio = round($ratio, 2);
    $arrayRatio += ["audio-".$nombre => $ratio."%"];

}
//VIDEO
$count=0;
foreach ($resultadoVideo as $nombre=>$valor){

    $query_ratio = "SELECT count(*) FROM `formatosvideo` WHERE ";

    if (is_null($valor)) {
        $query .= "c.`" . $nombre . "` is null";
        $query_ratio .= "`" . $nombre . "` is null";
    }
    else{
        $query .= "c.`".$nombre."` = '".$valor."'";
        $query_ratio .= "`".$nombre . "` = '" . $valor . "'";
    }
    if ($count < count($resultadoVideo) - 1)
        $query .= " AND ";
    $count++;

    //Sacar la similaridad por cada elemento
    $single_ratio = $conn->query($query_ratio);
    $single_ratio = $single_ratio->fetch_all();

    $ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
    $ratio = round($ratio, 2);
    $arrayRatio += ["video-".$nombre => $ratio."%"];
}

// Conseguimos la unicidad total
$resultado = $conn->query($query);
$resultado = $resultado->fetch_all();

//Añadimos la unicidad total al JSON
$porcentajeUnicidad = round((($total_reg[0][0]-$resultado[0][0]+1)/$total_reg[0][0])*100,2);
$arrayRatio += ["resultadoJS" => "Hay ".($resultado[0][0]-1)." browserFingerPrint como el tuyo de ".$total_reg[0][0]." en nuestra base de datos. (".$porcentajeUnicidad."% único)"];
$arrayRatio += ["Query" => $query];
//Devolvemos el JSON tanto con el similarity ratio individual como con la unicidad total en la ultima clave del JSON.
echo json_encode($arrayRatio);
?>