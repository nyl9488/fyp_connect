<?php
    $m_id = $_GET['mid'];

    require_once('db_config.php');
//`yesplit_db`.
    $sql = "SELECT * FROM `db_member` WHERE `username` = '$m_id' ";
    $r = mysqli_query($con,$sql);

    $result = array();

//one record without while
    $row = mysqli_fetch_array($r);
    array_push($result,array(
            "mid"=>$row['m_id'],
            "username"=>$row['username']

        ));

    echo json_encode(array('result'=>$result));

    mysqli_close($con);