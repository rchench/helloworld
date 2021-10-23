<?php

// Add any extra import statements you may need here


class Node {
  public $data;
  public $next;
  function __construct($x) {
    $this->data = $x;
    $this->next = null;
  }
}

// Add any helper functions you may need here


function reverse($head) {
   // Write your code here
  $markstart = null;
  $last = null;
  $current = $head;
  while ($current != null) {
    if (($last == null || $last -> data % 2 == 1) && $current -> data % 2 == 0) {
      $markstart = $current;
    }

    if (($current -> data % 2 == 1 && $last -> data % 2 == 0) 
    || ($current -> data % 2 == 0 && $current -> next == null)) {
      if ($current -> data % 2 == 0 && $current -> next == null) {
        $markend = $current;
      } else {
        $markend = $last;
      }
      if ($markstart != $markend && $markstart != null) {
//        echo "$markstart->data $markend->data \n";

        $tmphead = $markstart;
        $tmparr = array();
        while ($tmphead != $markend->next) {
          array_push($tmparr, $tmphead->data);
          $tmphead = $tmphead -> next;
        }

        $tmphead = $markstart;
        while ($tmphead != $markend->next) {
          $tmphead->data = array_pop($tmparr);
          $tmphead = $tmphead -> next;
        }

      }
    }
    $last = $current;
    $current = $current -> next;
  }
  return $head;
}


function ReverseList($pHead){
  $old=$pHead;//Jump over node
  $new=null;
  $tmp=null;
  //Reversal process
  while($old!=null){
          $tmp=$old->next;
          $old->next=$new;
          $new=$old;
          $old=$tmp;
  }
  return $new;
}







 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printLinkedList($head) {
  echo "[";
  while ($head != null) {
    echo $head -> data;
    $head = $head -> next;
    if ($head != null) {
      echo " ";
    }
  }
  echo "]";
}

$test_case_number = 1;

function check($expectedHead, $outputHead) {
  global $test_case_number;
  $result = true;
  $tempExpectedHead = $expectedHead;
  $tempOutputHead = $outputHead;
  while ($expectedHead != null && $outputHead != null) {
    $result &= ($expectedHead -> data == $outputHead -> data);
    $expectedHead = $expectedHead -> next;
    $outputHead = $outputHead -> next;
  }
  if (!($expectedHead == null && $outputHead == null)) $result = false;

  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result) {
    echo json_decode('"'.$rightTick.'"');
    echo " Test #".$test_case_number ;
    echo "\n";
  } else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test #".$test_case_number. ": Expected ";
    printLinkedList($tempExpectedHead);
    echo " Your Output : ";
    printLinkedList($tempOutputHead);
    echo "\n";
  }
  $test_case_number += 1;
}
function createLinkedList($arr) {
  $head = null;
  $tempHead = $head;
  foreach ($arr as $v) {
    if ($head == null) {
      $head = new Node($v);
      $tempHead = $head;
    } else {
      $head -> next = new Node($v);
      $head = $head -> next;
    }
  }
  return $tempHead;
}

$head_1 = createLinkedList([1, 2, 8, 9, 12, 16]);
$expected_1 = createLinkedList([1, 8, 2, 9, 16, 12]);
$output_1 = reverse($head_1);
check($expected_1, $output_1);

$head_2 = createLinkedList([2, 18, 24, 3, 5, 7, 9, 6, 12]);
$expected_2 = createLinkedList([24, 18, 2, 3, 5, 7, 9, 12, 6]);
$output_2 = reverse($head_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>