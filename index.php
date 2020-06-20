<?php
	require_once("comun/config.php");
	require_once("BD/BDCabecerasHTTP.php");
	require_once("comun/DescElementoHTTP.php");

	$headers = apache_request_headers();

	$id = BDCabecerasHTTP::insertarCabecera($headers);
	$iguales = BDCabecerasHTTP::numeroCabecerasIguales($headers);
	$totales = BDCabecerasHTTP::cabecerasTotales();

    require "header.php";
?>
		<div id="container">
            <form action='graficos.php'><button id="linkGraficos">Gráficos</button></form>
            <div>
                <table id="tablaResultadoJS">
                    <tr><th>Resultado</th></tr>
                    <tr><td><p id="resultadoJS"><img src="img/animated.png" class="cargando"></p></td></tr>
                </table>
            </div>
			<h2>Atributos de la cabecera HTTP</h2>
			<div id="cabecera">
				<?php
					echo "<table>";
					echo "<tr>";
					  echo "<th>Elemento</th><th>Similaridad</th><th>Valor</th>";
					echo "</tr>";
					foreach ($headers as $header => $value) {
					    //pintamos cada una de las filas de las cabeceras http
						if($header != "Cache-Control" && $header != "Host" && $header != "Cookie" && $header != "Referer"){
						    $clave = str_replace('-', '', $header);
						    $fila = "<tr>";
							$fila .= "<td><div class='nombreElemento'>".$header."</div>" ;//nombre de la cabecera
							$fila .= "<div class='tooltip'>info";//icono de info desplegable
							$fila .= "<span class='tooltiptext'>".DescElementoHTTP::getDescripcionHTTP($clave)."</span></div></td>";//desplegable con la información
                            $fila .= "<td id='".$clave."'><img class='cargando' src='img/animated.png'></td>";//porcentaje de similaridad de la cabecera y mientras espera el porcentaje un gif de cargando
                            $fila .= "<td>".$value."</td>"; //resultado de la cabecera
							$fila .= "</tr>";
							echo $fila;
						}
					}
					echo "</table>";
				?>
			</div>
			<h2>Atributos JavaScript</h2>
			<div id="JS">
				<script>
					var id = '<?php echo $id; ?>';//guardamos el id del usuario actual para las siguientes consultas asíncronas
					var salida = "<table> <tr> <th>Elemento</th><th>Similaridad</th><th>Valor</th> </tr>"; //vamos construyendo la tabla en esta variable para pintarla al final
					var elementosJS = new Array(); //Se van añadiendo a este array todos los elementos obtenidos mediante JS
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
					for (var i = 0; i < elementosJS.length; i++) {
                        salida += "<tr>" +
                            "<td><div class='nombreElemento'>" + elementosJS[i][0] + "</div>" +//nombre del elemento
                            "<div class='tooltip'>info" + //palabra info que mostrará desplegable con la información al poner el puntero encima
                            "<span class='tooltiptext'>"+getDescripcionJS(elementosJS[i][1])+"</span></div>" + //información del elemento
                            "</td>" +
                            "<td id='" + elementosJS[i][1] + "'><img class='cargando' src='img/animated.png'></td>" +//ratio del elemento en la base de datos y mientras espera al ratio muestra una imagen de cargando
                            "<td>" + elementosJS[i][2] + "</td></tr>";//resultado del elemento en el navegador
                    }
					salida += "<tr>" +
                        "<td><div class='nombreElemento'>Canvas</div>" +
                        "<div class='tooltip'>info" +
                        "<span class='tooltiptext'>"+getDescripcionJS("canvas")+"</span></div>" +
                        "</td>" +
                        "<td id=canvas><img class='cargando' src='img/animated.png'></td>" +
                        "<td>" +
                        "<canvas id='canvas_result'></canvas>" +
                        "</td>" +
                        "</tr>";
                    salida += "</table>";

					document.getElementById("JS").innerHTML = salida;
					var canvas = pintar(); //pintamos después de que exista el elemento canvas en el navegador
					elementosJS.push(canvas);//Una vez pintado hemos obtenido el valor del canvas y lo añadimos al array
				</script>

				<div id="dispositivos">
					<script>
						//dispositivos();
					</script>
				</div>
				<video id="movie" hidden="true"></video>
				<div id="video">
					<script>
						var formatosVideo = formatosSoportadosVideo();
						var salida = resultadoVideo(formatosVideo);
						document.getElementById("video").innerHTML = salida;
					</script>
				</div>
					<audio id="sound" hidden="true"></audio>
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
						var font = fingerprint_fonts();
						var salida = resultadoFuentes(font[0]);
						document.getElementById("fuentes").innerHTML=salida;
					</script>
				</div>
                <script>
                    gestionarAsincronia(id);
                </script>
			</div>
		</div>
	</body>
</html>