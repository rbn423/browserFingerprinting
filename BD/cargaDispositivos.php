<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los dispositivos
foreach ($_POST as $dispositivo => $valor){
    if ($dispositivo != "ID") {
        $query = "INSERT INTO `dispositivos`(`id`, `tipo`) VALUES (".$id.",'".$valor."')";
        echo $query;
        $conn->query($query);
    }
}
?>