<?php

// Add any extra import statements you may need here


// Add any helper functions you may need here

 
function getMilestoneDays($revenues, $milestones){
    // Write your code here
    for($i=0; $i<sizeof($revenues); $i++) {
      if($i == 0) {
        $ar[$i] = $revenues[$i];
      } else {
        $ar[$i] = $ar[$i-1] + $revenues[$i];
      }
    }

    for($j=0; $j<sizeof($milestones); $j++) {
      for($k=0; $k<sizeof($ar); $k++) {
        if($ar[$k] >= $milestones[$j]) {
          $md[$j] = $k + 1;
          break;
        }
      }
      if($k >= sizeof($ar)) {
        $md[$j] = -1;
      }
    }
    return $md;
}










 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printIntegerList($arr){
  $len= count($arr);
  echo "[ ";
  for($i=0 ; $i<$len ; $i++){
    if($i !=0){
      echo ', ';
    }
    echo $arr[$i];
  }
  echo " ]";

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
      printIntegerList($expected);
      echo " Your Output : ";
      printIntegerList($output);
      echo "\n";
  }
  $test_case_number += 1;    
}


$revenues_1 = [100, 200, 300, 400, 500];
$milestones_1 = [300, 800, 1000, 1400];
$expected_1 = [2, 4, 4, 5];
$output_1 = getMilestoneDays($revenues_1, $milestones_1);
check($expected_1, $output_1);

$revenues_2 = [700, 800, 600, 400, 600, 700];
$milestones_2 = [3100, 2200, 800, 2100, 1000];
$expected_2 = [5, 4, 2, 3, 2];
$output_2 = getMilestoneDays($revenues_2, $milestones_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>