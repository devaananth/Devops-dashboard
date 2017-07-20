<!DOCTYPE html>
<html>
<head>
	<title>Devop's Dashboard</title>
	<script src="js/jquery.min.js"></script>
	<script src="js/chart.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="css/bootstrap-select.min.css" >
	<script src="js/bootstrap-select.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/pb-style.css">
	<script src="js/jquery.dataTables.min.js" ></script>
</head>
<body>
	<?php require_once('files.php'); ?>
	<div class="container">
		<div class="row">
			<span style="text-align:center; text-decoration: underline;"><h3>Devop's Dashboard</h3></span>
		</div>
		<div class="row">
			Choose IRN:			 
			<select class="selectpicker" data-live-search="true" onchange="return updateProject(this.value);">
				<?php 
					foreach ($jsonFileInfo as $key => $value) {
						echo "<option data-tokens='".$value['projName']."'>".$value['projName']."</option>";
					}
				 ?>
			</select>
		</div>
		<div class="row">
			<hr/>
			<div class="col-md-6">
				<h4>Project Status</h4><hr/>
				<div class="my-box" style="">
					<canvas id="projectStatus" width="600" height="350"></canvas>
				</div>
			</div>
  			<div class="col-md-6">
  				<div class="my-box">
  					<h4>Metrics</h4><hr/>
  					<div class="dd-metrics">
	  					<table class="table table-bordered">  
						    <tr>
						      <td>Commit Frequency</td>
						      <td>0</td>
						      <td>Automated Test Coverage %</td>
						      <td>0</td>
						    </tr>
						    <tr>
						      <td>Deployment lead time</td>
						      <td>0</td>
						      <td>MTTR</td>
						      <td>0</td>
						    </tr>
						    <tr>
						      <td>Technical Debt</td>
						      <td>0</td>
						      <td>Cycle Time</td>
						      <td>0</td>
						    </tr>
						    <tr>
						      <td>Frequency of Deployment</td>
						      <td>0</td>
						      <td>Deployment success rate</td>
						      <td>0</td>
						    </tr>
						    <tr>
						      <td>Speed of build of verification(QA)</td>
						      <td>0</td>
						      <td>Incident/defect volumes</td>
						      <td>0</td>
						    </tr>
						    <tr>
						      <td>Security test pass rate </td>
						      <td>0</td>
						      <td>Frequency of build verification (QA)</td>
						      <td>0</td>
						    </tr>
						    <tr>
						      <td>Requirements coverage ratio</td>
						      <td>0</td>
						      <td></td>
						      <td></td>
						    </tr>
						</table>	
					</div>
  				</div>
  			</div>
		</div>
		<div class="row">
			<h4>Progress</h4><hr/>
			<div class="col-md-12 list-progress">
				<div class="p-row">
					<div class="pg-label">
						<label>Use Agile Methodology</label>
					</div>
					<div class="pg-progress">
						<div class="circle done">
							<span class="label">&#10003;</span>
							<span class="title">Tool</span>
						</div>
						<span class="bar done"></span>
						<div class="circle done">
							<span class="label">&#10003;</span>
							<span class="title">Consulted</span>
						</div>
						<span class="bar half"></span>
						<div class="circle active">
							<span class="label">&#10003;</span>
							<span class="title">Trained</span>
						</div>
						<span class="bar"></span>
						<div class="circle">
							<span class="label">&#10003;</span>
							<span class="title">Implemented</span>
						</div>
					</div>
				</div>
				<!-- <div class="wrap">
					<label style="float:left; left:20px;">Use Agile Methodology: </label>
					<ul class="checkout-bar" style="float:left; width: 60%;">
						<li class="active">Tool</li>
						<li class="active">consulted</li>
						<li class="inactive">Trained</li>
						<li class="inactive">Implemented</li>
					</ul>
				</div> -->
			</div>
		</div>
	</div>
	<script src="js/app.js" crossorigin="anonymous"></script>
	<script>
		updateProject('IRN-66393');
		listProgress('IRN-66393');
	</script>
</body>
</html>