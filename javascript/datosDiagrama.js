function cargaDiagrama() {
	// Load Charts and the corechart and barchart packages.
	google.charts.load('current', {'packages':['corechart']});

	// Draw the pie chart and bar chart when Charts is loaded.
	google.charts.setOnLoadCallback(drawChart);
	
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","BD/cargaDiagrama.php",true);
	xmlhttp.responseType = 'json';
	xmlhttp.send();	
	
	function drawChart() {
		var data = new google.visualization.DataTable();
		var num = xmlhttp.response;
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'Slices');
		data.addRows([		  
		  ['Edge', num[0]],
		  ['Chrome', num[1]],
		  ['Firefox', num[2]],
		  ['Opera', num[3]]
		]);
		
		//Piechart
		var piechart_options = {title:'Pie Chart: Navegador',
					   width:500,
					   height:400};
		var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
		piechart.draw(data, piechart_options);
		
		//Barchart
		var barchart_options = {title:'Barchart: Navegador',
					   width:500,
					   height:400,
					   legend: 'none'};
		var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
		barchart.draw(data, barchart_options);
	}
}