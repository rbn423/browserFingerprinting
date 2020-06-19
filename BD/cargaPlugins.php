<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];
$resumen = $_POST["resumen"];
$resumen = md5($resumen);

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los plugins
foreach ($_POST as $nombre_plugin => $plugin){
    if ($nombre_plugin != "ID" && $nombre_plugin != "resumen") {
        $stmt = $conn->prepare("INSERT INTO `plugins`(`id`, `nombrePlugin`) VALUES (?, ?)");
        $stmt->bind_param("is", $id, $plugin);
        $stmt->execute();
        $stmt->close();
    }
}

//insertamos el resumen en la tabla Conexiones
$stmt = $conn->prepare("UPDATE `Conexiones` SET `resumenPlugins`=? WHERE `ID` =?");
$stmt->bind_param("si", $resumen, $id);
$stmt->execute();
$stmt->close();

//Total de resumenes de plugins distintos
$query_total = "SELECT count(`resumenPlugins`) FROM `Conexiones`";
$total_reg = $conn->query($query_total);
$total_reg = $total_reg->fetch_all();

//Cogemos el resumePlugins de quien ha hecho la petición
$stmt = $conn->prepare("SELECT `resumenPlugins` FROM `Conexiones` WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt -> store_result();
$stmt -> bind_result($resumenPlugins);
$stmt -> fetch();
$stmt->close();

//Contamos cuantas veces está dicho resumenPlugins en la BD
if (is_null($resumenPlugins)) {
    $stmt = $conn->prepare("SELECT COUNT(DISTINCT `resumenPlugins`) FROM `Conexiones` WHERE `resumenPlugins` =? is null");
    $stmt->bind_param("s", $resumenPlugins);
    $stmt->execute();
    $stmt -> store_result();
    $stmt -> bind_result($count);
    $stmt -> fetch();
    $stmt->close();
}
else {
    $stmt = $conn->prepare("SELECT COUNT(DISTINCT `resumenPlugins`) FROM `Conexiones` WHERE `resumenPlugins` =?");
    $stmt->bind_param("s", $resumenPlugins);
    $stmt->execute();
    $stmt -> store_result();
    $stmt -> bind_result($count);
    $stmt -> fetch();
    $stmt->close();
}

//Calculamos el ratio
$ratio =  $count * 100 / $total_reg[0][0];
$ratio = round($ratio, 2);

//Devolver el JSON
$arrayRatio = array();
$arrayRatio += ["resumenPlugins" => $ratio."%"];
echo json_encode($arrayRatio);
?>
