<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


 
function canGetExactChange1($targetMoney, $denominations, $loc = 0) {
  // Write your code here
  global $result, $no;
  $n = sizeof($denominations);
  if($loc == $n) {
    $total = 0;
    for($j=0; $j<$n; $j++) {
      $total += $no[$j]*$denominations[$j];
    }
    if ($total == $targetMoney) {
      echo $total.":".implode(",", $no)."\n";
      $result = true;
    }
  } else {
    if($loc == 0) {
      $result = false;
      $no = array();
    }
    $max = floor($targetMoney / $denominations[$loc]);
    for($i=0; $i<=$max; $i++) {
      $no[$loc] = $i;
      canGetExactChange($targetMoney, $denominations, $loc+1);
    }
  }
  return $result;
}  

function canGetExactChange(&$targetMoney, &$denominations, $loc = 0) {
  // Write your code here
  global $result, $no;
  $n = sizeof($denominations);
  if($loc == $n) {  // all perm done, sum it up
    $total = 0;
    for($j=0; $j<$n; $j++) {
      $total += $no[$j]*$denominations[$j];
    }
    if ($total == $targetMoney) {
      echo $total.":".implode(",", $no)."\n";
      $result = true;
    }
  } else {
    if($loc == 0) { // first element, reset the result and number
      $result = false;
      $no = array();
    }

    // count to minimize the loop
    $total = 0;
    for($j=0; $j<$loc; $j++) {
      $total += $no[$j]*$denominations[$j];
    }
    $max = floor(($targetMoney - $total) / $denominations[$loc]);

    // enum for each
    for($i=0; $i<=$max; $i++) {
      $no[$loc] = $i;
      canGetExactChange($targetMoney, $denominations, $loc+1);
    }
  }
  return $result;
}  





 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printString($str) {
  echo "[\"". $str . "\"]";
}

$test_case_number = 1;

function check($expected, $output){
  global $test_case_number;
  $result = true;
  if($expected != $output){
    $result = false;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if($result){
    echo json_decode('"'.$rightTick.'"');
      echo " Test # ".$test_case_number ;
      echo "\n";
  }
  else{
    echo json_decode('"'.$wrongTick.'"');
      echo " Test # ".$test_case_number. ": Expected ";
      printf("%s", $expected ? "true" : "false");
      echo " Your Output : ";
      printf("%s", $output ? "true" : "false");
      echo "\n";
  }
  $test_case_number += 1;
    
}

$target_1 = 94;
$arr_1 = array(5, 10, 25, 100, 200);
$expected_1 = false;
$output_1 = canGetExactChange($target_1, $arr_1);
check($expected_1, $output_1);

$target_2 = 75;
$arr_2 = array(4, 17, 29);
$expected_2 = true;
$output_2 = cangetExactChange($target_2, $arr_2);
check($expected_2, $output_2);
    
// Add your own test cases here

$target_3 = 125;
$arr_3 = array(1, 5, 10, 25, 100);
$expected_3 = true;
$output_3 = cangetExactChange($target_3, $arr_3);
check($expected_3, $output_3);

   
?>