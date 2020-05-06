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
        $query = "INSERT INTO `plugins`(`id`, `nombrePlugin`) VALUES (".$id.",'".$plugin."')";
        $conn->query($query);
    }
}

//insertamos el resumen en la tabla atributos
$query = "UPDATE `atributos` SET `resumenPlugins`= '".$resumen."' WHERE `ID` = '".$id."'";
$conn->query($query);

//Total de plugins distintos: Tal como guardamos los datos no se puede hacer de esta manera
//$query_total = "SELECT COUNT(DISTINCT `nombrePlugin`) FROM `plugins`";
//$total_reg = $conn->query($query_total);
//$total_reg = $total_reg->fetch_all();

//Cogemos los plugins de quien ha hecho la petición
$query = "SELECT `nombrePlugin` FROM `plugins` WHERE id = ".$id;
$resultado = $conn->query($query);
$resultado = $resultado->fetch_assoc();

//Número total de plugins: Tal como guardamos los datos no se puede hacer de esta manera
//$query_num_plugins = "SELECT COUNT(DISTINCT `nombrePlugin`) FROM `plugins` WHERE id = ".$id;
//$num_plugins = $conn->query($query_num_plugins);
//$num_plugins = $num_plugins->fetch_all();

//Lo usaremos para devolver el JSON
$arrayRatio = array();

//Vemos cuantos elementos hay
foreach ($resultado as $valor){
    $query_ratio = "SELECT COUNT(DISTINCT `nombrePlugin`) FROM `plugins` WHERE `nombrePlugin`";
    if (is_null($valor))
        $query_ratio .= "`".$valor."` is null";
    else
        $query_ratio .= "= '".$valor. "'";
}

$single_ratio = $conn->query($query_ratio);
$single_ratio = $single_ratio->fetch_all();

$ratio =  $single_ratio[0][0] * 100 / $total_reg[0][0];
$ratio = round($ratio, 2);
$arrayRatio += ["resumenPlugins" => $ratio."%"]; //ratioPlugin

//$ratio_num_plugs = $num_plugins[0][0] * 100 / $total_reg[0][0];
//$ratio_num_plugs = round($ratio_num_plugs, 2);
//$arrayRatio += ["ratio_total_plugins" => $ratio_num_plugs."%"];

echo json_encode($arrayRatio);
?>
