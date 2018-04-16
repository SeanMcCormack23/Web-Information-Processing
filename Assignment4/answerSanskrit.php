<?php



session_start();

$finalanswer= $_POST['answer'];

$correctAnswer = $_SESSION['correctAnswer'];




if($finalanswer===$correctAnswer){

	$_SESSION['score']+=1;

}


$redirect = "http://localhost:8080/Assignment4/card_sanskrit.php";
	header('Location: '.$redirect);




?>