function cargaGrafico(elemento) {

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
	xmlhttp.open("GET","BD/cargaGrafico.php?elemento="+elemento,true);
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
			if (clave == null || clave == '')
				data.addRows([["Null", parseInt(num[clave],10)]]);
			else
				data.addRows([[clave, parseInt(num[clave],10)]]);
		}	
		
		//Piechart
		var piechart_options = {title: elemento,
			width:800,
			height:500,
			backgroundColor: 'transparent', //color de fondo
			is3D : true
		};
		var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
		piechart.draw(data, piechart_options);
	}
}