<?php

const CUMULUS = 0;
const THUNDERHEAD = 1;

// Complete the jumpingOnClouds function below.
function jumpingOnClouds($clouds) {
  $cur_pos = 0;
  $steps = 0;
  for($pos = 0; $pos < (count($clouds)-1);) {
    if(($pos + 2) < count($clouds) && $clouds[$pos + 2] == CUMULUS) {
      $pos += 2;
      $steps++;
      continue;
    }
    elseif($clouds[$pos + 1] == CUMULUS) {
      $pos++;
      $steps++;
      continue;
    }
  }
  return $steps;
}

$stdout = fopen("php://stdout", "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $cloud_count);

fscanf($stdin, "%[^\n]", $clouds_raw);

$clouds = array_map('intval', preg_split('/ /', $clouds_raw, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($clouds);

fwrite($stdout, $result . "\n");

fclose($stdin);
fclose($stdout);
