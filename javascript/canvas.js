//https://browserleaks.com/canvas#how-does-it-work el funcionamiento lo he aprendido de aqui

function pintar() {
    var salida = null;
    var canvas = document.getElementById('canvas');
    if (canvas.getContext) {
        var ctx = canvas.getContext('2d');

        ctx.fillStyle = 'rgb(200, 0, 0)';
        ctx.fillRect(10, 10, 50, 50);

        ctx.fillStyle = 'rgba(0, 0, 200, 0.5)';
        ctx.fillRect(50, 50, 50, 50);

        ctx.fillStyle = 'rgb(255, 255, 0)';
        ctx.fillRect(30, 30, 50, 50);
        salida = canvas.toDataURL();
    }
    return new Array("Canvas","canvas",salida);
}