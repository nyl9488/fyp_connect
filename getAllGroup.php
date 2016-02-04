<?php 
	//Importing Database Script
$m_id = $_GET['mid'];
	require_once('db_config.php');

	//Creating sql query
	$sql = "SELECT DISTINCT * FROM `db_join` INNER JOIN `db_sgroup` ON `db_join`.g_id=`db_sgroup`.g_id where `db_join`.m_id= '$m_id' ";
	
	//getting result 
	$r = mysqli_query($con,$sql);
	
	//creating a blank array 
	$result = array();
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($result,array(
			"name"=>$row['name'],
			"type"=>$row['type'],
			"gid"=>$row['g_id']
		));
	}
	
	//Displaying the array in json format 
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);