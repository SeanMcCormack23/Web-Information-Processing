<?php
$method = $_SERVER['REQUEST_METHOD']; //tells me what request it is.


$name = $_POST["name"];
$url = $_POST['URL'];
$description = $_POST['description'];

$date = date("Y-m-d H:i:s");

$array= array('name'=>$name,'Date'=>$date,'URL'=>$url,'description'=>$description);


$data_results = file_get_contents('data.json');

$temp = json_decode($data_results);

array_push($array,$temp);



$jsonData = json_encode($array);

file_put_contents('data.json', $jsonData);





?>