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
</head>
<body>
	<?php
		echo "<h2>Elementos de http</h2>";
        echo "<table border='visible'>";//el visible va por css
        echo "<tr>";
          echo "<th>Elemento</th><th>Valor</th>";
        echo "</tr>";
		foreach ($headers as $header => $value) {
		    if($header != "Cache-Control" && $header != "Host" && $header != "Cookie" && $header != "Referer"){
                echo "<tr>";
                echo "<td>".$header."</td><td align='center'>".$value."</td>";//el align debe ir por css
                echo "</tr>";
			}
		}
		echo "</table>";
		echo "<p>En total existen ".($iguales-1)." cabeceras HTTP como la tuya en nuestra base de datos.</p>";
		echo "<p>Eres un <strong>".(100-(($iguales-1)*100/$totales))."%</strong> único.</p>";
	?>

	<h2>Elementos JavaScript</h2>

	<div id="JS"></div>
	<script>
        var id = '<?php echo $id; ?>';
		var salida = "<table border='visible'> <tr> <th>Elemento</th><th>Valor</th> </tr>";//el visible va por css
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
            salida += "<tr><td>" + elementosJS[i][0] + "</td><td align='center'>" + elementosJS[i][2] + "</td></tr>";//aqui hay aling->css
        salida += "<tr><td>Canvas</td><td align='center'>" + //aqui hay que meter css al aling
            "<canvas id='canvas' width='250' height='100'></canvas>" + //aqui hay css para el tamaño del canvas
            "</td></tr>";
        salida += "</table>";
		document.getElementById("JS").innerHTML = salida;
		var canvas = pintar(); //pintamos después de que exista el elemento canvas en el navegador
		elementosJS.push(canvas);//Una vez pintado hemos obtenido el valor del canvas y lo añadimos al array
    </script>

    <video id="movie" hidden="true">
        //el hidden va por css
    </video>
    <div id="video"></div>
    <script>
        var formatos = formatosSoportadosVideo();
        var salida = resultadoVideo(formatos);
        asincroniaVideo(formatos,id);
        document.getElementById("video").innerHTML = salida;
    </script>

    <audio id="sound" hidden="true">
        //el hidden por css
    </audio>
    <div id="audio"></div>
    <script>
        var formatos = formatosSoportadosAudio();
        var salida = resultadoAudio(formatos);
        asincroniaAudio(formatos,id);
        document.getElementById("audio").innerHTML = salida;
    </script>

    <div id="plugins"></div>
    <script>
        var pluginsInstalados = arrayPlugins();
        var txt = resultadoPlugins(pluginsInstalados);
        asincroniaPlugins(pluginsInstalados,id);
        document.getElementById("plugins").innerHTML=txt;
    </script>

    <div id="fuentes"></div>
    <script type="text/javascript">
        //Hay que implementarlo en fuentes.js
		var font = fingerprint_fonts();
        var salida = resultadoFuentes(font);
		document.getElementById("fuentes").innerHTML=salida;
		//insercion de las fuentes en la base de datos
		asincroniaFuentes(font,id);
    </script>

    <div id="resultadoJS"></div>
    <script>
        asincroniaJS(elementosJS,id);
    </script>

</body>
</html>