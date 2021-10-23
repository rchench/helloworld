<?php
class foo {
    function do_foo() {
        echo "Doing foo.\n"; 
    }
}

$bar = new foo;
$bar->do_foo();

$obj = (object) array('1' => 'foo');
var_dump($obj);
print_r($obj);
echo $obj->{'1'};
echo "\n";

echo pow(8,1/3);

?>