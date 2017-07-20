function updateProject(fName) {
	var teamChartData = [];
	var teamChartBackgroundColor = [];
	var teamChartLabel = [
    	"Continuos Planning", 
    	"Continuos Integration", 
    	"Continuos Deployment", 
    	"Continuos Monitoring", 
    	"Continuos Measurement", 
    	"Total Score"
	];
	$.ajax({
	  	url: "files.php",
	  	async: false,
	  	data: {getdata: true, fileName: fName + '.json'},
	  	success: function (jsonData) {
	  		var params = [];
	  		teamChartData = [];
	  		for (var i = 0; i < teamChartLabel.length; i++) {
	  			if (jsonData.application.hasOwnProperty(teamChartLabel[i])) {
	  				teamChartData.push(jsonData.application[teamChartLabel[i]]);
	  			}
	  		}
	  		alert(teamChartData);
			var params = {
				labels: teamChartLabel,
				benchMarkLineData: [70, 70, 70, 70, 70],
				projectStatusData: teamChartData
			};
			loadChart(params);
	  	}
	});
	//Change progress list when project changed
	listProgress(fName);
}

/* 
 * input -> parms
 * Curreltly loaded chart with 70% as value to acheived 
 */
function loadChart(params) {
	var projectStatus;
	var ctx = document.getElementById("projectStatus").getContext("2d");
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
	/*if( window.projectStatus !== undefined) {
		window.projectStatus.destroy();
	}*/
	var chart = new Chart(ctx).Overlay(data, {
		responsive: false
	});
}

/*
 * Method to make all first letter in upper case
*/
function ucFirstAllWords( str )
{
    var pieces = str.split("_");
    for ( var i = 0; i < pieces.length; i++ )
    {
        var j = pieces[i].charAt(0).toUpperCase();
        pieces[i] = j + pieces[i].substr(1);
    }
    return pieces.join(" ");
}

/*
 * Progress data listed in tables (1st page bottom section)
*/
function listProgress(projectName) {
	//projectName = 'IRN-66393';
	var dprocess = [
		'tool',
		'consulted',
		'trained',
		'implemented'
	];

	$.ajax({
	  	url: "files.php",
	  	async: false,
	  	data: {getdata: true, fileName: projectName + '.json'},
	  	success: function (jsonData) {
	  		var params = [];
	  		var dProgressResp = jsonData.application.devops_progress;
	  		//params['teamChartLabel'] = teamChartLabel;

			var progressData = '';
			progressData += '<div class="p-row">';
				progressData += '<table class="table" id="progressDataTable">';
					progressData += '<thead>';
					    progressData += '<tr>';
							progressData += '<th>#</th>';
							progressData += '<th>Consulted</th>';
							progressData += '<th>Implemented</th>';
							progressData += '<th>Tool</th>';
							progressData += '<th>Trained</th>';
					    progressData += '</tr>';
				  	progressData += '</thead>';
				  	progressData += '<tbody>';
					  	$.each(dProgressResp, function(k, v) {
					  		var mconsulted_score = (v.consulted_score == 1) ? '<span class="done">&#10003;</span>' : '<span class="not_done">X</span>';
					  		var implemented_score = (v.implemented_score == 1) ? '<span class="done">&#10003;</span>' : '<span class="not_done">X</span>';
					  		var tool_score = (v.tool_score == 1) ? '<span class="done">&#10003;</span>' : '<span class="not_done">X</span>';
					  		var trained_score = (v.trained_score == 1) ? '<span class="done">&#10003;</span>' : '<span class="not_done">X</span>';
					    	progressData += '<tr>';
								progressData += '<th scope="row">'+ ucFirstAllWords(k) +'</th>';
								progressData += '<td>'+ mconsulted_score  +'</td>';
								progressData += '<td>'+ implemented_score +'</td>';
								progressData += '<td>'+ tool_score +'</td>';
								progressData += '<td>'+ trained_score +'</td>';
					    	progressData += '</tr>';
				    	});
				  	progressData += '</tbody>';
				progressData += '</table>';
			progressData += '</div>';

			$('.list-progress').html(progressData);
			$('#progressDataTable').DataTable();
		}
	});
}

/*
 * Generate differt colors each time for graph
*/
var dynamicColors = function() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgb(" + r + "," + g + "," + b + ")";
}

/*
 * First garh currently not used
*/
//var ctx = document.getElementById("myChart").getContext('2d');	
var myChart;
function initChart(params) {
	var teamChartoptions = {
	    type: 'horizontalBar',
	    data: {
	        labels: params['teamChartLabel'],
	        datasets: [{
	            label: '# Devops Score',
	            data: params['teamChartData'],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    },
	    responsive : true
	};

	if( window.myChart !== undefined) {
		window.myChart.destroy();
	}
	window.myChart = new Chart(ctx, teamChartoptions);
}