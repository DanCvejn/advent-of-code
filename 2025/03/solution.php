<?php

$input = file_get_contents('input.txt');

function getHighestIn(string $remainingLine): int {
  $highestIndex = 0;
  for ($i = 0; $i < strlen($remainingLine); $i++) {
    $num = (int) $remainingLine[$i];
    if ($num > (int) $remainingLine[$highestIndex]) $highestIndex = $i;
  }
  return $highestIndex;
}

function solution(string $input, int $joltageLength): int {
  $sum = 0;
  foreach (explode("\n", $input) as $line) {
    $joltage = "";
    $remaining = strlen($line) - $joltageLength + 1;
    $highestIndex = 0;
    for ($i = 0; $i < $joltageLength; $i++) {
      $newHighestIndex = getHighestIn(substr($line, $highestIndex, $remaining));
      $remaining -= $newHighestIndex;
      $joltage .= $line[$newHighestIndex + $highestIndex];
      $highestIndex = $newHighestIndex + $highestIndex + 1;
    }
    $sum += (int) $joltage;
  }
  return $sum;
};

echo solution($input, 2) . "\n";
echo solution($input, 12) . "\n";