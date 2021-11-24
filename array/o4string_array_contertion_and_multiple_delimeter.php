<?php
// $vagitable = "Carrot, capsicum, bringal, Brocoli";
// $vagitables = explode(', ', $vagitable);
// var_dump($vagitables);
// echo $vagitables[3];

// $vagitables = explode(', ', 'Brinjal, Carrot, Capcicum, Mula, Lau,potato,sweet-potato');
//when you need multiple delimeter you can use preg_split() function
$vagitables = preg_split('/(, |,)/', 'Brinjal, Carrot, Capcicum, Mula, Lau,potato, sweet-potato');
print_r($vagitables);
$vagitablesString = join(', ', $vagitables);
echo $vagitablesString;
