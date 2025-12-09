<?php

$input = file_get_contents('input.txt');
$zeros = 0;
$zerosInProgress = 0;
$currPos = 50;

function calcPosRecursive(int $newPos): int {
  global $zerosInProgress;
  if ($newPos < 0) {
    $zerosInProgress++;
    $newPos = calcPosRecursive($newPos + 100);
  } else if ($newPos > 99) {
    $zerosInProgress++;
    $newPos = calcPosRecursive($newPos - 100);
  }
  return $newPos;
}

function calcPos(int $move) {
  global $currPos, $zeros;
  $currPos = calcPosRecursive($currPos + $move);
  if ($currPos === 0) {
    $zeros++;
  }
}

foreach (explode("\n", $input) as $line) {
  preg_match('/(L|R)(\d+)/', $line, $matches);
  if ($matches[1] === "R") {
    calcPos($matches[2]);
  } else {
    calcPos(-1 * $matches[2]);
  }
}

// Final solution should be 5872

echo "Ended on: $currPos\nCount of landed zeros: $zeros\nCount of go throught zeros: $zerosInProgress\n";