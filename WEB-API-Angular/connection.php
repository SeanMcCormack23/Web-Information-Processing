<?php

	$servername =  "localhost";
	$username="root";
	$password ="";
	$dbname = "myDB";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
	


?>