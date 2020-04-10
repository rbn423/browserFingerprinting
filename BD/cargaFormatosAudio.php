<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();
$columnas = "";
$valores = "";

//insertamos en la base de datos los resultados de formatos de audio soportados
foreach ($_POST as $formato => $resultado){
    if ($formato != "ID") {
        $columnas .= ",`".$formato."`";
        $valores .= ",'".$resultado."'";
    }
}
$query = "INSERT INTO `formatosaudio`(`id`".$columnas.") VALUES (".$id.$valores.")";
echo $query;
$conn->query($query);