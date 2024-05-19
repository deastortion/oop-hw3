<?php

include 'CollatzStatistics.php';
include 'ArithmeticProgression.php';

header("Content-Type: application/json");

$start = (int)$_POST["start"];
$end   = (int)$_POST["end"];
$collatz = new CollatzStatistics();
$data = $collatz->run($start, $end);
$startData = $data[0];
$endData = end($data);
$isArithmeticProgression = ArithmeticProgression::check($data[1]["sequence"]);
$statistics = $collatz->getStatistics($start, $end);

echo "Starting Value: " . $start . "\n";
echo "Ending Value: " . $end . "\n\n";
echo "Starting Value Data: " . json_encode($startData) . "\n";
echo "Ending Value Data: " . json_encode($endData) . "\n\n";
echo "Data: \n" . json_encode($data, JSON_PRETTY_PRINT) . "\n\n";
echo "Is the first sequence arithmetic progression: " . json_encode($isArithmeticProgression) . "\n\n";
echo "Statistics for histogram: " . json_encode($statistics) . "\n";