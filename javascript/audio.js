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

function resultadoAudio(listaAudio) {
    var valor;
    var salida = "<table><tr><th colspan='3'>Formatos de Audio soportados</th></tr><th>Formatos</th><th>Similaridad</th><th>Valor</th>"; //el borde va por css y el colspan
    for (var i in listaAudio) {
        if (listaAudio[i][2] == "")
            valor = "No soportado";
        else
            valor = listaAudio[i][2];
        salida += "<tr><td>" + listaAudio[i][0] + "</td><td id='audio-" + listaAudio[i][1]+ "'><img id='cargando' src='img/animated.png'></td><td>" + valor + "</td></tr>";
    }
    salida += "</table>";
    return salida;
}