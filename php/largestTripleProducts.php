<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


function findMaxProduct($arr) {
  // Write your code here
  $newarr = array();
  for($i=0; $i<sizeof($arr); $i++) {
    $tmparr[$i] = $arr[$i];
    sort($tmparr);
    if($i<2) {
      $newarr[$i] = -1;
    } else {
      $newarr[$i] = $tmparr[$i-2] * $tmparr[$i-1] * $tmparr[$i];
    }
  }
  return $newarr;
}










 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.
function printInteger($n) {
  echo "[". $n ."]";
}

function printIntegerList($arr) {
  $len = count($arr);
  echo "[";
  for($i = 0; $i < $len; $i++){
    if($i !=0){
      echo ', ';
    }
    echo $arr[$i];
  }
  echo "]";

}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = true;
  if($expected != $output) {
    $result = false;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result)  {
    echo json_decode('"'.$rightTick.'"');
    echo " Test #".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test #".$test_case_number. ": Expected ";
    printIntegerList($expected);
    echo " Your Output : ";
    printIntegerList($output);
    echo "\n";
  }
  $test_case_number += 1; 
}

$arr_1 = array(1, 2, 3, 4, 5);
$expected_1 = array(-1, -1, 6, 24, 60);
$output_1 = findMaxProduct($arr_1);
check($expected_1, $output_1);

$arr_2 = array(2, 4, 7, 1, 5, 3);
$expected_2 = array(-1, -1, 56, 56, 140, 140);
$output_2 = findMaxProduct($arr_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>