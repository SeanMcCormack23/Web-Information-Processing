<?php
//connection
$servername = 'localhost';
$db = 'Assignment4';
$username = 'root';
$password = null;

$conn = mysqli_connect($servername,$username,$password);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}
	echo "<script>console.log('Connected sucessfully')</script>";



//session starts
session_start();

//counts down from 5
$_SESSION['length']+=1;

//checks name
if($_SESSION['username']=='' || $_SESSION['username']==null){
$_SESSION['username'] = $_POST['username'];
echo "found";
}
//if the game refreshes are less than 5, otherwise go to end
if($_SESSION['length']>5){
	$redirect = "http://localhost:8080/Assignment4/finish.php";
	 header('Location: '.$redirect);


}
//next
else {

$collector;
//checks name on refresh
 if(isset($_POST['name'])){
	$_SESSION['name'] = $_POST['name'];

	$name = $_SESSION['name'];
}
else {
	$name = $_SESSION['name'];
}



//makes sure that the same questions dont get asked twice during the quiz
if($_SESSION['arrayOfId'][0]==0 || $_SESSION['arrayOfId'][1]==0 || $_SESSION['arrayOfId'][2]==0 || $_SESSION['arrayOfId'][3]==0 || $_SESSION['arrayOfId'][4]==0 ){

	$rand = rand(0,4);
	
	
	if ($_SESSION['arrayOfId'][$rand]==0){

	$sql = "SELECT * from $db.Assignment4 WHERE ID=$rand";
	$_SESSION['arrayOfId'][$rand]=1;
	
	}
	else {
	//if the same question appears, get a different one until its unique
	if ($_SESSION['arrayOfId'][$rand]==1){
		
		$rand = rand(0,4);
		while ($_SESSION['arrayOfId'][$rand]==1){
			$rand = rand(0,4);
		}
		//when its unique
		if ($_SESSION['arrayOfId'][$rand]==0){
			
			$sql = "SELECT * from $db.Assignment4 WHERE ID=$rand";
			$_SESSION['arrayOfId'][$rand]=1;
			}

		}
	}

}
	
//result of sql
$result = mysqli_query($conn,$sql);



		while($row=mysqli_fetch_assoc($result)){
		//gets images
		$image= '<img src="data:SplitsFlow/jpeg;base64,' . base64_encode( $row['Image'] ) . '" />';
		//gets answers from phpmyadminrow
		$correct= $row['CorrectSanskrit'] ;
		$wrong1 = $row['WrongSanskrit1'];
		$wrong2 = $row['WrongSanskrit2'];
		$wrong3 = $row['WrongSanskrit3'];
		//stores the answers
		$array = array($correct,$wrong1,$wrong2,$wrong3);
		// boolean array to make sure same random answers are not used
		$arraySlot = array(false,false,false,false);

		//collects right answer
		$_SESSION['correctAnswer'] = $correct;
		$i = 0;
				//slots them randomly without repeart
				while($arraySlot[0]==false || $arraySlot[1]==false || $arraySlot[2]==false || $arraySlot[3] == false ){

				$randomSlot = rand(0,3);
				if($arraySlot[$randomSlot]==false){

					${"random".$i} = $array[$randomSlot];
					$i+=1;
					$arraySlot[$randomSlot] = true;
				}


}




}




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
	

}

	
$scoreNow = $_SESSION['score'];
echo "Your score is ".$scoreNow;
}

mysqli_close($conn);

?>
