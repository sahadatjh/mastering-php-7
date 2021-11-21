<?php
// $json = '{"country":"বাংলাদেশ"}';
// print_r(json_decode($json, 1));

// $json = "{'country':'বাংলাদেশ'}";
$json = "{\"country\":\"বাংলাদেশ\"}";
print_r(json_decode($json, 1));
echo json_last_error_msg();
