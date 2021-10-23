<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here

 
function matchingPairs($s, $t) {
  // Write your code here

  // get all possible arrays after switching $s[$i] and $s[$j]
  $l = strlen($s);
  $n = 0;
  for ($i=0; $i<$l; $i++) {
    for ($j=$i+1; $j<$l; $j++) {
      $u = $s;
      $u[$i] = $s[$j];
      $u[$j] = $s[$i];
      // compare and get the number of matching charactors
      $m = 0;
      for($k=0; $k<$l; $k++) {
        if ($t[$k] == $u[$k]) {
          $m++;
        }
      }
      if ($m > $n) {
        $n = $m;
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
  $result = false;
  if ($expected == $output) {
    $result = true;
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

$s_1 = "abcde";
$t_1 = "adcbe";
$expected_1 = 5;
$output_1 = matchingPairs($s_1, $t_1);
check($expected_1, $output_1);

$s_2 = "abcd";
$t_2 = "abcd";
$expected_2 = 2;
$output_2 = matchingPairs($s_2, $t_2);
check($expected_2, $output_2);

    
// Add your own test cases here

   
?>