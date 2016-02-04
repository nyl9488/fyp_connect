<?php
$g_id = $_GET['gid'];

require_once('db_config.php');
//`yesplit_db`.
$sql = "SELECT * FROM `db_sgroup` WHERE `g_id` = '$g_id' ";
$r = mysqli_query($con,$sql);

$result = array();

//one record without while
$row = mysqli_fetch_array($r);
array_push($result,array(
    "gid"=>$row['g_id'],
    "name"=>$row['name'],
    "type"=>$row['type']

));

echo json_encode(array('result'=>$result));

mysqli_close($con);