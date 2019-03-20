	<?php 
	$servername =  "localhost";
	$username="root";
	$password ="";
	$dbname = "myDB";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
session_start();

// name value pair $_SESSION["key"] = now is equal to update. 
$_SESSION["key"]="update";

// updateID is coming from a POST form somewhere the action is the name of this file. 
$id = $_POST["updateID"];

// don't need this. 
$sql1="select * from eBook_MetaData where ID=$id;";





// all these came from the form. 
$creator = $_POST["updateCreator"];
$title = $_POST["updateTitle"];
$type = $_POST["updateType"];
$identifier= $_POST["identifier"];
$date = $_POST["updateDate"];
$language= $_POST["updateLanguage"];
$description = $_POST["updateDescription"];

// spits out values. 
echo $creator

// finds the exact row and updates 
$sql = "UPDATE eBook_MetaData SET creator = '$creator',
title = '$title', type='$type', identifier='$identifier',
date='$date',language='$language',description='$description'
WHERE ID = $id";


// using  $conn, it has a method called query that is written that allows you connect to the database. 
$result10 = $conn->query($sql1);

if(!$conn){
//die.......	
}

if(mysqli_query($conn, $sql1)){

	//foreach( int individualNumber in ListOfNumbers) {
	//dont specify the size or condition. 	
		
	//}
	// THis while loop is just keeping track of all of the variables that we're updating. 
	while($row=$result10->fetch_assoc()){
		$_SESSION["updatedID"]  = $row["ID"];
		$_SESSION["updatedCreator"] = $row["creator"];
		$_SESSION["updatedTitle"]= $row["title"];
		$_SESSION["updatedType"] = $row["type"];
		$_SESSION["updatedIdentifier"] = $row["identifier"];
		$_SESSION["updatedLanguage"] = $row["language"];
		$_SESSION["updatedDescription"] = $row["description"];
		$_SESSION["updatedDate"] = $row["date"];



		//<td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
		}
	// echo "\nDeletion Insertion occurred.";
	// $redirect = "http://localhost/Assignment3/retrieve.php?button1=";
	// header('Location: '.$redirect);
}














// runs the sql statement and the connect, 

if(mysqli_query($conn, $sql)){
	//debugging
	echo "\nInsertion occurred.";
	// redirects to retrieve.php with the view button
	$redirect = "http://localhost/Assignment3/retrieve.php?button1=";
	header('Location: '.$redirect);
 }
else {
	echo "\nError insertion:" .mysqli_error($conn);
}


mysqli_close($conn);
	?>
