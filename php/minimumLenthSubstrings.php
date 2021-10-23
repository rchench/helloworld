<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here


function minLengthSubstring($s, $t) {
  // Write your code here
  $ls = strlen($s);
  $lt = strlen($t);
  $arrt = str_split($t);
  sort($arrt);
  $t = implode($arrt);

  for ($i=$lt; $i<=$ls; $i++) {
    for ($j=0; $j<$ls-$i; $j++) {
      $arru = str_split(substr($s, $j, $i));
      sort($arru);
      $u = "";
      for($k=0; $k<$i; $k++) {
        if(in_array($arru[$k], $arrt)) {
          $u .= $arru[$k];
        }
      }
//      echo " $u $t\n";
      if($u == $t) {
        return $i;
      }
    }
  }
  return -1;
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

$s1 = "dcbefebce";
$t1 = "fd";
$expected_1 = 5;
$output_1 = minLengthSubstring($s1, $t1);
check($expected_1, $output_1);

$s2 = "bfbeadbcbcbfeaaeefcddcccbbbfaaafdbebedddf";
$t2 = "cbccfafebccdccebdd";
$expected_2 = -1;
$output_2 = minLengthSubstring($s2, $t2);
check($expected_2, $output_2);
    
// Add your own test cases here

   
?>