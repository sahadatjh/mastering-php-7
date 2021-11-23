<?php
$n = '12';
// $students = array(
//     "rahim",
//     "karim",
//     123,
//     "Monir"
// );

$students = [
    "rahim",
    "karim",
    123,
    "Monir"
];

// echo $students[1];
// var_dump($students);
// echo count($students);

// for ($i = 0; $i < count($students); $i++) {
//     echo $students[$i] . "\n";
// }

$n = count($students);
// for ($i = 0; $i < $n; $i++) {
//     echo $students[$i];
//     echo PHP_EOL;
// }

for ($i = $n - 1; $i >= 0; $i--) {
    echo $students[$i];
    echo PHP_EOL;
}
