	<?php 
	$servername =  "localhost";
	$username="root";
	$password ="";
	$dbname = "myDB";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}


// $_SESSION['KEY'] is the most important thing here. 

// WHen you click delete in the delete.php, it stores $_SESSION['KEY'] as the word "delete".



	session_start();

	// echo "ID "+$id;
	// echo "\ncreator "+$creator;
	// echo "\ntitle "+$title;
	// echo "\ntype "+$type;
	// echo "\nidentifier "+$identifier;
	// echo "\ndate "+$date;
	// echo "\nlanguage "+$language;
	// echo "\ndescription "+$description;





	
	//echo $_SESSION["key"];

	if($_SESSION["key"]=="create"){

		
		$sql="DELETE from eBook_MetaData order by id desc limit 1;";
		//$_SESSION["key"]="random";
	
	}


	else if($_SESSION["key"]=='delete'){

	$id = $_SESSION["deletedID"];
	$creator = $_SESSION["deletedCreator"];
	$title = $_SESSION["deletedTitle"];
	$type=$_SESSION["deletedType"];
	$identifier= $_SESSION["deletedIdentifier"];
	$date = $_SESSION["deletedDate"];
	$language = $_SESSION["deletedLanguage"];
	$description = $_SESSION["deletedDescription"];


		//echo "success";
		 $sql="INSERT INTO eBook_MetaData (ID,creator,title,type,identifier,date,language,description) VALUES ('$id','$creator','$title','$type',' $identifier','$date','$language','$description');";


		// $_SESSION["key"]="random";
		
	} 
	else if ($_SESSION["key"]=="update"){


	$id = $_SESSION["updatedID"];
	$creator = $_SESSION["updatedCreator"];
	$title = $_SESSION["updatedTitle"];
	$type=$_SESSION["updatedType"];
	$identifier= $_SESSION["updatedIdentifier"];
	$date = $_SESSION["updatedDate"];
	$language = $_SESSION["updatedLanguage"];
	$description = $_SESSION["updatedDescription"];

	$sql = "UPDATE eBook_MetaData SET ID='$id',creator='$creator',title='$title',identifier='$identifier',date='$date',language='$language',description='$description' where ID='$id'; ";

	//$_SESSION["key"]="random";

	}
	if ($_SESSION["key"]=="random"){
		//$sql="";
		// echo "<script language='javascript'>";
		// echo "alert('Cannot undo more than once')";
		// echo "<script>";

	}

if(mysqli_query($conn, $sql)){
	echo "\n undo occurred.";


	$redirect = "http://localhost/Assignment3/retrieve.php?button1=";
	header('Location: '.$redirect);
 }
else {
	echo "\nError insertion:" .mysqli_error($conn);
}


mysqli_close($conn);
	?>
