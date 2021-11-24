<?php
// $person = array("fname" => "Hello", "lname" => "World");
// $newperson = $person; //deep copy or copy by value 
// $newperson['lname'] = 'Pluto';

// print_r($person);
// print_r($newperson);

$person = array("fname" => "Hello", "lname" => "World");
$newperson = &$person; //shallow copy or copy by reference 
$newperson['lname'] = 'Pluto';

print_r($person);
print_r($newperson);


// function printData(&$person)
function printData($person)
{
    $person["fname"] .= " Changed";
    print_r($person);
}

printData($person);
print_r($person);
