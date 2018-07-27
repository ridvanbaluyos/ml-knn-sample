<?php
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;

$samples = [];
$labels = [];
$row = 1;

$sepalLength = 0;
$sepalWidth = 1;
$petalLength = 2;
$petalWidth = 3;
$label = 4;


if (($handle = fopen("iris.csv", "r")) !== false) {
	while (($data = fgetcsv($handle, 1000, ",")) !== false) {
		$num = count($data);
		$row++;

		$sample = [$data[$petalLength], $data[$petalWidth]];
		
		array_push($samples, $sample);
		array_push($labels, $data[$label]);
	}
	fclose($handle);
}

$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);
$prediction = $classifier->predict([5.5, 1.4]);

echo $prediction;
