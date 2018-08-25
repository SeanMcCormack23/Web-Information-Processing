<?php 

$database = "Customers";
$servername = "localhost";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername,$username,$password,$database);

if ($conn){
	echo "Successful";
}
else {
	echo"Not\n";
}

$requestType=  $_SERVER['REQUEST_METHOD'];

$sql = "";


if($requestType == "POST"){
	$firstName = $_POST['FirstName'];
	$lastName= $_POST['LastName'];
	$phoneNumber = $_POST['PhoneNumber'];
	$street = $_POST['Street'];
	$address = $_POST['Address'];
	$town = $_POST['Town'];
	$county = $_POST['County'];
	$country = $_POST['Country'];

	$website = $_POST['Website'];

	$sql = "INSERT INTO CustomerDetails (FirstName,LastName,PhoneNumber,Street,Address,Town,County,Country, Website) 
	VALUES ('$firstName','$lastName','$phoneNumber','$street','$address','$town','$county','$country','$website');";
	
}


$query = mysqli_query($conn,$sql);

if (!$query){
	echo "didnt run the query";
}
else {
	echo "ran the query";

}

$fp = fopen('errors.json', 'w');


fwrite($fp,$sql);


$newURL = "http://localhost:8888/contacts.html";


header('Location: '.$newURL);




?>