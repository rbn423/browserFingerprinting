<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];
$count = 1;

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();
$query = "UPDATE `http` SET " ;
echo count($_POST);
foreach($_POST as $nombre_campo => $valor){
    if ($nombre_campo != "ID") {
        echo "+ ".$nombre_campo."->".$valor."</br>";
        $query .= "`" . $nombre_campo;
        if ($valor == "true" || $valor == "false")
            $query .= "`=" . $valor;
        else
            $query .= "`='" . $valor . "'";
        if ($count < count($_POST) - 1)
            $query .= ",";
        $count++;
    }
}
$query .= " WHERE `ID` = '".$id."'";
$conn->query($query);


?>