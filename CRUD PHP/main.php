<!-- <!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
</head>
<body> -->

	<?php 
	$servername =  "localhost";
	$username="root";
	$password ="";

	$conn = mysqli_connect($servername,$username,$password);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
	echo "Connected sucessfully";


	//$sql = "CREATE DATABASE myDB";

$sql = "CREATE TABLE myDB.eBook_MetaData(

ID serial not null,
creator varchar(30) not null,
title varchar(40) not null,
type varchar(50) not null,
identifier varchar(50),
date date not null,
language varchar(30)not null,
description varchar(30) ,
-- CONSTRAINT check_type CHECK(type in('Fantasy','Comedy','Horror','Thriller')),
CONSTRAINT check_Lang CHECK(language in('English','French','Italian','German')),
CONSTRAINT identifier_unique UNIQUE(identifier)


)


";


if(mysqli_query($conn, $sql)){
	echo "\nTable 'Assignment3' created Successfully";
}
else {
	echo "\nError creating table 'Assignment3':" .mysqli_error($conn);
}

mysqli_close($conn);
	?>

<!-- </body>
</html> -->