<?php

const SEA_LEVEL = 0;
const VALLEY_LEVEL = -1;
const MOUNTAIN_LEVEL = 1;

function isValidMove($move) {
  return ($move == "D" || $move == "U");
}

function calcElevation($move, $cur_elv) {
  if($move == "D") {
    return --$cur_elv;
  }
  elseif($move == "U") {
    return ++$cur_elv;
  }
  else {
    // Should do some error handling here?
    echo "Invalid move $move";
    exit;
  }
}

// Complete the countingValleys function below.
function countingValleys($steps, $path_notes) {
  $path = str_split($path_notes);
  $elevation = SEA_LEVEL;
  $prev_move = '';
  $valleys_walked = 0;
  $in_valley = false;
  foreach($path as $move) {
    if(!isValidMove($move)) {
      // Again error handling?
      echo "Invalid move $move";
      continue;
    }
    $elevation=calcElevation($move, $elevation);
    echo "Elv: $elevation\n";
    
    if(!$in_valley && $elevation <= VALLEY_LEVEL) {
      echo "Hit D\n";
      $in_valley = true;
      $valleys_walked++;
    }
    elseif($in_valley && $elevation >= SEA_LEVEL) {
      echo "Hit U\n";
      // Includes mountains and sea level.
      $in_valley = false;
    }
    echo "Valleys Walked: " . $valleys_walked . "\n";
    $prev_move = $move;
  }
  return $valleys_walked;
}

$stout = fopen('php://stdout', 'w');

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $steps);

$path_notes = '';
fscanf($stdin, "%[^\n]", $path_notes);

$result = 0;
$result = countingValleys($steps, $path_notes);

fwrite($stout, "result: " . $result . "\n");

fclose($stdin);
fclose($stout);
