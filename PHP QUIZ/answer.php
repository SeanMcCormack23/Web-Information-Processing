<?php


//starts session variables
session_start();

//gets the answer from the form request
$finalanswer= $_POST['answer'];

//gets the actual correct answer
$correctAnswer = $_SESSION['correctAnswer'];



//compares and increments the score
if($finalanswer===$correctAnswer){

	$_SESSION['score']+=1;

}

//redirects back to where the form was sent
$redirect = "http://localhost:8080/Assignment4/card.php";
	header('Location: '.$redirect);




?>
