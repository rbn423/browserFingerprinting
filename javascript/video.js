/*
comprueba para cada formato de nuestra lista si está soportado en el navegador. Tres posibles respuestas de este(maybe, probably, "")
 */
function formatosSoportadosVideo() {
    var objVideo = document.getElementById("movie");

    var tipos=[
        ['video/ogg; codecs="theora"', "ogg-theora"],
        ['video/ogg; codecs="vorbis"', "ogg-vorbis"],
        ['video/ogg; codecs="opus"', "ogg-opus"],
        ['video/mp4; codecs="avc1.4D401E"', "mp4-avc1"],
        ['video/mp4; codecs="mp4a.40.2"', "mp4-mp4a"],
        ['video/mp4; codecs="flac"', "mp4-flac"],
        ['video/webm; codecs="vp8.0"', "webm-vp8"],
        ['video/webm; codecs="vp9"', "webm-vp9"],
        ['video/webm; codecs="vorbis"', "webm-vorbis"]
    ];

    //el resultado de cada formato con sus codecs puede ser maybe si a lo mejor puede, probably si coincide con el codec
    //o "" si no lo soporta
    var videosSoportados = new Array();
    for (var i in tipos)
        videosSoportados.push(new Array(tipos[i][0], tipos[i][1], objVideo.canPlayType(tipos[i][0])));//nombre, nombrebd y resultado
    return videosSoportados; //devolvemos array con el formato y el resultado de si se puede utilizar
}

/*
listaVideo es una lista con los pares formato y resultado de la comprobacion de reproducción de formato
Pinta la tabla html con los resultados de los formatos de video soportados
 */
function resultadoVideo(listaVideo){
    var valor;
    var salida = "<table><tr><th colspan='3'>Formatos de video soportados</th></tr><th>Formatos</th><th>Similaridad</th><th>Valor</th>"; //el borde va por css y el colspan
    for (var i in listaVideo) {
        if (listaVideo[i][2] == "")
            valor = "No soportado";
        else
            valor = listaVideo[i][2];
        salida += "<tr><td>" + listaVideo[i][0] + "</td><td id='video-" + listaVideo[i][1]+ "'><img class='cargando' src='img/animated.png'></td><td>" + valor + "</td></tr>";
    }
    salida += "</table>";
    return salida;
}