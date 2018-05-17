<?php
include 'connection.php';

$method = $_SERVER['REQUEST_METHOD'];

	if ($_SERVER['REQUEST_METHOD']=='GET')
	{	

		$load = file_get_contents('transfer.json');
		$load = json_decode($load);

		// $data="";

		$sql = 'select * from Assignment6;';

		$result = $conn->query($sql);

		if(mysqli_query($conn, $sql)){

			while($row=mysqli_fetch_array($result)){

			
				$array[] = $row;
			}
		}
		
		echo json_encode($array);
		

	}


?>