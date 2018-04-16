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


$_SESSION['length']+=1;

if($_SESSION['username']=='' || $_SESSION['username']==null){
$_SESSION['username'] = $_POST['username'];
echo "found";
}

if($_SESSION['length']>5){
	$redirect = "http://localhost:8080/Assignment4/finish.php";
	 header('Location: '.$redirect);


}
else {

$collector;

 if(isset($_POST['name'])){
	$_SESSION['name'] = $_POST['name'];

	$name = $_SESSION['name'];
}
else {
	$name = $_SESSION['name'];
}









if($_SESSION['arrayOfId'][0]==0 || $_SESSION['arrayOfId'][1]==0 || $_SESSION['arrayOfId'][2]==0 || $_SESSION['arrayOfId'][3]==0 || $_SESSION['arrayOfId'][4]==0 ){

	$rand = rand(0,4);
	
	
	if ($_SESSION['arrayOfId'][$rand]==0){
echo "the number is set to ";
echo $rand;
echo "<br>";
	$sql = "SELECT * from $db.Assignment4 WHERE ID=$rand";
	$_SESSION['arrayOfId'][$rand]=1;
	
	}
	else {

	if ($_SESSION['arrayOfId'][$rand]==1){
		echo "while loop";
		$rand = rand(0,4);
		while ($_SESSION['arrayOfId'][$rand]==1){
			$rand = rand(0,4);
		}

		if ($_SESSION['arrayOfId'][$rand]==0){
			echo "final transition";
			echo $rand;
			$sql = "SELECT * from $db.Assignment4 WHERE ID=$rand";
			$_SESSION['arrayOfId'][$rand]=1;
			}

		}
	}

}
	
echo $rand;

	







$result = mysqli_query($conn,$sql);



while($row=mysqli_fetch_assoc($result)){

$image= '<img src="data:SplitsFlow/jpeg;base64,' . base64_encode( $row['Image'] ) . '" />';

$correct= $row['CorrectSanskrit'] ;
$wrong1 = $row['WrongSanskrit1'];
$wrong2 = $row['WrongSanskrit2'];
$wrong3 = $row['WrongSanskrit3'];

$array = array($correct,$wrong1,$wrong2,$wrong3);
$arraySlot = array(false,false,false,false);


$_SESSION['correctAnswer'] = $correct;
$i = 0;

while($arraySlot[0]==false || $arraySlot[1]==false || $arraySlot[2]==false || $arraySlot[3] == false ){

$randomSlot = rand(0,3);
if($arraySlot[$randomSlot]==false){
	
	${"random".$i} = $array[$randomSlot];
	$i+=1;
	$arraySlot[$randomSlot] = true;
}


}
// echo $random0."<br>";
// echo $random1."<br>";
// echo $random2."<br>";
// echo $random3."<br>";




//$answer = $row['Correct'];
}


echo "<script> console.log('$correct');</script>";

echo "<html>
<head>
<link rel='stylesheet' href='/Assignment4/style.css'>
</head>
<body>
<div id='all'>
<h1 id='overall'> Assignment 4 Quiz </h1><hr> 

$image
<form  action='answerSanskrit.php' method= 'POST'>
$random0 <input type='radio' name='answer' value='$random0'> <br><br>
$random1 <input type='radio' name='answer' value='$random1'> <br><br>
$random2 <input type='radio' name='answer' value='$random2'> <br><br>
$random3<input type='radio' name='answer' value='$random3'> <br><br>

<button type='submit' name='cardSubmit'>NEXT</button>
</form>

<br><br><br><br>



<p>$name is currently signed in. </p>
<form action='login.php' method='POST'>
<button type='submit' id='logout' name='logout'>Logout </button>
</form>
</div>
</body>

</html>
";


if (isset($_REQUEST['cardSubmit'])){
	$answer = $_POST['answer'];
	echo "<script> console.log('correct answer is ');</script>";
	echo "<script> console.log('$correct');</script>";
	echo "<script> console.log('your answer is ');</script>";
	echo "<script> console.log('$answer');</script>";





	if($answer==$correct){

 		echo "<script> alert('yay');</script>";
		$_SESSION['score']+=1;
	}
	
	
	
	//$redirect = "http://localhost/Assignment4/card.php";
	//header('Location:'.$redirect);

}





	// if (isset($_REQUEST['logout'])){
	// 	$redirect = "http://localhost:8080/Assignment4/login.php";
	// header('Location: '.$redirect);
	// }
	
$scoreNow = $_SESSION['score'];
echo "Your score is ".$scoreNow;
}

mysqli_close($conn);

?>









