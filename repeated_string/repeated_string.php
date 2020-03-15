<?php

const TARGET_CHAR = 'a';

// A quick way of getting the char count for the caclulated string but not very efficient.
function naiveRepeatedString($str_sequence, $sampling_size) {
  $sequence_len = strlen($str_sequence);

  $repeat_for = floor($sampling_size/$sequence_len);
  $remainder = $sampling_size % $sequence_len;

  $calcd_string = str_repeat($str_sequence, $repeat_for) . str_pad('', $remainder, $str_sequence);

  $char_count = count_chars($calcd_string, 0)[ord(TARGET_CHAR)];
  
  return $char_count;
}

$stout = fopen('php://stdout', 'w');

$stdin = fopen("php://stdin", "r");

$str_sequence = '';
fscanf($stdin, "%[^\n]", $str_sequence);

fscanf($stdin, "%ld\n", $sampling_size);

$result = 0;
$result = naiveRepeatedString($str_sequence, $sampling_size);

fwrite($stout, "result: " . $result . "\n");

fclose($stdin);
fclose($stout);
