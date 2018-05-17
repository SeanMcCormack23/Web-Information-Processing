<?php

include 'connection.php';

$method= $_SERVER['REQUEST_METHOD'];





$data = file_get_contents('php://input'); // this is the data sent from AJAX.
$data = json_decode($data);


$load= file_get_contents('../Data/database.json');
$load = json_decode($load);

 $array = array();


	 foreach($data as $row){
	 	foreach($row as $key => $value){
	 	
	 	$array[$key] = $value;
	 	
	 	}
	 }



	 if ($_SERVER['REQUEST_METHOD']=='POST'){

		$name =  $array['name'];
		$url = $array['URL'];
		$description = $array['description'];


}



	if ($_SERVER['REQUEST_METHOD']=='PUT'){
		$name =  $array['name'];
		$url = $array['URL'];
		$description = $array['description'];

		$id = $array['id'];
	}


	if($_SERVER['REQUEST_METHOD']=="DELETE" ){
		$id = $array['id'];
	}

	if ($_SERVER['REQUEST_METHOD']=="GET_POST"){
		$id = $array['id'];

	}






	switch ($method){
		case'POST':
		$sql = "INSERT INTO  Assignment5 (Name,URL,Description) values ('$name','$url','$description');"; break;
		case 'PUT':
		$sql = "UPDATE Assignment5 set Name = '$name', URL = '$url', Description = '$description' where ID = '$id';"; break;
		case'DELETE':
		$sql = "DELETE FROM Assignment5 WHERE ID = '$id';"; break;
		case 'GET_POST':
		$sql = "SELECT * FROM Assignment5 WHERE ID='$id';"; break;

	}


 	$result = mysqli_query($connection,$sql);


	if (!$result){
		$var_array = mysqli_error($connection);
		$database = $var_array;

	}


 
	$load = $sql;

	while($row=mysqli_fetch_assoc($result)){
		$nameStored = $row['Name'];
 		$dateStored = $row['Date'];
		$URLStored = $row['URL'];
		$descriptionStored = $row['Description'];


	}


  	$bag= array($nameStored,$dateStored,$URLStored,$descriptionStored);
 	$load = $bag;


	$new = json_encode($load);
	file_put_contents('../Data/database.json', $new);


?>
