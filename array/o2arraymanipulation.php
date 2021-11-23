<?php
$students = [
    "Rahim",
    "Karim",
    123,
    "Monir"
];

$students[2] = "Shafiq";

// $student = array_pop($students);
$student = array_shift($students);

$students[] = "Jamal"; //add new element in last
array_push($students, "kamal"); //add new element in last
array_unshift($students, "Abu Rayhan"); //add new element in first

$n = count($students);

for ($i = 0; $i < $n; $i++) {
    echo $students[$i] . "\n";
}
echo PHP_EOL;
echo $student;

// array_shift();       //for get data (first element)
// array_unshift();     //for entry/add data
// array_pop();         //for get data (last element)
// array_push();        //for entry/add data
