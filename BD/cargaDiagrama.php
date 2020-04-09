<?php
require_once(dirname(__DIR__)."/comun/config.php");

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

$query = "SELECT * FROM `atributos` WHERE `UserAgent` LIKE '%Edge%'";
$result = $conn->query($query);
$numedge = $result->num_rows;

$query = "SELECT * FROM `atributos` WHERE `UserAgent` NOT LIKE'%Edge%' AND `UserAgent` NOT LIKE'%OPR%' AND `UserAgent` LIKE '%Chrome%'";
$result = $conn->query($query);
$numchrome = $result->num_rows;

$query = "SELECT * FROM `atributos` WHERE `UserAgent` LIKE '%Firefox%'";
$result = $conn->query($query);
$numfirefox = $result->num_rows;

$query = "SELECT * FROM `atributos` WHERE `UserAgent` LIKE '%OPR%'";
$result = $conn->query($query);
$numopera = $result->num_rows;

$arrayNavigators = array($numedge,$numchrome,$numfirefox,$numopera);

echo json_encode($arrayNavigators);
?>