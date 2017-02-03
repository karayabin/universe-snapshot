<?php 


use Bat\FileSystemTool;

require_once "bigbang.php";


$planetsDir = "/myphp/universe/planets";


function error($m){
	echo $m . PHP_EOL; 
}


$replace = false;


if(is_dir($planetsDir)){
	$files = file(__DIR__ . "/ling-planets.txt", \FILE_IGNORE_NEW_LINES|\FILE_SKIP_EMPTY_LINES);
	foreach($files as $f){			
		$file = $planetsDir . "/" . $f;
		if(false===$replace && file_exists($file)){
			continue;
		}	
		echo "$f" . PHP_EOL;
		FileSystemTool::remove($file);
		exec('cd "'. $planetsDir .'"; git clone https://github.com/lingtalfi/' . $f);
	}
}
else{
	error("PlanetsDir not found: " . $planetsDir);
}