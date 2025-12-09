<?php

$input = file_get_contents('input.txt');

function partOne(string $input): int {
  $sum = 0;
  [$freshRanges, $availableIngs] = explode("\n\n", $input);
  foreach(explode("\n", $availableIngs) as $ingredient) {
    $betweenFresh = false;
    foreach(explode("\n", $freshRanges) as $range) {
      $start = (int) explode("-", $range)[0];
      $end = (int) explode("-", $range)[1];
      if ($start <= (int) $ingredient && (int) $ingredient <= $end) {
        $betweenFresh = true;
        break;
      }
    }
    if ($betweenFresh) $sum++;
  }

  return $sum;
}

echo partOne($input) . "\n";