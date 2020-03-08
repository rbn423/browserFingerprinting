function formatosSoportadosVideo() {
    var objVideo = document.getElementById("movie");

    var tipos=[
        'video/ogg; codecs="theora"',
        'video/ogg; codecs="vorbis"',
        'video/ogg; codecs="opus"',
        'video/mp4; codecs="avc1.4D401E"',
        'video/mp4; codecs="mp4a.40.2"',
        'video/mp4; codecs="flac"',
        'video/webm; codecs="vp8.0"',
        'video/webm; codecs="vp9"',
        'video/webm; codecs="vorbis"'
    ];

    //el resultado de cada formato con sus codecs puede ser maybe si a lo mejor puede, probably si coincide con el codec
    //o "" si no lo soporta
    var videosSoportados = new Array();
    for (var tipo in tipos)
            videosSoportados.push(new Array(tipos[tipo], objVideo.canPlayType(tipos[tipo])));
    return videosSoportados; //devolvemos array con el formato y el resultado de si se puede utilizar
}

function resultadoVideo(listaVideo){
    var valor;
    var salida = "<table border='visible'><th colspan='2'>Formatos de video soportados</th>"; //el borde va por css y el colspan
    for (var i in listaVideo) {
        if (listaVideo[i][1] == "")
            valor = "No soportado";
        else
            valor = listaVideo[i][1];
        salida += "<tr><td>" + listaVideo[i][0] + "</td><td>" + valor + "</td></tr>";
    }
    salida += "</table>";
    return salida;
}