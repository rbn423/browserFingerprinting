<?php
require_once(dirname(__DIR__)."/comun/config.php");

$id = $_POST["ID"];
$ogg_vorbis = $_POST["ogg-vorbis"];
$ogg_opus = $_POST["ogg-opus"];
$_3gpp = $_POST["3gpp"];
$mp4_mp4a = $_POST["mp4-mp4a"];
$mp4_mp3 = $_POST["mp4-mp3"];
$mp4_ac3 = $_POST["mp4-ac3"];
$mp4_ec3 = $_POST["mp4-ec3"];
$acc = $_POST["acc"];
$pcm = $_POST["pcm"];
$mpeg = $_POST["mpeg"];
$flac = $_POST["flac"];
$wave = $_POST["wave"];
$webm_vorbis = $_POST["webm-vorbis"];
$mp3_mp3 = $_POST["mp3-mp3"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

$columnas_posibles = [
    'id'=>null,
    'ogg-vorbis'=>null,
    'ogg-opus'=>null,
    '3gpp'=>null,
    'mp4-mp4a'=>null,
    'mp4-mp3'=>null,
    'mp4-ac3'=>null,
    'mp4-ec3'=>null,
    'acc'=>null,
    'pcm'=>null,
    'mpeg'=>null,
    'flac'=>null,
    'wave'=>null,
    'webm-vorbis'=>null,
    'mp3-mp3'=>null
];

// Cogemos los valores de POST que coinciden con nuestra lista de columnas posibles
$columnas = array_intersect_key($_POST, $columnas_posibles);
// Comprobamos que están las columnas que deberían.
$columnas = array_merge($columnas_posibles, $columnas);

//Insertamos los valores
$stmt = $conn->prepare("INSERT INTO `formatosaudio` (`id`, `ogg-vorbis`, `ogg-opus`, `3gpp`,`mp4-mp4a`,`mp4-mp3`,`mp4-ac3`,
        `mp4-ec3`, `acc`, `pcm`,`mpeg`,`flac`,`wave`,`webm-vorbis`, `mp3-mp3`)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("issssssssssssss", $id, $ogg_vorbis, $ogg_opus, $_3gpp,
    $mp4_mp4a, $mp4_mp3, $mp4_ac3, $mp4_ec3, $acc, $pcm, $mpeg, $flac, $wave, $webm_vorbis, $mp3_mp3);
$stmt->execute();
$stmt->close();