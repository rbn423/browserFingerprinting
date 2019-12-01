<?php
	require_once("comun/config.php");
	require_once("BD/BDCabecerasHTTP.php");

	$headers = apache_request_headers();
	
	BDCabecerasHTTP::insertarCabecera($headers);
	$iguales = BDCabecerasHTTP::numeroCabecerasIguales($headers);
	$totales = BDCabecerasHTTP::cabecerasTotales();
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="javascript/navigator.js"></script>
    <script type="text/javascript" src="javascript/screen.js"></script>
    <script type="text/javascript" src="javascript/fecha.js"></script>
    <script type="text/javascript" src="javascript/plugins.js"></script>
</head>
<body>
	<?php
		echo "<h2>Elementos de http</h2>";

		foreach ($headers as $header => $value) {
			echo "$header: $value <br />\n";
		}
		echo "<p>En total existen ".($iguales-1)." cabeceras HTTP como la tuya en nuestra base de datos.</p>";
		echo "<p>Eres un <strong>".(100-(($iguales-1)*100/$totales))."%</strong> único.</p>";
	?>

	<h2>Elementos JavaScript</h2>

	<p id="pruebas"/>
	<script>
		var salida = "";
		var fecha = new Date();
		salida += resultadoNavigator();
		//salida += "- Geolocalizacion = " + navigator.geolocation + "<br/>" ; Este objeto devuelve valores raros aun no se utilizarlo
		salida += resultadoFecha();
        salida += resultadoScreen();
		document.getElementById("pruebas").innerHTML = salida;
    </script>

    <div id="plugins"></div>
    <script>
        var txt = resultadoPluggins();
        document.getElementById("plugins").innerHTML=txt;
    </script>

    <div id="fuentes"></div>
    <script type="text/javascript">
        //Hay que implementarlo en fuentes.js
    </script>

</body>
</html>