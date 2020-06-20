/*
comprueba para cada formato de nuestra lista si está soportado en el navegador. Tres posibles respuestas de este(maybe, probably, "")
 */
function formatosSoportadosAudio() {
    var objAudio = document.getElementById("sound");

    var tipos=[
        ['audio/ogg; codecs="vorbis"', "ogg-vorbis"],
        ['audio/ogg; codecs="opus"', "ogg-opus"],
        ['audio/3gpp', "3gpp"],
        ['audio/mp4; codecs="mp4a.40.5"', "mp4-mp4a"],
        ['audio/mp4; codecs="mp3"', "mp4-mp3"],
        ['audio/mp4; codecs="ac-3"', "mp4-ac3"],
        ['audio/mp4; codecs="ec-3"', "mp4-ec3"],
        ['audio/aac', "acc"],
        ['audio/pcm', "pcm"],
        ['audio/mpeg', "mpeg"],
        ['audio/flac', "flac"],
        ['audio/wave', "wave"],
        ['audio/webm; codecs="vorbis"', "webm-vorbis"],
        ['audio/mp3; codecs="mp3"', "mp3-mp3"]
    ];

    var audiosSoportados = new Array();
    for (var i in tipos)
        audiosSoportados.push(new Array(tipos[i][0], tipos[i][1], objAudio.canPlayType(tipos[i][0]))); //nombre, nombrebd y resultado
    return audiosSoportados;//devolvemos array con el formato y el resultado de si se puede utilizar
}

/*
listaAudio es una lista con los pares formato y resultado de la comprobacion de reproducción de formato
Pinta la tabla html con los resultados de los formatos de audio soportados
 */
function resultadoAudio(listaAudio) {
    var valor;
    var salida = "<table><tr><th colspan='3'>Formatos de Audio soportados</th></tr><th>Formatos</th><th>Similaridad</th><th>Valor</th>"; //el borde va por css y el colspan
    for (var i in listaAudio) {
        if (listaAudio[i][2] == "")
            valor = "No soportado";
        else
            valor = listaAudio[i][2];
        salida += "<tr><td><div class='nombreElemento'>" + listaAudio[i][0] + "</div>" +//nombre del elemento
            "<div class='tooltip'>info" + //palabra info que mostrará desplegable con la información al poner el puntero encima
            "<span class='tooltiptext'>"+getDescripcionJS('audio')+"</span></div>" +
            "</td>" +
            "<td id='audio-" + listaAudio[i][1]+ "'><img class='cargando' src='img/animated.png'></td>" +
            "<td>" + valor + "</td></tr>";
    }
    salida += "</table>";
    return salida;
}