<?php
/**
 * convert a variable name as string
 */

function func(&$variable) {
    $backupValue = $variable;
    $variable = uniqid();

    foreach ($GLOBALS as $key => $value) {
        if (!is_array($key) && $value == $variable) {
            $variable = $backupValue;
            return $key;
        }
    }

    throw new Exception('error number xx');
}

$test1 = "This is a test";
$test2 = 'This is a second test';
$test3 = 'This is a second test';

$array = [];

$array[func($test1)] = $test1;
$array[func($test2)] = $test2;
$array[func($test3)] = $test3;

var_dump($array);
?>