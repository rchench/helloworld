<?php

//Add any extra import statements you may need here


// Add any helper functions you may need here


function areTheyEqual($s, $t) {
  sort($s);
  sort($t);
  if($s === $t) {
    return true;
  } else {
    return false;
  }
}









 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

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


$a_1 = array(1, 2, 3, 4);
$b_1 = array(1, 4, 3, 2);
$expected_1 = true;
$output_1 = areTheyEqual($a_1, $b_1);
check($expected_1, $output_1);

$a_2 = array(1, 2, 3, 4);
$b_2 = array(1, 2, 3, 5);  
$expected_2 = false;
$output_2 = areTheyEqual($a_2, $b_2);
check($expected_2, $output_2);
    
// Add your own test cases here 

   
?>