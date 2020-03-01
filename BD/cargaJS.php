<?php
require_once(dirname(__DIR__)."/comun/config.php");
$id = $_POST["ID"];
$count = 1;

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

//insertamos en la base de datos los elementos JS
$query = "UPDATE `atributos` SET " ;
echo "Elemento obtenidos mediante JS: ".count($_POST);//borrar mas adelante, de momento nos interesa saber si aparece algun elemento mas en el array
foreach($_POST as $nombre_campo => $valor){
    if ($nombre_campo != "ID") {
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

//obtenemos los elementos totales de http
$query = "SELECT count(*) FROM `atributos`";
$totales = $conn->query($query)->fetch_all()[0][0];

//obtenemos el numero de elementos de la tabla que tienen los mismos valores JS
$query = "SELECT count(*) FROM `atributos` WHERE ";
$count = 1;
foreach($_POST as $nombre_campo => $valor){
    if ($nombre_campo != "ID") {
        $query .= $nombre_campo;
        if ($valor == "true" || $valor == "false")
            $query .= " = " . $valor;
        else
            $query .= " = '" . $valor . "'";
        if ($count < count($_POST) - 1)
            $query .= " AND ";
        $count++;
    }
}
$iguales = $conn->query($query)->fetch_all()[0][0];

//mostramos la cantidad de casos iguales en la base de datos
echo "<p>Existen ".($iguales-1)." entradas en nuestra base de datos con los mismos elementos obtenibles mediante javaScript.</p>";
echo "<p>Los elementos obtenidos mediante javaScript de tu navegador son un <strong>".(100-(($iguales-1)*100/$totales))."% únicos</strong>.</p>";

?>