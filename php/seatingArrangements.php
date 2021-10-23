<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


 
function minOverallAwkwardness1($arr) {
  // Write your code here
  $l = sizeof($arr);
  rsort($arr);
  if ($l % 2 == 1) {
    $start = 1;
    $left = $arr[0];
    $right = $arr[0];
  } else {
    $start = 2;
    if($arr[0] >= $arr[1]) {
      $left = $arr[0];
      $right = $arr[1];
    } else {
      $left = $arr[1];
      $right = $arr[0];
    }
  }
  $awk = abs($left-$right);

  for($i=$start; $i<$l; $i=$i+2) {
    if($arr[$i] >= $arr[$i+1]) {
      $nleft = $arr[$i];
      $nright = $arr[$i+1];
    } else {
      $nleft = $arr[$i+1];
      $nright = $arr[$i];
    }
    if($left - $nleft > $awk) {
      $awk = $left - $nleft;
    }
    if($right - $nright > $awk) {
      $awk = $right - $nright;
    }
    $left = $nleft;
    $right = $nright;
  }
  return $awk;
}

function minOverallAwkwardness($arr) {
  // Write your code here
  $l = sizeof($arr);
  rsort($arr);
  $newarr = array();
  if ($l % 2 == 1) {
    $left = floor($l / 2);
    $right = floor($l / 2);
    $newarr[$left] = $arr[0];
    $start = 1;
  } else {
    $left = $l / 2;
    $right = $l / 2  - 1;
    $start = 0;
  }

  $j = 0;
  for($i=$start; $i<$l; $i=$i+2) {
    $j++;
    if($arr[$i] >= $arr[$i+1]) {
      $newarr[$left  - $j] = $arr[$i];
      $newarr[$right + $j] = $arr[$i+1];
    } else {
      $newarr[$left  - $j] = $arr[$i+1];
      $newarr[$right + $j] = $arr[$i];
    }
  }
  ksort($newarr);
  echo implode(",", $newarr)."\n";
  return awkwardness($newarr);
}

function awkwardness($arr) {
  $l = sizeof($arr);
  $maxawk = 0;
  for($i=0; $i<$l; $i++) {
    if ($i == 0) {
      $awk = abs($arr[$i] - $arr[$l-1]);
    } else {
      $awk = abs($arr[$i] - $arr[$i-1]);
    }
    if ($awk > $maxawk) {
      $maxawk = $awk;
    }
  }
  return $maxawk;
}









 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printInteger($n) {
  echo "[". $n . "]";
}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = true;
  if($expected != $output){
    $result = false;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result) {
    echo json_decode('"'.$rightTick.'"');
    echo " Test # ".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test # ".$test_case_number. ": Expected ";
    printInteger($expected);
    echo " Your Output : ";
    printInteger($output);
    echo "\n";
  }
  $test_case_number += 1;
}

$arr_1 = array(5, 10, 6, 8);
$expected_1 = 4;
$output_1 = minOverallAwkwardness($arr_1);
check($expected_1, $output_1);

$arr_2 = array(1, 2, 5, 3, 7);
$expected_2 = 4;
$output_2 = minOverallAwkwardness($arr_2);
check($expected_2, $output_2)

// Add your own test cases here

   
?>