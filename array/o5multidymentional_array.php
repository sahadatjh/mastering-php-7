<?php
$foods = [
    'vagitables' => explode(', ', 'bringal, brocoli, carrot, capsicum'),
    'fruits'     => explode(', ', 'orrance, mango, jackfruit, apple'),
    'drinks'     => explode(', ', 'water, milk')
];


print_r($foods);
// $foods['drinks'][] = "juice";
array_push($foods['drinks'], "Orange Juce");

$n = array_shift($foods['fruits']);
print_r($foods);

echo $n;
