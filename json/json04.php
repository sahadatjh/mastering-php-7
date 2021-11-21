<?php
class Person
{
    public $firstName;
    public $lastName;
    private $private = "private";
}

$p = new Person();
$p->firstName = "Abul";
$p->lastName = "Bashar";

$jsonData =  json_encode($p);
// echo $jsonData;


// $decodedJsonData = json_decode($jsonData);

$decodedJsonData = json_decode($jsonData, true);
print_r($decodedJsonData);

echo $decodedJsonData['firstName'] . "\n"; //if jason decode pass true (return array)

// echo $decodedJsonData->firstName;

// print_r(json_decode(json_encode(["key" => "value"])));
