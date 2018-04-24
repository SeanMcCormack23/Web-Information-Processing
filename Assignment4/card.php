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

//checks how many times to run to the quiz, counts down from 5 originally
$_SESSION['length']+=1;


//checks the username because the page is being refreshed over and over, the name will not always be a post request
if($_SESSION['username']=='' || $_SESSION['username']==null){
$_SESSION['username'] = $_POST['username'];
echo "found";
}

//when the quiz gets passed 5 questions, redirects to the end
if($_SESSION['length']>5){
	$redirect = "http://localhost:8080/Assignment4/finish.php";
	 header('Location: '.$redirect);


}
//moves on
else {

$collector;
//sets name from post request
 if(isset($_POST['name'])){
	$_SESSION['name'] = $_POST['name'];

	$name = $_SESSION['name'];
}
else {
	//otherwise the name is the session variable from the last refreshed page
	$name = $_SESSION['name'];
}

	//this algorithm makes sure that it picks a question that hasnt appeared before in the quiz.
	//I used an array of 0,1's to map which questions have been used. 
	
if($_SESSION['arrayOfId'][0]==0 || $_SESSION['arrayOfId'][1]==0 || $_SESSION['arrayOfId'][2]==0 || $_SESSION['arrayOfId'][3]==0 || $_SESSION['arrayOfId'][4]==0 ){

	$rand = rand(0,4);
	
	//if the id of the row has not been used yet
	if ($_SESSION['arrayOfId'][$rand]==0){
	
	//sql statement
	$sql = "SELECT * from $db.Assignment4 WHERE ID=$rand";
	// marks the array slot to 1 so it cannot be used again
	$_SESSION['arrayOfId'][$rand]=1;
	
	}
	//next
	else {
		
	//if this number is already used
	if ($_SESSION['arrayOfId'][$rand]==1){
		//get another random number
		$rand = rand(0,4);
		//while this number is not unique
		while ($_SESSION['arrayOfId'][$rand]==1){
			//get a random number until its unique
			$rand = rand(0,4);
		}

		//when the number is finally unique
		if ($_SESSION['arrayOfId'][$rand]==0){
			//use this number to get this quiz information
			$sql = "SELECT * from $db.Assignment4 WHERE ID=$rand";
			//mark off this number so it cannot be used again
			$_SESSION['arrayOfId'][$rand]=1;
			}

		}
	}

}
	

//run the query
$result = mysqli_query($conn,$sql);



while($row=mysqli_fetch_assoc($result)){
//collect the image
$image= '<img src="data:SplitsFlow/jpeg;base64,' . base64_encode( $row['Image'] ) . '" />';
//collect information based on the ID
$correct= $row['Correct'] ;
$wrong1 = $row['Wrong1'];
$wrong2 = $row['Wrong2'];
$wrong3 = $row['Wrong3'];

//put the answers into an array
$array = array($correct,$wrong1,$wrong2,$wrong3);
//creates an array of booleans
$arraySlot = array(false,false,false,false);

//sets the correct answer for this question
$_SESSION['correctAnswer'] = $correct;
$i = 0;

//while there is another number due
while($arraySlot[0]==false || $arraySlot[1]==false || $arraySlot[2]==false || $arraySlot[3] == false ){
//get the random answer for the random slot in the multiple choice quiz
$randomSlot = rand(0,3);
if($arraySlot[$randomSlot]==false){
	//gets the random slot
	${"random".$i} = $array[$randomSlot];
	$i+=1;
	$arraySlot[$randomSlot] = true;
}


}



}


//sets up html in php

echo "<html>
<head>
<link rel='stylesheet' href='/Assignment4/style.css'>
</head>
<body>
<div id='all'>
<h1 id='overall'> Assignment 4 Quiz </h1><hr> 

$image
<form  action='answer.php' method= 'POST'>
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

//on card click
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
