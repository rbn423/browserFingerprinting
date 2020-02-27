function asincronia(elementosJS,id) {
    if (elementosJS == null) {
        document.getElementById("prueba2").innerHTML = "nada";
        return;
    } else {
        var formData = new FormData();
        formData.append("ID",id);
        for (var i = 1; i < elementosJS.length; i++){
            formData.append(elementosJS[i][1], elementosJS[i][2]);
        }

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resultadoJS").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","BD/cargaJS.php",true);
        xmlhttp.send(formData);
    }
}