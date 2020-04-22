function cargaDiagrama(elemento) {
	var nombres = cargarNombres(elemento);
	
	// Load Charts and the corechart and barchart packages.
	google.charts.load('current', {'packages':['corechart']});
	// Draw the pie chart and bar chart when Charts is loaded.	
	
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	if (elemento == "Navegador")
		xmlhttp.open("GET","BD/cargaDiagramaNavegador.php",true);
	else if (elemento == "Accept-Encoding")
		xmlhttp.open("GET","BD/cargaDiagramaAcceptEncoding.php",true);

	xmlhttp.responseType = 'json';
	xmlhttp.send();
	
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  google.charts.setOnLoadCallback(drawChart);
		}
	};	
	
	function drawChart() {
		var data = new google.visualization.DataTable();
		var num = xmlhttp.response;
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'Slices');
		for (var i=0; i<nombres.length; i++){
			data.addRows([[nombres[i], num[i]]]);
		}		
		
		//Piechart
		var piechart_options = {title:'Pie Chart: ' + elemento,
					   width:500,
					   height:400};
		var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
		piechart.draw(data, piechart_options);		
		
		//Barchart
		/*var barchart_options = {title:'Barchart: Navegador',
					   width:500,
					   height:400,
					   legend: 'none'};
		var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
		barchart.draw(data, barchart_options);*/
	}
}

function cargarNombres(elemento) {
	var nombres;
	if (elemento == "Navegador")
		nombres = ['Edge','Chrome','Firefox','Opera'];
	else if (elemento == "Accept-Encoding")
		nombres = ['gzip, deflate, br','gzip, deflate'];
	return nombres;
}