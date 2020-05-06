<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los dispositivos
foreach ($_POST as $dispositivo => $valor){
    if ($dispositivo != "ID") {
        $array = explode(',', $valor);
        //$query = "INSERT INTO `dispositivos`(`id`, `tipo`, `idDisp`) VALUES (".$id.",'".$array[0]."','".$array[1]."')";
        //$conn->query($query);
        $stmt = $conn->prepare("INSERT INTO `dispositivos`(`id`, `tipo`, `idDisp`) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $id, $array[0], $array[1]);
        $stmt->execute();
        $stmt->close();
    }
}
?>


