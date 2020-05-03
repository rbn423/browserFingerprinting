//https://browserleaks.com/canvas#how-does-it-work el funcionamiento lo he aprendido de aqui

function pintar() {
    var salida = null;
    var canvas = document.getElementById('canvas_result');
    if (canvas.getContext) {
        var ctx = canvas.getContext('2d');

        ctx.fillStyle = 'rgb(255, 0, 0)'; //cuadrado rojo
        ctx.fillRect(10, 10, 50, 50);

        ctx.fillStyle = 'rgb(0, 0, 255)'; //cuadrado azul
        ctx.fillRect(50, 50, 50, 50);

        ctx.fillStyle = 'rgb(255, 255, 0)'; //cuadrado amarillo
        ctx.fillRect(30, 30, 50, 50);

        var txt = "😜";//emoji
        ctx.textBaseline = "middle";
        ctx.font = "40px 'Arial'";
        ctx.fillStyle = 'rgb(0,0,0)';
        ctx.fillText(txt,150,50);

        var txt = "PrUeBa De CaNvAs En Tu NaVeGaDor";//texto de prueba
        ctx.textBaseline = "middle";
        ctx.font = "12px 'Arial'";
        ctx.fillStyle = 'rgb(0,0,0)';
        ctx.fillText(txt,0,50);

        salida = canvas.toDataURL();
    }
    return new Array("Canvas","canvas",salida);
}