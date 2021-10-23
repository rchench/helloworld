<?php

// Add any extra import statements you may need here

// Add any helper functions you may need here

 
function rotationalCipher($input, $rotation_factor) {
  // Write your code here
  $rtn = "";
  for ($i=0; $i<strlen($input); $i++) {
	$c = $input[$i];
    if(preg_match("/[0-9]/", $c)) {
		$r = $rotation_factor % 10;
		$c = $c + $r;
		$c = ($c > 9) ? $c - 10 : $c;
	} elseif (preg_match("/[a-z]/", $c)) {
		$r = $rotation_factor % 26;
		$n = ord($input[$i]) + $r;
		$n = ($n > ord('z')) ? $n - ord('z') + ord('a') - 1 : $n;
		$c = chr($n);
	} elseif (preg_match("/[A-Z]/", $c)) {
		$r = $rotation_factor % 26;
		$n = ord($input[$i]) + $r;
		$n = ($n > ord('Z')) ? $n - ord('Z') + ord('A') - 1 : $n;
		$c = chr($n);
	}
	$rtn .= $c;
  }
  return $rtn;
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

$input_1 = "All-convoYs-9-be:Alert1.";
$rotation_factor_1 = 4;
$expected_1 = "Epp-gsrzsCw-3-fi:Epivx5.";
$output_1 = rotationalCipher($input_1, $rotation_factor_1);
check($expected_1, $output_1);

$input_2 = "abcdZXYzxy-999.@";
$rotation_factor_2 = 200;
$expected_2 = "stuvRPQrpq-999.@";
$output_2 = rotationalCipher($input_2, $rotation_factor_2);
check($expected_2, $output_2);
    
// Add your own test cases here

   
?>