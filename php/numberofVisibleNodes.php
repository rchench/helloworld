<?php

// Add any extra import statements you may need here


class TreeNode{
  public $val;
  public $left;
  public $right;
  public function __construct($val=0) {
    $this->val = $val;
    $this->left = NULL;
    $this->right = NULL;
  }
}

// Add any helper functions you may need here


function visibleNodes($root) {
  // Write your code here
  global $depth, $max;
  if (!isset($depth)) {
    $depth = 0;
  } 
  if (!isset($max)) {
    $max = 0;
  } 
  $depth++;
  if ($depth > $max) {
    $max = $depth;
  }
  if ($root->left != null) {
    visibleNodes($root->left);
  }
  if ($root->right != null) {
    visibleNodes($root->right);
  }
  $depth--;
  return $max;
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
    echo " Test #".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test #".$test_case_number. ": Expected ";
    printInteger($expected);
    echo " Your Output : ";
    printInteger($output);
    echo "\n";
  }
  $test_case_number += 1;
}

// testcase 1
$root_1 = new TreeNode(8);
$root_1->left = new TreeNode(3);
$root_1->right = new TreeNode(10);
$root_1->left->left = new TreeNode(1);
$root_1->left->right = new TreeNode(6);
$root_1->left->right->left = new TreeNode(4);
$root_1->left->right->right = new TreeNode(7);
$root_1->right->right = new TreeNode(14);
$root_1->right->right->left = new TreeNode(13);
$expected_1 = 4;
$output_1 = visibleNodes($root_1);
check($expected_1, $output_1);


// testcase 2
$root_2 = new TreeNode(10);
$root_2->left = new TreeNode(8);
$root_2->right = new TreeNode(15);
$root_2->left->left = new TreeNode(4);
$root_2->left->left->right = new TreeNode(5);
$root_2->left->left->right->right = new TreeNode(6);
$root_2->right->left = new TreeNode(14);
$root_2->right->right = new TreeNode(16);
$expected_2 = 5;
$output_2 = visibleNodes($root_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>