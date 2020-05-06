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
        //$query = "INSERT INTO `plugins`(`id`, `nombrePlugin`) VALUES (".$id.",'".$plugin."')";
        //$conn->query($query);
        $stmt = $conn->prepare("INSERT INTO `plugins`(`id`, `nombrePlugin`) VALUES (?, ?)");
        $stmt->bind_param("is", $id, $plugin);
        $stmt->execute();
        $stmt->close();
    }
}

//insertamos el resumen en la tabla atributos
//$query = "UPDATE `atributos` SET `resumenPlugins`= '".$resumen."' WHERE `ID` = '".$id."'";
//$conn->query($query);
$stmt = $conn->prepare("UPDATE `atributos` SET `resumenPlugins`=? WHERE `ID` =?");
$stmt->bind_param("si", $resumen, $id);
$stmt->execute();
$stmt->close();


//Total de plugins distintos: Tal como guardamos los datos no se puede hacer de esta manera
//$query_total = "SELECT COUNT(DISTINCT `nombrePlugin`) FROM `plugins`";
//$total_reg = $conn->query($query_total);
//$total_reg = $total_reg->fetch_all();

//Cogemos los plugins de quien ha hecho la petición
//$query = "SELECT `nombrePlugin` FROM `plugins` WHERE id = ".$id;
//$resultado = $conn->query($query);
//$resultado = $resultado->fetch_assoc();
$stmt = $conn->prepare("SELECT `nombrePlugin` FROM `plugins` WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->fetch_result();
$resultado = $resultado->fetch_assoc();
$stmt->close();

//Número total de plugins: Tal como guardamos los datos no se puede hacer de esta manera
//$query_num_plugins = "SELECT COUNT(DISTINCT `nombrePlugin`) FROM `plugins` WHERE id = ".$id;
//$num_plugins = $conn->query($query_num_plugins);
//$num_plugins = $num_plugins->fetch_all();

//Vemos cuantos elementos hay
foreach ($resultado as $valor){
    //$query_ratio = "SELECT COUNT(DISTINCT `nombrePlugin`) FROM `plugins` WHERE `nombrePlugin`";
    if (is_null($valor)) {
        //$query_ratio .= "`".$valor."` is null";
        $stmt = $conn->prepare("SELECT COUNT(DISTINCT `nombrePlugin`) FROM `plugins` WHERE `nombrePlugin` =? is null");
        $stmt->bind_param("s", $valor);
    }
    else {
        //$query_ratio .= "= '".$valor. "'";
        $stmt = $conn->prepare("SELECT COUNT(DISTINCT `nombrePlugin`) FROM `plugins` WHERE `nombrePlugin` =?");
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

//$ratio_num_plugs = $num_plugins[0][0] * 100 / $total_reg[0][0];
//$ratio_num_plugs = round($ratio_num_plugs, 2);

//Lo usaremos para devolver el JSON
$arrayRatio = array();
$arrayRatio += ["resumenPlugins" => $ratio."%"]; //ratioPlugin
//$arrayRatio += ["ratio_total_plugins" => $ratio_num_plugs."%"];
echo json_encode($arrayRatio);
?>
