<?php

// Complete the countingValleys function below.
function countingValleys($steps, $path) {
  echo "N: $steps\n";
  echo "S: $path\n";
  return "1";
}

#$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stout = fopen('php://stdout', 'w');

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $steps);

$path= '';
fscanf($stdin, "%[^\n]", $path);

$result = countingValleys($steps, $path);

fwrite($stout, $result . "\n");

fclose($stdin);
fclose($stout);
