function formatosSoportadosAudio() {
    var objAudio = document.getElementById("sound");

    var tipos=[
        'audio/ogg; codecs="vorbis"',
        'audio/ogg; codecs="opus"',
        'audio/3gpp',
        'audio/mp4; codecs="mp4a.40.5"',
        'audio/mp4; codecs="mp3"',
        'audio/mp4; codecs="ac-3"',
        'audio/mp4; codecs="ec-3"',
        'audio/aac',
        'audio/pcm',
        'audio/mpeg',
        'audio/flac',
        'audio/wave',
        'audio/webm; codecs="vorbis"',
        'audio/mp3; codecs="mp3"'
    ];

    var audiosSoportados = new Array();
    for (var i in tipos)
        audiosSoportados.push(new Array(tipos[i], objAudio.canPlayType(tipos[i])));
    return audiosSoportados;//devolvemos array con el formato y el resultado de si se puede utilizar
}

function resultadoAudio(listaAudio) {
    var valor;
    var salida = "<table border='visible'><th colspan='2'>Formatos de Audio soportados</th>"; //el borde va por css y el colspan
    for (var i in listaAudio) {
        if (listaAudio[i][1] == "")
            valor = "No soportado";
        else
            valor = listaAudio[i][1];
        salida += "<tr><td>" + listaAudio[i][0] + "</td><td>" + valor + "</td></tr>";
    }
    salida += "</table>";
    return salida;
}