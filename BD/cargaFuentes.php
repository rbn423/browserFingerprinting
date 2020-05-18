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
        $stmt = $conn->prepare("INSERT INTO `fuentes`(`id`, `nombreFuente`) VALUES (?, ?)");
        $stmt->bind_param("is", $id, $fuente);
        $stmt->execute();
        $stmt->close();
    }
}

//insertamos el resumen en la tabla resultados
$stmt = $conn->prepare("UPDATE `resultados` SET `resumenFuentes`=? WHERE `ID` =?");
$stmt->bind_param("si", $resumen, $id);
$stmt->execute();
$stmt->close();

//Total de resumenes de fuentes distintos
$query_total = "SELECT count(`resumenFuentes`) FROM `resultados`";
$total_reg = $conn->query($query_total);
$total_reg = $total_reg->fetch_all();

//Cogemos el resumenFuentes de quien ha hecho la petición
$stmt = $conn->prepare("SELECT `resumenFuentes` FROM `resultados` WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt -> store_result();
$stmt -> bind_result($resumenFuentes);
$stmt -> fetch();
$stmt->close();

//Contamos cuantas veces está dicho resumenFuentes en la BD
if (is_null($resumenFuentes)) {
    $stmt = $conn->prepare("SELECT count(`resumenFuentes`) FROM `resultados` WHERE `resumenFuentes` =? is null");
    $stmt->bind_param("s", $resumenFuentes);
    $stmt->execute();
    $stmt -> store_result();
    $stmt -> bind_result($count);
    $stmt -> fetch();
    $stmt->close();
}
else {
    $stmt = $conn->prepare("SELECT count(`resumenFuentes`) FROM `resultados` WHERE `resumenFuentes` =?");
    $stmt->bind_param("s", $resumenFuentes);
    $stmt->execute();
    $stmt -> store_result();
    $stmt -> bind_result($count);
    $stmt -> fetch();
    $stmt->close();
}

//Calculamos el ratio
$ratio =  $count * 100 / $total_reg[0][0];
$ratio = round($ratio, 2);

//Devolvemos el json
$arrayRatio = array();
$arrayRatio += ["resumenFuentes" => $ratio."%"];
echo json_encode($arrayRatio);
?>