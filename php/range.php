<?php
function awkwardness($arr) {
  $l = sizeof($arr);
  $maxawk = 0;
  for($i=0; $i<$l; $i++) {
    if ($i == 0) {
      $awk = abs($arr[$i] - $arr[$l-1]);
    } else {
      $awk = abs($arr[$i] - $arr[$i-1]);
    }
    if ($awk > $maxawk) {
      $maxawk = $awk;
    }
  }
  return $maxawk;
}

$arr_1 = array(5, 10, 6, 8);
echo awkwardness($arr_1);
?>