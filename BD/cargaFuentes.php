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

//Total de resumenes de fuentes distintos
$query_total = "SELECT count(`resumenFuentes`) FROM `atributos`";
$total_reg = $conn->query($query_total);
$total_reg = $total_reg->fetch_all();

//Cogemos el resumenFuentes de quien ha hecho la petición
$query = "SELECT `resumenFuentes` FROM `atributos` WHERE id = ".$id;
$resultado = $conn->query($query);
$resultado = $resultado->fetch_assoc();

//Lo usaremos para devolver el JSON
$arrayRatio = array();

//Vemos cuantos elementos hay con ese resumen
foreach ($resultado as $valor){
    $query_ratio = "SELECT count(`resumenFuentes`) FROM `atributos` WHERE `resumenFuentes`";
    if (is_null($valor))
        $query_ratio .= "`".$valor."` is null";
    else
        $query_ratio .= "= '".$valor. "'";
}

$single_ratio = $conn->query($query_ratio);
$single_ratio = $single_ratio->fetch_all();

$ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
$ratio = round($ratio, 2);
$arrayRatio += ["resumenFuentes" => $ratio."%"];
echo json_encode($arrayRatio);
?>