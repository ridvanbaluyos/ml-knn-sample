<?php
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;

// [weight, diameter]
$samples = [[8, 11], [9, 10], [2, 4], [3, 1], [7, 10], [4, 2]];
$labels = ['Watermelon', 'Watermelon', 'Apple', 'Apple', 'Watermelon', 'Apple'];

$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);

$prediction = $classifier->predict([8, 10]);
echo $prediction;
