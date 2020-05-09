<?php
	require_once("comun/config.php");
	require_once("BD/BDCabecerasHTTP.php");

	$headers = apache_request_headers();

	$id = BDCabecerasHTTP::insertarCabecera($headers);
	$iguales = BDCabecerasHTTP::numeroCabecerasIguales($headers);
	$totales = BDCabecerasHTTP::cabecerasTotales();

?>

<!DOCTYPE html>
<html>
	<head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">

		<script type="text/javascript" src="javascript/navigator.js"></script>
		<script type="text/javascript" src="javascript/screen.js"></script>
		<script type="text/javascript" src="javascript/fecha.js"></script>
		<script type="text/javascript" src="javascript/plugins.js"></script>
		<script type="text/javascript" src="javascript/window.js"></script>
		<script type="text/javascript" src="javascript/fuentes.js"></script>
		<script type="text/javascript" src="javascript/fontdetect.js"></script>
		<script type="text/javascript" src="javascript/asincrono.js"></script>
		<script type="text/javascript" src="javascript/canvas.js"></script>
		<script type="text/javascript" src="javascript/video.js"></script>
		<script type="text/javascript" src="javascript/audio.js"></script>
		<link rel="stylesheet" href="css/estilos.css">
	</head>
	<body>
		<div id="container">
			<div id="linkDiagramas"><a href="diagramas.php">Diagramas</a></div>
            <div id="resultadoJS"></div>
			<h2>Atributos de la cabecera HTTP</h2>
			<div id="cabecera">
				<?php
					echo "<table>";
					echo "<tr>";
					  echo "<th>Elemento</th><th>Similaridad</th><th>Valor</th>";
					echo "</tr>";
					foreach ($headers as $header => $value) {
						if($header != "Cache-Control" && $header != "Host" && $header != "Cookie" && $header != "Referer"){
							echo "<tr>";
							echo "<td>".$header."</td><td id='".str_replace('-', '', $header)."'><img id='cargando' src='img/animated.png'></td><td>".$value."</td>";
							echo "</tr>";
						}
					}
					echo "</table>";
				?>
			</div>
			<h2>Atributos JavaScript</h2>
			<div id="JS">
				<script>
					var id = '<?php echo $id; ?>';
					var salida = "<table> <tr> <th>Elemento</th><th>Similaridad</th><th>Valor</th> </tr>";//el visible va por css
					var elementosJS = new Array();
					var navegador = arrayNavigator();
					var fecha = arrayFecha();
					var pantalla = arrayScreen();
					var ventana = arrayWindow();
					for (var i = 0; i < navegador.length; i++)
						elementosJS.push(navegador[i]);
					elementosJS.push(fecha);
					for (var i = 0; i < pantalla.length ; i++)
						elementosJS.push(pantalla[i]);
					for (var i = 0 ; i < ventana.length ; i++)
						elementosJS.push(ventana[i]);
					for (var i = 0; i < elementosJS.length; i++)
                        salida += "<tr><td>" + elementosJS[i][0] + "</td><td id='" + elementosJS[i][1]+ "'><img id='cargando' src='img/animated.png'></td><td>" + elementosJS[i][2] + "</td></tr>";
                    salida += "<tr><td>Canvas</td><td id=canvas><img id='cargando' src='img/animated.png'></td><td>" +
                        "<canvas id='canvas_result'></canvas>" +
                        "</td></tr>";
                    salida += "</table>";

					document.getElementById("JS").innerHTML = salida;
					var canvas = pintar(); //pintamos después de que exista el elemento canvas en el navegador
					elementosJS.push(canvas);//Una vez pintado hemos obtenido el valor del canvas y lo añadimos al array
				</script>

				<div id="dispositivos">
					<script>
						dispositivos();
					</script>
				</div>
				<video id="movie" hidden="true">
					//el hidden va por css
				</video>
				<div id="video">
					<script>
						var formatosVideo = formatosSoportadosVideo();
						var salida = resultadoVideo(formatosVideo);
						document.getElementById("video").innerHTML = salida;
					</script>
				</div>
					<audio id="sound" hidden="true">
						//el hidden por css
					</audio>
				<div id="audio">
					<script>
						var formatosAudio = formatosSoportadosAudio();
						var salida = resultadoAudio(formatosAudio);
						document.getElementById("audio").innerHTML = salida;
					</script>
				</div>
				<script>window.adblockEnabled = true</script><!--ponemos el atributo a true -->
				<script type="text/javascript" src="javascript/ad_banner.js"></script><!--si se consigue cargar este js entonces no hay adblock y el atributo se pone a false -->
				<div id="plugins">
					<script>
						var pluginsInstalados = arrayPlugins();
						var txt = resultadoPlugins(pluginsInstalados);
						var resumen = resumenPlugins(pluginsInstalados);
						document.getElementById("plugins").innerHTML=txt;
					</script>
				</div>
				<div id="fuentes">
					<script type="text/javascript">
						//Hay que implementarlo en fuentes.js
						var font = fingerprint_fonts();
						var salida = resultadoFuentes(font[0]);
						document.getElementById("fuentes").innerHTML=salida;
					</script>
				</div>
                <script>
                    asincroniaVideo(formatosVideo,id);
                    asincroniaAudio(formatosAudio,id);
                    asincroniaPlugins(pluginsInstalados, resumen, id);
                    asincroniaFuentes(font,id);
                    asincroniaJS(elementosJS,id);
                </script>
			</div>
		</div>
	</body>
</html>