<?php

function count_triplets($indicies, $ratio) {
  $count = 0;
  $indicies_dict = arr_to_dict_counter($indicies);
  foreach($indicies_dict as $index => $num) {    
    if(has_triplet($indicies_dict, $index, $ratio)) {  
      $count+=triplet_parings($indicies_dict, $index, $ratio);
    }
  }
  return $count;
}

function has_triplet($dict, $index, $ratio){
  return array_key_exists($index, $dict) && 
        array_key_exists($index*$ratio, $dict) && 
        array_key_exists($index*$ratio*$ratio, $dict);
}

# Assumes there is at least one triplet pairing
function triplet_parings($dict, $index, $ratio) {
  return $dict[$index] * $dict[$index*$ratio] * $dict[$index*$ratio*$ratio];
}

# Change array to dictionary but counter number of repeating elements.
function arr_to_dict_counter($arr) {
  $dict = array();
  foreach($arr as $value) {
    isset($dict[$value]) ? $dict[$value]++ : $dict[$value] = 1;
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
