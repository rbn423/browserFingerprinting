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

	<p id="navegador"></p>
	<script>
		//hay que mirar que este código tenga licencia libre, sino hay que hacerlo de otra forma
	window.onload=function() {
		var x = function() {
			var ua= navigator.userAgent, tem, 
			M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
			if(/trident/i.test(M[1])){
				tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
				return 'IE '+(tem[1] || '');
			}
			if(M[1]=== 'Chrome'){
				tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
				if(tem!= null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
			}
			M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
			if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
			return M.join(' ');
		};
	  document.getElementById("navegador").innerHTML = "- Navegador y versión = " + x();
	}
	</script>

	<p id="pruebas"/>
	<script>
		var salida = "";
		var fecha = new Date();
		salida += "- plataforma = " + navigator.platform + "<br/>";
		salida += "- userAgent javascript = " + navigator.userAgent + "<br/>";
		salida += "- cookies habilitadas = " + navigator.cookieEnabled + "<br/>" ;
		salida += "- Lenguaje del navegador = " + navigator.language + "<br/>" ;
		salida += "- Navegador en linea = " + navigator.onLine + "<br/>" ;
		salida += "- Nombre en codigo de la app = " + navigator.appName + "<br/>" ;
		salida += "- Diferencia entre la hora UTC y la hora local en minutos = " + fecha.getTimezoneOffset() + "<br/>" ;
		salida += "- Anchura de la pantalla = " + screen.width + "<br/>" ;
		salida += "- Altura de la pantalla = " + screen.height + "<br/>" ;
		salida += "- Anchura de la pantalla eficaz = " + screen.availWidth + "<br/>" ;
		salida += "- Altura de la pantalla eficaz = " + screen.availHeight + "<br/>" ;
		salida += "- Profundidad de color = " + screen.colorDepth + "<br/>" ;
		salida += "- Profundidad de pixels = " + screen.pixelDepth + "<br/>" ;

		document.getElementById("pruebas").innerHTML = salida;

	</script>

</body>
</html>