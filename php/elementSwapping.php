<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here

 
function findMinArray($arr, $k) {
  // Write your code here
  // get the indice of smallest number, if its 
  // get smallest number from first $k+1 elements, if $k+1 >= $arr length, get all
  // swap starting from the smallest number and its left number, if no left number, skip
  
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

$n_1 = 3;
$k_1 = 2;
$arr_1 = array(5, 3, 1);
$expected_1 = array(1, 5, 3);
$output_1 = findMinArray($arr_1,$k_1);
check($expected_1, $output_1);

$n_2 = 5;
$k_2 = 3;
$arr_2 = array(8, 9, 11, 2, 1);
$expected_2 = array(2, 8, 9, 11, 1);
$output_2 = findMinArray($arr_2,$k_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>