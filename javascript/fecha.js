function timeZone() {
    var fecha = new Date();
    return fecha.getTimezoneOffset();
}
// del tipo date se puede sacar cuando se conecto igual podria estar guay
function resultadoFecha() {
    var salida = "";
    salida += "- Diferencia entre la UTC y la hora local en minutos = " + timeZone() + "<br/>";
    return salida;
}