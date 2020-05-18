<?php
require_once(dirname(__DIR__)."/comun/config.php");
$elemento = $_GET["elemento"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

$query = "SELECT DISTINCT ".$elemento." FROM `resultados` ";
$result = $conn->query($query);

$arrayDatos = array();

while ($fila = $result->fetch_assoc()) {
    if (is_null($elemento))
        $query = "SELECT COUNT(*) FROM `resultados` WHERE `".$elemento."` is null";
    else
        $query = "SELECT COUNT(*) FROM `resultados` WHERE `".$elemento."` = '".$fila[$elemento]."'";
	$dato = $conn->query($query);
	$dato = $dato->fetch_assoc();
	$arrayDatos += [$fila[$elemento] => $dato['COUNT(*)']];
}

echo json_encode($arrayDatos);

?>