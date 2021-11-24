<?php
$foods = [
    'vagitables' => 'bringal, brocoli, carrot, capsicum',
    'fruits'     => 'orrance, mango, jackfruit, apple',
    'drinks'     => 'water, milk'
];

foreach ($foods as $key => $value) {
    echo $key . ' => ' . $value . "\n";
}
echo "-------------\nanother wey\n-------------\n";
$keys = array_keys($foods);
for ($i = 0; $i < count($keys); $i++) {
    $key = $keys[$i];
    echo $key . " => " . $foods[$key] . "\n";
}
echo "--------------------------\n";
$values = array_values($foods);
$v = count($values);
for ($i = 0; $i < $v; $i++) {
    echo $values[$i] . "\n";
}
echo "--------------------------\n";
//add new element existing element
// $foods['drinks'] = $foods['drinks'] . ", orange juce";
$foods['drinks'] .= ", orange juce";
foreach ($foods as $key => $value) {
    echo $key . " = " . $value . "\n";
}
