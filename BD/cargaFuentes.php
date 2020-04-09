<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];
$resumen = $_POST["resumen"];
$resumen = md5($resumen); //md5 del string de 1046 caracteres de unos y ceros

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los tipos de fuentes
foreach ($_POST as $nombre_fuente => $fuente){
    if ($nombre_fuente != "ID" && $nombre_fuente != "resumen") {
        $query = "INSERT INTO `fuentes`(`id`, `nombreFuente`) VALUES (".$id.",'".$fuente."')";
        $conn->query($query);
    }
}

//insertamos el resumen en la tabla atributos
$query = "UPDATE `atributos` SET `resumenFuentes`= '".$resumen."' WHERE `ID` = '".$id."'";
$conn->query($query);
?>