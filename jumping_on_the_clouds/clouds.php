<?php

// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c) {


}

$stdout = fopen("php://stdout", "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c);

fwrite($stdout, $result . "\n");

fclose($stdin);
fclose($stdout);
