<?php
include 'connection.php';

$method = $_SERVER['REQUEST_METHOD'];

	if ($_SERVER['REQUEST_METHOD']=='GET')
	{	

		$load = file_get_contents('transfer.json');
		$load = json_decode($load);

		// $data="";

		$sql = 'select * from Assignment6;';

		//runs the sql statement
		$result = $conn->query($sql);

		if(mysqli_query($conn, $sql)){

			//retrieves all the data in a loop where $row changes value every iteration. 
			while($row=mysqli_fetch_array($result)){

			
				$array[] = $row;
			}
		}
		
		//sends back the name-value pair to angular.
		echo json_encode($array);
		

	}


?>
