<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los tipos de fuentes
foreach ($_POST as $nombre_fuente => $fuente){
    if ($nombre_fuente != "ID") {
        $query = "INSERT INTO `fuentes`(`id`, `nombreFuente`) VALUES (".$id.",'".$fuente."')";
        $conn->query($query);
    }
}
?>