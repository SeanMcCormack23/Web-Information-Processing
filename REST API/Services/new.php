<?php

include 'connection.php';

//gets type of request
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


// if its a POST, grab the necessary information
if ($_SERVER['REQUEST_METHOD']=='POST'){

	$name =  $array['name'];
	$url = $array['URL'];
	$description = $array['description'];


}


// if its a PUT, get the relevant information
if ($_SERVER['REQUEST_METHOD']=='PUT'){
$name =  $array['name'];
$url = $array['URL'];
$description = $array['description'];

$id = $array['id'];
}

// if its a DELETE, get the ID we want to delete

if($_SERVER['REQUEST_METHOD']=="DELETE" ){
	$id = $array['id'];
}

//if its the unique request I subbed for GET, find the id to return
if ($_SERVER['REQUEST_METHOD']=="GET_POST"){
	$id = $array['id'];

}





//determines what happens based on the type of request sent
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

//makes sure that the SQL has occured
 $result = mysqli_query($connection,$sql);

// if it doesn't work
if (!$result){
	$var_array = mysqli_error($connection);
	$database = $var_array;

}


 // saves the sql statement to a json to debug and find the routing
$load = $sql;
//gets the variables of the statement if it is returning a select statement
		while($row=mysqli_fetch_assoc($result)){
		$nameStored = $row['Name'];
 		$dateStored = $row['Date'];
		$URLStored = $row['URL'];
		$descriptionStored = $row['Description'];


		}

// bag stores all the information that we have collected from the select statement

  $bag= array($nameStored,$dateStored,$URLStored,$descriptionStored);
 $load = $bag;

//encoding this into a json
$new = json_encode($load);
file_put_contents('../Data/database.json', $new);



?>