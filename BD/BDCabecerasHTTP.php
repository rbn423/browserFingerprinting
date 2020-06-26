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
		$cabeceras = apache_request_headers();
		$Accept = empty($_SERVER['HTTP_ACCEPT']) ? null : $_SERVER['HTTP_ACCEPT'];
		$AcceptLanguage = empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? null : $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$UpgradeInsecureRequests = empty($cabeceras["Upgrade-Insecure-Requests"]) ? null : $cabeceras["Upgrade-Insecure-Requests"];
		$UserAgent = empty($_SERVER['HTTP_USER_AGENT']) ? null : $_SERVER['HTTP_USER_AGENT'];
		$AcceptEncoding = empty($_SERVER['HTTP_ACCEPT_ENCODING']) ? null : $_SERVER['HTTP_ACCEPT_ENCODING'];
		$Connection = empty($_SERVER['HTTP_CONNECTION']) ? null : $_SERVER['HTTP_CONNECTION'];
		$SecFetchMode = empty($cabeceras["Sec-Fetch-Mode"]) ? null : $cabeceras["Sec-Fetch-Mode"];
		$SecFetchUser = empty($cabeceras["Sec-Fetch-User"]) ? null : $cabeceras["Sec-Fetch-User"];
		$SecFetchSite = empty($cabeceras["Sec-Fetch-Site"]) ? null : $cabeceras["Sec-Fetch-Site"];
		$DNT = empty($cabeceras["DNT"]) ? null : $cabeceras["DNT"];

		$stmt = $conn->prepare("INSERT INTO `conexiones` (`Accept`, `AcceptLanguage`,`UpgradeInsecureRequests`,`UserAgent`,
		`AcceptEncoding`, `Connection`, `SecFetchMode`, `SecFetchUser`,`SecFetchSite`,`DNT`)
        VALUES (?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssssss", $Accept, $AcceptLanguage, $UpgradeInsecureRequests, $UserAgent, $AcceptEncoding,
			$Connection, $SecFetchMode, $SecFetchUser, $SecFetchSite, $DNT);
		$stmt->execute();
		$resultado = $stmt->insert_id;
		$stmt->close();
		return $resultado;
	}

	public static function numeroCabecerasIguales($headers){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT count(*) FROM `conexiones` WHERE ";
		$query .= self::selector($headers,"select");
		$resultado = $conn->query($query);
		$resultado = $resultado->fetch_all();
		return $resultado[0][0];
	}

	public static function cabecerasTotales(){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();

		$query = "SELECT count(*) FROM `conexiones`";
		$resultado = $conn->query($query);
		$resultado = $resultado->fetch_all();
		return $resultado[0][0];
	}
}

?>

