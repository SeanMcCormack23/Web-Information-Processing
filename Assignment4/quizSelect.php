<?php
$servername = 'localhost';
$db = 'Assignment4';
$username = 'root';
$password = null;

$conn = mysqli_connect($servername,$username,$password);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
	echo "<script>console.log('Connected sucessfully')</script>";

session_start();

$_SESSION['name']='';
$_SESSION['username']='';

if($_SESSION['username']=='' || $_SESSION['username']==null){
$_SESSION['username'] = $_POST['username'];
$username = $_SESSION['username'];

}
if($_SESSION['name']=='' || $_SESSION['name']==null){
$_SESSION['name'] = $_POST['name'];
$name = $_SESSION['name'];


}

 $idArray= array(0,0,0,0,0);
$_SESSION['arrayOfId'] = $idArray;




echo "<html>
<head>
<link rel='stylesheet' href='style.css'>
</head>
<body>
<div id='all'>
<h1 id='overall'> Assignment 4 Quiz </h1><hr> 

<form id='form' action='card.php' method='POST'>

<button type='submit' name='submit'> Quiz 1 (English)</button><br>

</form>

<form action='card_sanskrit.php' method='POST'>

<button type='submit' name='submitSanskrit'> Quiz 2 (Sanskritt) </button>
</form>




</div>
</body>

</html>
";



mysqli_close($conn);

?>