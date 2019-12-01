<?php
require_once(dirname(__DIR__)."/comun/config.php");

class BDCabecerasHTTP {

	public static function selector($headers, $tipo){
		$i = 0;
		$resultado = "";
		if ($tipo == "select")
			$separador = " AND ";
		else
			$separador = " , ";
		foreach($headers as $header => $value) {
			switch ($header) {
				case "Accept":
					if ($tipo == "insertCabecera")
						$campo = "Accept";
					elseif ($tipo == "select")
						$campo = "Accept = '$value'";
					else
						$campo = "'$value'";
					break;
				case "Accept-Language":
					if ($tipo == "insertCabecera")
						$campo = "AcceptLanguage";
					elseif ($tipo == "select")
						$campo = "AcceptLanguage = '$value'";
					else
						$campo = "'$value'";
					break;
				case "Upgrade-Insecure-Requests":
					if ($tipo == "insertCabecera")
						$campo = "UpgradeInsecureRequests";
					elseif ($tipo == "select")
						$campo = "UpgradeInsecureRequests = '$value'";
					else
						$campo = "'$value'";
					break;
				case "User-Agent":
					if ($tipo == "insertCabecera")
						$campo = "UserAgent";
					elseif ($tipo == "select")
						$campo = "UserAgent = '$value'";
					else
						$campo = "'$value'";
					break;
				case "Accept-Encoding":
					if ($tipo == "insertCabecera")
						$campo = "AcceptEncoding";
					elseif ($tipo == "select")
						$campo = "AcceptEncoding = '$value'";
					else
						$campo = "'$value'";
					break;
				case "Connection":
					if ($tipo == "insertCabecera")
						$campo = "Connection";
					elseif ($tipo == "select")
						$campo = "Connection = '$value'";
					else
						$campo = "'$value'";
					break;
				case "Sec-Fetch-Mode":
					if ($tipo == "insertCabecera")
						$campo = "SecFetchMode";
					elseif ($tipo == "select")
						$campo = "SecFetchMode = '$value'";
					else
						$campo = "'$value'";
					break;
				case "Sec-Fetch-User":
					if ($tipo == "insertCabecera")
						$campo = "SecFetchUser";
					elseif ($tipo == "select")
						$campo = "SecFetchUser = '$value'";
					else
						$campo = "'$value'";
					break;
				case "Sec-Fetch-Site":
					if ($tipo == "insertCabecera")
						$campo = "SecFetchSite";
					elseif ($tipo == "select")
						$campo = "SecFetchSite = '$value'";
					else
						$campo = "'$value'";
					break;
				case "DNT":
					if ($tipo == "insertCabecera")
						$campo = "DNT";
					elseif ($tipo == "select")
						$campo = "DNT = '$value'";
					else
						$campo = "'$value'";
					break;
				default :
					$campo = NULL;
					break;
			}
			if ($campo != NULL) {
				if ($i == 0)
					$resultado .= "$campo";
				else
					$resultado .= "$separador $campo";
				$i++;
			}
		}
		return $resultado;
	}

	public static function insertarCabecera($headers){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$campo = NULL;
		$i = 0;
		$query = "INSERT INTO http (";
		$query .= self::selector($headers,"insertCabecera");
		$query .= ") VALUES (";
		$i = 0;
		$query .= self::selector($headers,"insertValue");
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

