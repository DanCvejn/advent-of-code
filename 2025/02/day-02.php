<?php

$input = file_get_contents('input.txt');

function partOne(string $input): int {
  $sum = 0;
  $parsedInput = explode(",", $input);
  foreach($parsedInput as $range) {
    $start = (int) explode("-", $range)[0];
    $end = (int) explode("-", $range)[1];
    for ($i = $start; $i <= $end; $i++) {
      if (strlen((string) $i) % 2 === 0) {
        $parts = str_split((string) $i, (strlen((string) $i) / 2));
        if ($parts[0] === $parts[1]) $sum += $i;
      }
    }
  }
  return $sum;
}

function partTwo(string $input): int {
  $sum = 0;
  $parsedInput = explode(",", $input);
  foreach($parsedInput as $range) {
    $start = (int) explode("-", $range)[0];
    $end = (int) explode("-", $range)[1];
    for ($i = $start; $i <= $end; $i++) {
      $num = (string) $i;
      for ($divider = 1; $divider <= (strlen($num) / 2); $divider++) {
        $parts = str_split($num, $divider);
        $same = true;
        for ($j = 1; $j < count($parts); $j++) {
          if ($parts[$j - 1] !== $parts[$j] && $same) $same = false;
        }
        if ($same) {
          $sum += $i;
          break;
        }
      }
    }
  }
  return $sum;
}

echo partOne($input) . "\n";
echo partTwo($input) . "\n";