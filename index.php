<?php 
	require "vendor/autoload.php";
	
	use eftec\bladeone\bladeone;
	
	$Views = __DIR__ . '\Views';
	$Cache = __DIR__ . '\Cache';
	
	$Blade = new BladeOne($Views, $Cache);
	
	echo $Blade->run('index');
?>

