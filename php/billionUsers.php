<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


 
function getBillionUsersDay($growthRates) {
  // Write your code here
  $target = 1000000000;
  $no_of_apps = sizeof($growthRates);
  for($i=0; $i<$no_of_apps; $i++) {
    $no_of_users[$i] = 1;
  }
  $days = 0;

  while($total < $target) {
    $days++;
    $total = 0;
    for($i=0; $i<$no_of_apps; $i++) {
      $no_of_users[$i] = $no_of_users[$i] * $growthRates[$i];
      $total += $no_of_users[$i];
    }
  }
  return $days;
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

$test_1 = array(1.1, 1.2, 1.3);
$expected_1 = 79;
$output_1 = getBillionUsersDay($test_1);
check($expected_1, $output_1);

$test_2 = array(1.01, 1.02);
$expected_2 = 1047;
$output_2 = getBillionUsersDay($test_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>