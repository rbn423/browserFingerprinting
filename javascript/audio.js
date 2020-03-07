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
        'audio/mpeg',
        'audio/flac',
        'audio/wave',
        'audio/webm; codecs="vorbis"',
        'audio/mp3; codecs="mp3"'
    ];

    var audiosSoportados = new Array();
    for (var i in tipos)
        audiosSoportados.push(tipos[i] + " : " + objAudio.canPlayType(tipos[i]));
    return audiosSoportados;
}

function resultadoAudio(listaAudio) {
    var salida = "<table border='visible'><th>Formatos de Audio soportados</th>"; //el borde va por css
    for (var i in listaAudio)
        salida += "<tr><td>"+listaAudio[i]+"</td></tr>";
    salida += "</table>";
    return salida;
}