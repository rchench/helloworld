<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here

 
function findSignatureCounts($arr) {
  // Write your code here
  $l = sizeof($arr);
  for ($i=0; $i<$l; $i++) {
    $newarr[$i] = 1;
  }
  for ($i=1; $i<=$l; $i++) {
    $j = $arr[$i-1];
    if ($j != $i) {
      $arr[$i-1] = $i;
      $newarr[$i-1]++;
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

$arr_1 = array(2, 1);
$expected_1 = array(2, 2);
$output_1 = findSignatureCounts($arr_1);
check($expected_1, $output_1);

$arr_2 = array(1, 2);
$expected_2 = array(1, 1);
$output_2 = findSignatureCounts($arr_2);
check($expected_2, $output_2);

// Add your own test cases here
$arr_3 = array(1, 2, 3);
$expected_3 = array(1, 1, 1);
$output_3 = findSignatureCounts($arr_3);
check($expected_3, $output_3);

$arr_4 = array(3, 2, 1);
$expected_4 = array(2, 1, 2);
$output_4 = findSignatureCounts($arr_4);
check($expected_4, $output_4);
?>