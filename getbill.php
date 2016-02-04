<?php
$g_id = $_GET['gid'];

require_once('db_config.php');

$sql = "SELECT * FROM `db_bill` WHERE `g_id` = $g_id ";
$r = mysqli_query($con,$sql);

$result = array();

//full record while
while($row = mysqli_fetch_array($r)){
array_push($result, array(
    "bid" => $row['b_id'],
    "gid" => $row['g_id'],
    "name" => $row['name'],
    "date" => $row['date']

));
}
echo json_encode(array('result'=>$result));

mysqli_close($con);