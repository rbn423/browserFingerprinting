<?php
require_once(dirname(__DIR__)."/comun/config.php");

class BDCabecerasHTTP {

	public static function selector($headers, $tipo){
		if ($tipo == "select")
			$separador = " AND ";
		else
			$separador = " , ";

	}

	public static function insertarCabecera($headers){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$campo = NULL;
		$i = 0;
		$query = "INSERT INTO http (";
		foreach($headers as $header => $value) {
			switch ($header) {
				case "Accept":
					$campo = "Accept";
					break;
				case "Accept-Language":
					$campo = "AcceptLanguage";
					break;
				case "Upgrade-Insecure-Requests":
					$campo = "UpgradeInsecureRequests";
					break;
				case "User-Agent":
					$campo = "UserAgent";
					break;
				case "Accept-Encoding":
					$campo = "AcceptEncoding";
					break;
				case "Connection":
					$campo = "Connection";
					break;
				case "Sec-Fetch-Mode":
					$campo = "SecFetchMode";
					break;
				case "Sec-Fetch-User":
					$campo = "SecFetchUser";
					break;
				case "Sec-Fetch-Site":
					$campo = "SecFetchSite";
					break;
				case "DNT":
					$campo = "DNT";
					break;
				default :
					$campo = NULL;
					break;
			}
			if ($campo != NULL) {
				if ($i == 0)
					$query .= "$campo";
				else
					$query .= ", $campo";
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
		echo $query;
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

