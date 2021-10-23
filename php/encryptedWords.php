<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


 
function findEncryptedWord($s) {
  // Write your code here
  $len = strlen($s);
  if($len == 1 || $len ==2) {
    return $s;
  } else {
    if ($len % 2 == 1) {
      $mid = $s[floor($len / 2)];
      $left = substr($s, 0, floor($len / 2));
      $right = substr($s, floor($len / 2) + 1);
    } else {
      $mid = $s[floor($len / 2) - 1];
      $left = substr($s, 0, floor($len / 2) - 1);
      $right = substr($s, floor($len / 2));
    }
    return findEncryptedWord($mid).$left.$right;
  }
}  








 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printString($str) {
  echo "[\"". $str . "\"]";
}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = true;
  if ($expected != $output) {
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
    printString($expected);
    echo " Your Output : ";
    printString($output);
    echo "\n";
  }
  $test_case_number += 1;
}

$s1 = "abc";
$expected_1 = "bac";
$output_1 = findEncryptedWord($s1);
check($expected_1, $output_1);

$s2 = "abcd";
$expected_2 = "bacd";
$output_2 = findEncryptedWord($s2);
check($expected_2, $output_2);
    
// Add your own test cases here

   
?>