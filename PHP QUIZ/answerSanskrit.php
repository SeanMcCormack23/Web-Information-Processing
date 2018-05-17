<?php


//same as other file with different redirect, would of sent the type with the answer for efficiency but ran out of time
session_start();

$finalanswer= $_POST['answer'];

$correctAnswer = $_SESSION['correctAnswer'];




if($finalanswer===$correctAnswer){

	$_SESSION['score']+=1;

}


$redirect = "http://localhost:8080/Assignment4/card_sanskrit.php";
	header('Location: '.$redirect);




?>
