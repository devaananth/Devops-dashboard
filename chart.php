<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://raw.githack.com/leighquince/Chart.js/master/Chart.js"></script>
<canvas id="canvas" height="350" width="600"></canvas>

<script type="text/javascript">
	var teamChartLabel = [
    	"Continuos Planning", 
    	"Continuos Integration", 
    	"Continuos Deployment", 
    	"Continuos Monitoring", 
    	"Continuos Measurement"
	];
	var p = {
		labels: teamChartLabel,
		benchMarkLineData: [70, 70, 70, 70, 70],
		projectStatusData: [32, 25, 88, 92, 33]
	};
	var ctx = document.getElementById("canvas").getContext("2d");
	loadChart(p, ctx);
	function loadChart(params, ctx) {
		var data = {
			labels: params.labels,
			datasets: [{
				label: "Project Status",
				//new option, barline will default to bar as that what is used to create the scale
				type: "line",
				fillColor: "rgba(220,220,220,0)",
				strokeColor: "rgba(0,0,0,0.6)",
				pointColor: "rgba(0,0,0,0.6)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(220,220,220,1)",
				datasetFill:false,
				data: params.benchMarkLineData
			}, {
				label: "Project Status",
				//new option, barline will default to bar as that what is used to create the scale
				type: "Bar",
				fillColor: "rgba(220,20,220,0.2)",
				strokeColor: "rgba(220,20,220,1)",
				pointColor: "rgba(220,20,220,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(220,220,220,1)",
				data: params.projectStatusData
			}]
		};
		var chart = new Chart(ctx).Overlay(data, {
  			responsive: false
		});
	}
</script>