<?php

if (isset($_GET['getdata']) && $_GET['getdata'] == true) {
	header('Content-Type: application/json');
	$fileDir = "source";
	$jsonInfo = file_get_contents($fileDir."/".$_GET['fileName']);
	echo $json_a = json_decode(json_encode($jsonInfo), true);
	exit;
}

/*if (isset($_GET['getJson']) && $_GET['getJson'] == true) {
	header('Content-Type: application/json');
	$fileDir = "source";
	$jsonInfo = file_get_contents($fileDir."/".$_GET['projectName']);
	echo $json_a = json_decode(json_encode($jsonInfo), true);
	exit;
}*/


$fDir = new DirectoryIterator("source");
$jsonFileInfo = array();
$i = 0;
foreach ($fDir as $file) {
	if ($file->isFile()) {
		$jsonFileInfo[$i]['fileName'] = $file->getFilename();
	  	$jsonFileInfo[$i]['projName'] = pathinfo($file->getFilename(), PATHINFO_FILENAME);
	  	$i ++;
	}
}