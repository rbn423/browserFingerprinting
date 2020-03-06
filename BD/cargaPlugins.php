<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los plugins
foreach ($_POST as $nombre_plugin => $plugin){
    if ($nombre_plugin != "ID" && $nombre_plugin != "flash") {
        $query = "INSERT INTO `plugins`(`id`, `nombrePlugin`) VALUES (".$id.",'".$plugin."')";
        $conn->query($query);
    }
}
//inserta la columna flash
$query = "UPDATE `atributos` SET `flash` = '".$_POST["flash"]."' where `id` = ".$id;
?>