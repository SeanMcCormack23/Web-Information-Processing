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

$town = $_POST['searchLocation'];




if($requestType == "POST"){

$sql = "SELECT * FROM CustomerDetails WHERE Town = '$town';";

}


$query = mysqli_query($conn,$sql);



while ($row = mysqli_fetch_array($query)){
	
	$firstname = $row['FirstName'];
	$lastname = $row['LastName'];
	$phonenumber = $row['PhoneNumber'];
	$street = $row['Street'];
	$address = $row['Address'];
	$town = $row['Town'];
	$county = $row['County'];
	$country = $row['Country'];
	$website = $row['Website'];
	
	$Contacts[] = array("FirstName"=> $firstname, "LastName"=> $lastname, "PhoneNumber"=>$phonenumber,"Street"=>$street,"Address"=>$address,"Town"=>$town,"County"=>$county,"Country"=>$country,"Website"=>$website);

	
	
	
}


$fp = fopen('carrier.json', 'w');

$jsonContacts = json_encode($Contacts);
fwrite($fp,$jsonContacts);

echo $jsonContacts;



  $newURL = "http://localhost:8888/search.html";


  header('Location: '.$newURL);




?>