<?php
require_once(dirname(__DIR__)."/comun/config.php");

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

$query = "SELECT * FROM `atributos` WHERE `AcceptEncoding` LIKE 'gzip, deflate, br'";
$result = $conn->query($query);
$num1 = $result->num_rows;

$query = "SELECT * FROM `atributos` WHERE `AcceptEncoding` LIKE 'gzip, deflate'";
$result = $conn->query($query);
$num2 = $result->num_rows;

$array = array($num1,$num2);

echo json_encode($array);
?>