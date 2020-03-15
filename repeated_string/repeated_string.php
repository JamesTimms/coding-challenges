<?php

// Complete the repeatedString function below.
function repeatedString($s, $n) {
  echo "Sequence: $s\n";
  echo "Sampling Size: $n\n";
}


$stout = fopen('php://stdout', 'w');

$stdin = fopen("php://stdin", "r");

$str_sequence = '';
fscanf($stdin, "%[^\n]", $str_sequence);

fscanf($stdin, "%ld\n", $sampling_size);

$result = 0;
$result = repeatedString($str_sequence, $sampling_size);

fwrite($stout, "result: " . $result . "\n");

fclose($stdin);
fclose($stout);
