<?php
$b_id = $_GET['bid'];

require_once('db_config.php');
//`yesplit_db`.
$sql = "SELECT * FROM `db_bill` WHERE `b_id` = '$b_id' ";
$r = mysqli_query($con,$sql);

$result = array();

//one record without while
$row = mysqli_fetch_array($r);
array_push($result,array(
    "bid"=>$row['b_id'],
    "name"=>$row['name'],
    "amount"=>$row['amount'],
    "date"=>$row['date']

));

echo json_encode(array('result'=>$result));

mysqli_close($con);