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
        //$query = "INSERT INTO `fuentes`(`id`, `nombreFuente`) VALUES (".$id.",'".$fuente."')";
        //$conn->query($query);
        $stmt = $conn->prepare("INSERT INTO `fuentes`(`id`, `nombreFuente`) VALUES (?, ?)");
        $stmt->bind_param("is", $id, $fuente);
        $stmt->execute();
        $stmt->close();
    }
}

//insertamos el resumen en la tabla atributos
//$query = "UPDATE `atributos` SET `resumenFuentes`= '".$resumen."' WHERE `ID` = '".$id."'";
//$conn->query($query);
$stmt = $conn->prepare("UPDATE `atributos` SET `resumenFuentes`=? WHERE `ID` =?");
$stmt->bind_param("si", $resumen, $id);
$stmt->execute();
$stmt->close();

//Total de resumenes de fuentes distintos
$query_total = "SELECT count(`resumenFuentes`) FROM `atributos`";
$total_reg = $conn->query($query_total);
$total_reg = $total_reg->fetch_all();

//Cogemos el resumenFuentes de quien ha hecho la petición
//$query = "SELECT `resumenFuentes` FROM `atributos` WHERE id = ".$id;
//$resultado = $conn->query($query);
//$resultado = $resultado->fetch_assoc();
$stmt = $conn->prepare("SELECT `resumenFuentes` FROM `atributos` WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->fetch_result();
$resultado = $resultado->fetch_assoc();
$stmt->close();

//Vemos cuantos elementos hay
foreach ($resultado as $valor){
    //$query_ratio = "SELECT count(`resumenFuentes`) FROM `atributos` WHERE `resumenFuentes`";
    if (is_null($valor)) {
        //$query_ratio .= "`".$valor."` is null";
        $stmt = $conn->prepare("SELECT count(`resumenFuentes`) FROM `atributos` WHERE `resumenFuentes` =? is null");
        $stmt->bind_param("s", $valor);
    }
    else {
        //$query_ratio .= "= '".$valor. "'";
        $stmt = $conn->prepare("SELECT count(`resumenFuentes`) FROM `atributos` WHERE `resumenFuentes` =?");
        $stmt->bind_param("s", $valor);
    }
}

//$single_ratio = $conn->query($query_ratio);
//$single_ratio = $single_ratio->fetch_all();
$stmt->execute();
$single_ratio = $stmt->fetch_result();
$single_ratio = $single_ratio->fetch_all();
$stmt->close();

$ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
$ratio = round($ratio, 2);

//Lo usaremos para devolver el JSON
$arrayRatio = array();
$arrayRatio += ["resumenFuentes" => $ratio."%"];
echo json_encode($arrayRatio);
?>