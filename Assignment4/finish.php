<?php
//starts the session
session_start();
//stores details
$score= $_SESSION['score'];
$name = $_SESSION['name'];

echo "<html>
<head>
<link rel='stylesheet' href='/Assignment4/style1.css'>
</head>

<body>
<h1 id='overall'> Assignment 4 Quiz </h1><hr> 
<br><br><br><br><br>

<h1> Thank you $name for playing my yoga quiz.</h1>
<p> My name has been Stephen O'Brien and goodnight!</p>
<h1> Your score was <br><br><div id='num'>$score</div> </h1>

<form action='login.php' method='POST'>
<button type='submit' id='logout' name='logout'>Logout </button>
</form>

</body>
</html>

";
//creates an array of the name and score
$array = array (
	'name'=>$name,
	'score'=>$score
);
//uses the username as an identifier on the json file
$user = $_SESSION['username'];

//loads it
$json = json_decode(file_get_contents("data.json"),true);

$json[$user]= array("name"=>$name,"score"=>$score);


//pushes to decoded json
array_push($json,$json[$user]);

//puts and encodes
file_put_contents("data.json", json_encode($json));

session_write_close();

?>
