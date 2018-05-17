<?php

include 'connection.php';

$method= $_SERVER['REQUEST_METHOD'];





	$data = file_get_contents('php://input'); // this is the data sent from AJAX.
	$data = json_decode($data);


	 $database = file_get_contents('/Data/database.json');
	 $database = json_decode($database);

	 $reader = file_get_contents('/Data/data.json');
	 $reader =json_decode($reader);

	 $array = array();



	 foreach($data as $row){
	 	foreach($row as $key => $value){
	 	
	 	$array[$key] = $value;

	 	}
	 }

$name =  $array['name'];
$url = $array['URL'];
$description = $array['description'];

$id = $array['id'];



if ($_SERVER['REQUEST_METHOD']=='PUT'){
	$id = $array['id'];
}



switch ($method){
	case'POST':
	$sql = "INSERT INTO  Assignment5 (Name,URL,Description) values ('$name','$url','$description');"; break;
	case 'PUT':
	$sql = "UPDATE Assignment5 set Name = '$name', URL = '$url', Description = '$description' where ID = '$id';"; break;

}


 $result = mysqli_query($connection,$sql);


if (!$result){
	$var_array = mysqli_error($connection);
	$database = $var_array;

}
else {
	$database = $sql;
}



$database = $id;






 $newData = json_encode($database);
 file_put_contents('/Data/database.json',$newData );




$send = json_encode($data);
	file_put_contents('/Data/data.json',$send);
	



?>