<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los resultados de formato de video soportados
foreach ($_POST as $formato => $resultado){
    if ($formato != "ID") {
        $query = "INSERT INTO `formatosVideo`(`id`, `formato`, `resultado`) VALUES (".$id.",'".$formato."','".$resultado."')";
        $conn->query($query);
    }
}