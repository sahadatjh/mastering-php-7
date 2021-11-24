<?php

$students = array(
    "fname"   => "jamal",
    "lname"   => "ahmed",
    "age"     => "16",
    "class"   => "10",
    "section" => "A",
);

// print_r($students);
// //ugly code
// echo $students['fname'] . " " . $students['lname'] . "\n";
// //clean code
// printf("%s %s \n", $students["fname"], $students["lname"]);
// //useless join without key
// echo join(', ', $students);


// $serialized = serialize($students);
// echo $serialized;
// $unserialized = unserialize($serialized);
// print_r($unserialized);


$jsonData = json_encode($students);
echo $jsonData;
echo "---------------\n";

$decodedData = json_decode($jsonData, true); //true for array, without true return an object
print_r($decodedData);
