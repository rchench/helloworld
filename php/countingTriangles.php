<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


function countDistinctTriangles($arr) {
  // Write your code here
  $n = sizeof($arr);
  for ($i=0; $i<sizeof($arr); $i++) {
    sort($arr[$i]);
    for($j=0; $j<$i; $j++) {
      if($arr[$j][0] == $arr[$i][0] && $arr[$j][1] == $arr[$i][1] && $arr[$j][2] == $arr[$i][2]) {
        $n--;
      }
    }
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

$arr_1 = array([7, 6, 5], [5, 7, 6], [8, 2, 9], [2, 3, 4], [2, 4, 3]);
$expected_1 = 3;
$output_1 = countDistinctTriangles($arr_1);
check($expected_1, $output_1);

$arr_2 = array([3, 4, 5], [8, 8, 9], [7, 7, 7]);
$expected_2 = 3;
$output_2 = countDistinctTriangles($arr_2);
check($expected_2, $output_2)

// Add your own test cases here

   
?>