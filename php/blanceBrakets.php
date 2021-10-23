<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here
 
function isBalanced($s) {
  // Write your code here
  $arr = str_split($s);
  $tmparr = array();
  for($i=0; $i<strlen($s); $i++) {
    if($arr[$i]=='[' || $arr[$i]=='{' || $arr[$i]=='(') {
      array_push($tmparr, $arr[$i]);
    } else {
      $l = sizeof($tmparr);
      if ($l == 0) {
        return false;
      } elseif(($arr[$i]==']' && $tmparr[$l-1]=='[') || ($arr[$i]=='}' && $tmparr[$l-1]=='{') || ($arr[$i]==')' && $tmparr[$l-1]=='(')) {
        array_pop($tmparr);
      } else {
        return false;
      }
    }
  }
  if(sizeof($tmparr) == 0) {
    return true;
  } else {
    return false;
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

$s1 = "{[(])}";
$expected_1 = false;
$output_1 = isBalanced($s1);
check($expected_1, $output_1);

$s2 = "{{[[(())]]}}";
$expected_2 = true;
$output_2 = isBalanced($s2);
check($expected_2, $output_2);
    
// Add your own test cases here

$s3 = ")";
$expected_3 = false;
$output_3 = isBalanced($s3);
check($expected_3, $output_3);
   
?>