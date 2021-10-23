<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


 
function getTotalTime($arr) {
  // Write your code here
  $l = sizeof($arr);
  $p = 0;
  for($i=0; $i<$l-1; $i++) {
    sort($arr);
    $ll = sizeof($arr);
    $p += $arr[$ll-1] + $arr[$ll-2];
    $arr[$ll-2] += $arr[$ll-1];
    unset($arr[$ll-1]);
  }
  return $p;
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
    echo " Test #".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test #".$test_case_number. ": Expected ";
    printInteger($expected);
    echo " Your Output : ";
    printInteger($output);
    echo "\n";
  }
  $test_case_number += 1;
}

$arr_1 = array(4, 2, 1, 3);
$expected_1 = 26;
$output_1 = getTotalTime($arr_1);
check($expected_1, $output_1);

$arr_2 = array(2, 3, 9, 8, 4);
$expected_2 = 88;
$output_2 = getTotalTime($arr_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>