<?php
function getMaxAdditionalDinersCount(int $N, int $K, int $M, array $S): int {
  // Write your code here
  for ($i=0; $i< $N; $i++) {
    $T[$i] = 0;
  }
  for ($i=0; $i< sizeof($S); $i++) {
    $T[$S[$i] - 1] = 1;
    for ($j=1; $j<=$K; $j++) {
      if($S[$i] - $j > 0) {
        $T[$S[$i] - $j - 1] = 1;      
      }
      if($S[$i] + $j - 1< $N) {
        $T[$S[$i] + $j - 1] = 1;      
      }
    }
  }
//print_r($T);
  $c = 0;
  $n = 0;
  for ($i=0; $i<$N; $i++) {
    if($T[$i] == 0) {
      $c++;
    }

    if(($T[$i] == 1 && $c!=0) || ($T[$i] == 0 && $i == $N-1)) {
      $n += floor(($c - 1) / ($K + 1)) + 1;
      $c = 0;
    } 
  }

  return $n;
}

$N = 10;
$K = 1;
$M = 2;
$S = array(2,6);
echo getMaxAdditionalDinersCount($N, $K, $M, $S);

echo getMaxAdditionalDinersCount(15, 2, 3, array(11, 6, 14));
/*
1 2 3 4 5 6 7 8 9 10 11 12 13 14 15
      o o x o o o  o  x  o  o  x  o
*/
?>