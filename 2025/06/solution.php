<?php

$input = file_get_contents('input.txt');

function partOne(string $input): int {
  $sum = 0;

  $parsedInput = explode("\n", $input);
  $nums = [];

  foreach ($parsedInput as $i => $line) {
    $nums[] = preg_split('/\s+/', $line);
  }

  for ($i = 0; $i < count($nums[0]); $i++) {
    $operationNums = [(int) $nums[0][$i], (int) $nums[1][$i], (int) $nums[2][$i], (int) $nums[3][$i]];
    $result = 1;
    foreach ($operationNums as $num) {
      if ($nums[4][$i] === "*") {
        $result *= $num;
      } else {
        $result += $num;
      }
    }
    if ($nums[4][$i] === "+") $result--;
    $sum += $result;
  }

  return $sum;
}

echo partOne($input) . "\n";