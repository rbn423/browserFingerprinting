<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los resultados de formatos de audio soportados
foreach ($_POST as $formato => $valor){
    if ($formato != "ID") {
        $query = "INSERT INTO `formatosAudio`(`id`, `formato`) VALUES (".$id.",'".$valor."')";
        $conn->query($query);
    }
}