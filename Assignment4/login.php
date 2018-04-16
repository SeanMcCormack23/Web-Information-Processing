<?php


session_start();

echo "<html>
<head>
<link rel='stylesheet' href='style.css'>
</head>
<body>
<div id='all'>
<h1 id='overall'> Assignment 4 Quiz </h1><hr> 

<form id='form' action='quizSelect.php' method='POST'>
<div id='nameDiv'>


Name<input type='text' name='name'>
</div>
<br>username(required)<br>

 <input type='text' name='username'> <br><br><br>

<button type='submit' name='submit'> Log in </button><br>



</form>
<p> This quiz consists of 5 questions. </p><br>


<div id='infoBar'>
<p> Information:<br>This quiz has been created to act dynamically.<br> Each question is pulled from the database randomly.<br> The answers are given in random order.<br> The same 
randomly-generated answer does not appear twice on a question.<br>The same question does not appear randomly twice. <br>
	It has taken a long time to complete and I hope you enjoy.<br> Stephen </p>

</div>

</div>
</body>

</html>


";

$_SESSION['quizLength']=0;
$_SESSION['score']= 0;

$_SESSION['length'] = 0;
$_SESSION['username']='';





?>
