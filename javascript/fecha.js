function timeZone() {
    var fecha = new Date();
    return new Array("zonaHoraria",fecha.getTimezoneOffset());
}
// del tipo date se puede sacar cuando se conecto igual podria estar guay
function arrayFecha() {
    return timeZone();
}