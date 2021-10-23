<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here

 
function maxCandies($arr, $k) {
  // Write your code here
  $l = sizeof($arr);
  sort($arr);
  $n = 0;
  for($i=0; $i<$k; $i++) {
    $n += $arr[$l-1];
    $arr[$l-1] = floor($arr[$l-1] / 2);
    sort($arr);
  }
  return $n;
}  









 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.
function printInteger($n) {
  echo "[". $n . "]";
}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = false;
  if ($expected == $output) {
     $result = true;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result) {
    echo json_decode('"'.$rightTick.'"');
    echo " Test #".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test #"
    .$test_case_number. ": Expected ";
    printInteger($expected);
    echo " Your Output : ";
    printInteger($output);
    echo "\n";
  }
  $test_case_number += 1;
}

$n_1 = 5; $k_1 = 3;
$arr_1 = [2, 1, 7, 4, 2];
$expected_1 = 14;
$output_1 = maxCandies($arr_1, $k_1);
check($expected_1, $output_1);

$n_2 = 9; $k_2 = 3;
$arr_2 = [19, 78, 76, 72, 48, 8, 24, 74, 29];
$expected_2 = 228;
$output_2 = maxCandies($arr_2, $k_2);
check($expected_2, $output_2);
    
// Add your own test cases here 

   
?>