<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


 
function balancedSplitExists($arr){
  // Write your code here
  $s = array_sum($arr);
  if ($s % 2 == 1) {
    return false;
  }

  $s1 = 0;
  rsort($arr);
  foreach($arr as $k=>$v) {
    $s1 += $v;
    if ($s1 == $s / 2) {
      if ($arr[$k+1] < $v) {
        return true;
      } else {
        return false;
      }
    } elseif ($s1 > $s / 2) {
      return false;
    }
  }
}  
 
 
 
 
 
 
 
 
 
 
 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printString($n){
  echo  "[ ". $n . " ]";
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

$arr_1 = array(2, 1, 2, 5);
$expected_1 = true;
$output_1 = balancedSplitExists($arr_1);
check($expected_1, $output_1);

$arr_2 = array(3, 6, 3, 4, 4);
$expected_2 = false;
$output_2 = balancedSplitExists($arr_2);
check($expected_2, $output_2);
    
// Add your own test cases here

   
?>