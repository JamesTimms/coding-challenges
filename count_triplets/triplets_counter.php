<?php

function count_triplets($indicies, $ratio) {
  if($ratio==1) {
    return ratio_of_one(count($indicies));
  }
  $count = 0;
  $indicies_dict = arr_to_dict_tracker($indicies);
  foreach($indicies_dict as $index => $pos_arr) {    
    if(has_triplet($indicies_dict, $index, $ratio)) {  
      $count+=naive_triplet_parings($indicies_dict, $index, $ratio);
    }
  }
  return $count;
}

function has_triplet($dict, $index, $ratio) {
  return array_key_exists($index, $dict) && 
        array_key_exists($index*$ratio, $dict) && 
        array_key_exists($index*$ratio*$ratio, $dict);
}

function naive_triplet_parings($dict, $index, $ratio) {
  $parings = 0;
  $t1 = $index;
  $t2 = $t1 * $ratio;
  $t3 = $t2 * $ratio;
  foreach($dict[$t1] as $i) {
    foreach($dict[$t2] as $j) {
      foreach($dict[$t3] as $k) {
        if($i < $j && $j < $k) $parings++;
      }
    }
  }
  return $parings;
}

function wip_triplet_parings($dict, $index, $ratio) {
  $parings = 0;
  $t1 = $index;
  $t2 = $t1 * $ratio;
  $t3 = $t2 * $ratio;
  foreach($dict[$t1] as $i) {
    foreach($dict[$t2] as $j) {
      foreach($dict[$t3] as $k) {
        if($i < $j && $j < $k) $parings++;
      }
    }
  }
  return $parings;
}

function ratio_of_one($n) {
  $count = 0;
  $max = $n-1;
  for($i=1; $i <= ($max-1); $i++) {
    for($j=0; $j <= ($max-$i); $j++) {
      $count+=$j;
    }
  } 
  return $count;
}

# Change array to dictionary but track repeating elements.
function arr_to_dict_tracker($arr) {
  $dict = array();
  foreach($arr as $pos => $value) {
    # Add to or intialise tracker, where the tracker is an array of positions stored in a dict of values.
    # Positions are stored in ascending order.
    isset($dict[$value]) ? $dict[$value][] = $pos : $dict[$value] = [$pos];
  }
  return $dict;
}

$fptr = fopen('php://stdout', "w");

$first_line = rtrim(fgets(STDIN));
$raw_input = explode(' ', $first_line);

$_num_of_indicies = intval($raw_input[0]);
$ratio = intval($raw_input[1]);

$indicies_temp = rtrim(fgets(STDIN));

$indicies = array_map('intval', preg_split('/ /', $indicies_temp, -1, PREG_SPLIT_NO_EMPTY));

$ans = count_triplets($indicies, $ratio);

fwrite($fptr, $ans . "\n");

fclose($fptr);
