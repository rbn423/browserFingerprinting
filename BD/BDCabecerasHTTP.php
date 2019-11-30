<?php
require_once(dirname(__DIR__)."/comun/config.php");

class BDCabecerasHTTP {
	
	public static function insertarCabecera($headers){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();

		$i = 0;
		$query = "INSERT INTO http (";
		foreach($headers as $header => $value) {
			if($header != "Cache-Control" && $header != "Host" && $header != "Cookie" && $header != "Referer") {
				if ($i > 0 && $i < count($headers))
					$query .= ", ";
				$campo = str_replace("-", "", $header);
				$query .= "$campo";
				$i++;
			}
		}
		$query .= ") VALUES (";
		$i = 0;
		foreach($headers as $header => $value) {
			if($header != "Cache-Control" && $header != "Host" && $header != "Cookie" && $header != "Referer") {
				if ($i > 0 && $i < count($headers))
					$query .= ", ";
				$query .= "'$value'";
				$i++;
			}
		}
		$query .= ")";
		$conn->query($query);
	}

	public static function numeroCabecerasIguales($headers){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();

		$i = 0;
		$query = "SELECT count(*) FROM `http` WHERE ";
		foreach($headers as $header => $value) {
			if($header != "Cache-Control" && $header != "Host" && $header != "Cookie" && $header != "Referer") {
				if ($i > 0 && $i < count($headers))
					$query .= " and ";
				$campo = str_replace("-", "", $header);
				$query .= "$campo = '$value'";
				$i++;
			}
		}
		$resultado = $conn->query($query);
		$resultado = $resultado->fetch_all();
		return $resultado[0][0];
	}

	public static function cabecerasTotales(){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();

		$query = "SELECT count(*) FROM `http`";
		$resultado = $conn->query($query);
		$resultado = $resultado->fetch_all();
		return $resultado[0][0];

	}
}

?>

