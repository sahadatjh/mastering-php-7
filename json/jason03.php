<?php
class Person
{
    public $firstName = "Sahadat";
    public $lastName = "Hossain";
    private $private = "private";
}

$p = new Person();
// echo $p->firstName;

echo json_encode($p);
