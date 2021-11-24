<?php
$person = array("fname" => "Hello", "lname" => "world");
print_r($person);

unset($person["lname"]);
print_r($person);
