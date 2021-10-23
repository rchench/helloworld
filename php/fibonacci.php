<?php
function fibonacci($n) {
  if ($n==0 || $n==1) {
    return 1;
  } else {
    return fibonacci($n-1) + fibonacci($n-2);
  }
}

function fib($n, &$memo) {
  if ($n==0 || $n==1) {
    return 1;
  } elseif (!isset($memo[$n])) {
    $memo[$n] = fibonacci($n-1) + fibonacci($n-2);
  }
  return $memo[$n];
}

for ($i=0; $i<8; $i++) {
  echo fib($i, $memo)." ";
}

?>