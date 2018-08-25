<?php


$servername = "localhost";
$database = "Customers";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername,$username,$password,$database);


if(!$conn){
	echo "Error";
}
else {
	// echo "Connected....";
}




$sql = "select * from CustomerDetails;";

$query = mysqli_query($conn,$sql);

if($query){
	// echo "Successful Query";
}
else {
	echo "Unsuccessful Query";
}




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


$fp = fopen('database.json', 'w');

$jsonContacts = json_encode($Contacts);
fwrite($fp,$jsonContacts);

echo $jsonContacts;




?>