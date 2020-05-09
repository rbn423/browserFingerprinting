<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];
$resumen = $_POST["resumen"];
$resumen = md5($resumen);

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los plugins
foreach ($_POST as $nombre_plugin => $plugin){
    if ($nombre_plugin != "ID" ) {
        $query = "INSERT INTO `plugins`(`id`, `nombrePlugin`) VALUES (".$id.",'".$plugin."')";
        $conn->query($query);
    }
}

//insertamos el resumen en la tabla atributos
$query = "UPDATE `atributos` SET `resumenPlugins`= '".$resumen."' WHERE `ID` = '".$id."'";
$conn->query($query);
?>
