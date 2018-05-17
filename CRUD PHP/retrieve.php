	<?php 
	$servername =  "localhost";
	$username="root";
	$password ="";
	$dbname = "myDB";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn){
		die("Connection failed:" .mysql_connect_error());
	}

	$sql = "Select * from myDB.eBook_MetaData;";

$result = mysqli_query($conn,$sql);
 
echo "<br>";
echo "

<div class='updateDiv'>
<form action='retrieve.php' method='POST'>
<header><p> CRUD SYSTEM </p></header>
<button type='submit' name='buttonCreate'> Create </button>
</form>

<form action='retrieve.php' method='POST'>
<button type='submit' name='updateOption'>Update</button>
</form>


<form id='form2' action='retrieve.php' method='POST'>
<button name='button1' type='submit' > View</button>
</form>


<form id='formDelete' action='delete.php' method='POST'>
ID to delete:<input type='number' name='idDelete'>
<button name='Delete' type='submit'>Delete</button>

</form>

<form id='formUndo' action='undo.php' method='POST'>
<button type='submit' name='idDelete'> Undo </button>
</form>

</div>";

echo "<br><br>";

$counter;
if (isset($_REQUEST['button1'])){

$collector="";

while($row=mysqli_fetch_array($result)){
		$collector  = $collector."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";

}
echo " <p style='text-align:center'>Database Table</p> <table class='viewTable'>

			<tr>
				<th>ID</th>
				<th>Creator</th>
				<th>Title</th>
				<th>Type </th>
				<th>Identifier</th>
				<th>Date </th>
				<th>Language </th>
				<th>Description </th>
				</tr>

				<?php echo $collector 
				</table>
			";
}

if (isset($_REQUEST['updateOption'])){


echo "

<div class='popupUpdate'>
<p style='text-align:center'>Updating table:</p> 
<form id='formUpdate' action='update.php' method='POST'>
ID (Update to) <input type='number' name='updateID'><br>
Creator: <input type='text' name='updateCreator'><br>
Title: <input type='text' name='updateTitle'><br>

Type <select name='updateType'>
	<option value='Fantasy'> Fantasy </option>
	<option value='Thriller'> Thriller </option>
	<option value='Comedy'>Comedy </option>
	<option value='Horror'>Horror </option>
	</select><br>

	Identifier <input type='text' name='identifier'> <br>
	Date <input type='date' name='updateDate'><br>

	Language <select name='updateLanguage'>
	<option value='EN-US'>EN-US</option>
	<option value='FR-CA'> FR-CA</option>
	<option value='JPN'> JPN </option>
	<option value='ES'> ES </option>
	</select><br>

Description: <input type='text' name='updateDescription'>
<br>
<button name='update' type='submit'>Update</button>
</form>
</div>";

$collector="";

while($row=mysqli_fetch_array($result)){
		$collector  = $collector."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";

}
echo "
		<table class='viewTable1' >
			<tr>
				<th>ID</th>
				<th>Creator</th>
				<th>Title</th>
				<th>Type </th>
				<th>Identifier</th>
				<th>Date </th>
				<th>Language </th>
				<th>Description </th>
				</tr>

				<?php echo $collector
				</div>
				
				</table>
			";

}
if (isset($_REQUEST['buttonCreate'])){
	echo "<div id='div' class='wrapper'>

<p> Create New Table Row: </p>
<form id='form' action='insertion.php' method='POST'>
	
	Creator <input type='text' name='creator'> <br>
	Title <input type='text' name='title'><br>
	Type <select name='type'>
	<option value='Fantasy'> Fantasy </option>
	<option value='Thriller'> Thriller </option>
	<option value='Comedy'>Comedy </option>
	<option value='Horror'>Horror </option>
	</select><br>


	Identifier <input type='text' name='identifier'> <br>
	Date <input type='date' name='date'><br>
	Language <select name='language'>
	<option value='EN-US'>EN-US</option>
	<option value='FR-CA'> FR-CA</option>
	<option value='JPN'> JPN </option>
	<option value='ES'> ES </option>
	</select><br>
	Description <input type='text' name='description'> <br>

	<button type='submit' >Submit </button>

</form>
</div> ";

}


mysqli_close($conn);
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Assignment 3</title>
		<style>
		body{
			background-color: #FFB4AA77;
			font-family:sans-serif;
		}
		table{
			width:10%;
			
		}

		td{
			border:1px solid black;
			height:20%;
		
			overflow-x: auto;
		
			padding:10px;
			
		}
		tr{
			height:10px;
			overflow: scroll;
		}
		 
	/*	th{
			margin:auto;
			border: 2px solid black;
			background-color: lightblue;
			padding-top:20px black;
		}*/
		.wrapper{
			width:50%;
			border: 1px solid black;
			background-color: beige;
			margin-left: 5%;
			margin:5%;
			padding:1em;
				border-radius:10px;

		}
		.updateDiv{
			text-align:center;
				width:50%;
			border: 1px solid black;
			background-color: beige;
			margin-left: 5%;
			margin:5%;
			padding:1em;
			border-radius:10px;
		}
		.popupUpdate{
			text-align:center;
			width:50%;
			border: 5px solid pink;
			background-color: beige;
			margin-left: 5%;
			margin:5%;
			padding:1em;
			border-radius:10px;
			background-color: #DC93AF;

		}
		.viewTable{
			width:80%;
			margin:auto;
			border: 5px solid lightblue;
			border-radius:10px;
			background-color: beige;
			
			/*overflow: auto;
*/

		}
		.viewTable1{
			/*width:50%;*/
			width:50%;
			border: 10px solid #DC93AF;
			background-color: beige;
			border-radius:10px;

		}
		#div {
			text-align:center;
			width:80%;
			background-color: rgba(250,55,66,0.2);
			border-radius:10px;
		}
		
	</head>
	<body>

	
	</body>
	</html>