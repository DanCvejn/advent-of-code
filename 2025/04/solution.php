<?php

$input = file_get_contents('input.txt');

function partOne(string $input): int {
  $sum = 0;

  $directions = [
    [-1, -1], [0, -1], [1, -1],
    [-1, 0], [1, 0],
    [-1, 1], [0, 1], [1, 1],
  ];

  $parsedInput = explode("\n", $input);
  foreach ($parsedInput as $y => $line) {
    for ($x = 0; $x < strlen($line); $x++) {
      $char = $parsedInput[$y][$x];
      if ($char === '.') continue;
      $neighbourCount = 0;
      foreach ($directions as $dir) {
        $isInBounds = $x + $dir[0] >= 0 && $y + $dir[1] >= 0 &&
          $x + $dir[0] < strlen($line) && $y + $dir[1] < count($parsedInput);
        if ($isInBounds && $parsedInput[$y + $dir[1]][$x + $dir[0]] === "@")
          $neighbourCount++;
      }
      if ($neighbourCount < 4) $sum++;
    }
  }
  return $sum;
}

function partTwo(string $input): int {
  $sum = 0;

  $directions = [
    [-1, -1], [0, -1], [1, -1],
    [-1, 0], [1, 0],
    [-1, 1], [0, 1], [1, 1],
  ];

  $parsedInput = explode("\n", $input);
  do {
    $lastRemoved = 0;
    foreach ($parsedInput as $y => $line) {
      for ($x = 0; $x < strlen($line); $x++) {
        $char = $parsedInput[$y][$x];
        if ($char === '.') continue;
        $neighbourCount = 0;
        foreach ($directions as $dir) {
          $isInBounds = $x + $dir[0] >= 0 && $y + $dir[1] >= 0 &&
            $x + $dir[0] < strlen($line) && $y + $dir[1] < count($parsedInput);
          if ($isInBounds && $parsedInput[$y + $dir[1]][$x + $dir[0]] === "@")
            $neighbourCount++;
        }
        if ($neighbourCount < 4) {
          $sum++;
          $lastRemoved++;
          $parsedInput[$y][$x] = ".";
        }
      }
    }
  } while ($lastRemoved > 0);

  return $sum;
}

echo partOne($input) . "\n";
echo partTwo($input) . "\n";