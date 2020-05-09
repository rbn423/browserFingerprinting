<?php
require_once(dirname(__DIR__)."/comun/config.php");

$id = $_POST["ID"];
$ogg_theora = $_POST["ogg-theora"];
$ogg_vorbis = $_POST["ogg-vorbis"];
$ogg_opus = $_POST["ogg-opus"];
$mp4_avc1 = $_POST["mp4-avc1"];
$mp4_mp4a = $_POST["mp4-mp4a"];
$mp4_flac = $_POST["mp4-flac"];
$web_vp8 = $_POST["webm-vp8"];
$webm_vp9 = $_POST["webm-vp9"];
$webm_vorbis = $_POST["webm-vorbis"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

$columnas_posibles = [
    'id'=>null,
    'ogg-theora'=>null,
    'ogg-vorbis'=>null,
    'ogg-opus'=>null,
    'mp4-avc1'=>null,
    'mp4-mp4a'=>null,
    'mp4-flac'=>null,
    'webm-vp8'=>null,
    'webm-vp9'=>null,
    'webm-vorbis'=>null
];

// Cogemos los valores de POST que coinciden con nuestra lista de columnas posibles
$columnas = array_intersect_key($_POST, $columnas_posibles);
// Comprobamos que están las columnas que deberían.
$columnas = array_merge($columnas_posibles, $columnas);

//Insertamos los valores
$stmt = $conn->prepare("INSERT INTO `formatosvideo` (`id`, `ogg-theora`, `ogg-vorbis`, 
        `ogg-opus`, `mp4-avc1`,`mp4-mp4a`,`mp4-flac`,`webm-vp8`,`webm-vp9`, `webm-vorbis`)
        VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("isssssssss", $id, $ogg_theora, $ogg_vorbis, $ogg_opus,
        $mp4_avc1, $mp4_mp4a, $mp4_flac, $web_vp8, $webm_vp9, $webm_vorbis);
$stmt->execute();
$stmt->close();
