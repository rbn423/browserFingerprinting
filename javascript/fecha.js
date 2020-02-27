function timeZone() {
    var fecha = new Date();
    return new Array("Diferencia entre la UTC y la hora local en minutos","zonaHoraria",fecha.getTimezoneOffset());
}
// del tipo date se puede sacar cuando se conecto igual podria estar guay
function arrayFecha() {
    return timeZone();
}