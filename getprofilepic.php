
<?php
//$m_id = $_GET['mid'];

require_once('db_config.php');
// if($_SERVER['REQUEST_METHOD']=='GET'){
    // $id = $_GET['id'];
     $sql = "select image from `db_member` WHERE m_id='3'";
$r = mysqli_query($con,$sql);

$result = array();

//one record without while
$row = mysqli_fetch_array($r);
array_push($result,array(
    "image"=>$row['image']

));

echo json_encode(array('result'=>$result));

mysqli_close($con);