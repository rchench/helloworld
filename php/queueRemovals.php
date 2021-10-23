<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here

 
function findPositions($arr, $x) {
  // Write your code here
  // construct the key/value pair
  $newarr = array();
  foreach($arr as $key=>$value) {
    array_push($newarr, array("seq"=>$key, "value"=>$value)); 
  }
  for($i=0; $i<$x; $i++) {
    $l = sizeof($newarr);
    $n = ($x <= $l) ? $x : $l;
    for($j=0; $j<$n; $j++) {
      if($j == 0) {
        $maxindex = $j;
        $maxvalue = $newarr[$j]["value"];
      } elseif($newarr[$j]["value"] > $maxvalue) {
        $maxindex = $j;
        $maxvalue = $newarr[$j]["value"];
      }
    }
    $rstarr[$i] = $newarr[$maxindex]["seq"] + 1;
    $tmparr = array();
    for($k=$n; $k<$l; $k++) {
      array_push($tmparr, $newarr[$k]);
    }
    for($k=0; $k<$n; $k++) {
      if($k != $maxindex) {
        $newarr[$k]["value"]--;
        if($newarr[$k]["value"] < 0) {
          $newarr[$k]["value"] = 0;
        }
        array_push($tmparr, $newarr[$k]);
      }
    }
    $newarr = $tmparr;
  }

  return $rstarr;
}










 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printInteger($n) {
  echo "[". $n ."]";
}
function printIntegerList($arr) {
  $len = count($arr);
  echo "[";
  for($i = 0; $i < $len; $i++){
    if($i !=0){
      echo ', ';
    }
    echo $arr[$i];
  }
  echo "]";

}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = true;
  if($expected != $output) {
    $result = false;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result)  {
    echo json_decode('"'.$rightTick.'"');
    echo " Test #".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test #".$test_case_number. ": Expected ";
    printIntegerList($expected);
    echo " Your Output : ";
    printIntegerList($output);
    echo "\n";
  }
  $test_case_number += 1; 
}

$n_1 = 6;
$x_1 = 5;
$arr_1 = array(1, 2, 2, 3, 4, 5);
$expected_1 = array(5, 6, 4, 1, 2 );
$output_1 = findPositions($arr_1, $x_1);
check($expected_1, $output_1);

$n_2 = 13;
$x_2 = 4;
$arr_2 = array(2, 4, 2, 4, 3, 1, 2, 2, 3, 4, 3, 4, 4);
$expected_2 = array(2, 5, 10, 13);
$output_2 = findPositions($arr_2, $x_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>