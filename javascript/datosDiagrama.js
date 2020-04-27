function cargaDiagrama(elemento) {
	
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
	xmlhttp.open("GET","BD/cargaDiagrama.php?elemento="+elemento,true);
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
		for (var clave in num){
		  data.addRows([[clave, parseInt(num[clave],10)]]);
		}	
		
		//Piechart
		var piechart_options = {title: elemento,
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