<?php

if(!isset($_GET["huella"])) {
    echo '<body style="text-align: center; margin-left: 15%">';
    echo '<div style="width: 80%">';
    echo '<h1>BrowserFingerprinting</h1>';
    echo '<h2>Huella digital de tu navegador</h2>';
    echo '<p>Esta es una aplicación web capaz de mostrar la huella digital de tu navegador mediante el análisis de algunos de sus elementos.</p>';
    echo '<p>Se trata de un trabajo de fin de grado realizado por estudiantes de la Universidad Complutense de Madrid.</p>';
    echo '<p>Todos los datos analizados al pulsar el botón "Ver huella digital de tu navegador" serán almacenados en una base de datos, cuyo tratamiento será exclusivamente con fines académicos.';
    echo '<form action="index.php?huella" method="get"><button name="huella" id="linkGraficos" type="submit">Ver huella digital de tu navegador</button></form>';
    echo '<h2>¿Qué es el Browser Fingerprinting?</h2>';
    echo '<p>La huella digital es la recopilación sistemática sobre un determinado dispositivo con la finalidad de identificarlo, singularizarlo y perfilarlo. Este conjunto de datos permite prácticamente, de forma unívoca, identificar dicho terminal y en cuestión a la persona o grupo de personas que puedan estar usándolo.</p>';
    echo '</div>';
    echo '</body>';
    exit;
}

?>
