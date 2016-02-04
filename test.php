<?php

$username="p,c,3,4";
$last_id="53";
$mid='5';
require_once('db_config.php');


    $username2 = explode(',', $username);

    $array = implode("','",$username2);
//SELECT DISTINCT m_id FROM `db_member` INNER JOIN `ofuser` ON `db_member`.`username`=`ofuser`.`username` where `db_member`.username= 'c'

    $sql = "SELECT DISTINCT * FROM `db_member` INNER JOIN `ofuser` ON `db_member`.`username`=`ofuser`.`username` where `db_member`.username IN ('".$array."')";
    $r = mysqli_query($con,$sql);

//one record without while
    while($row = mysqli_fetch_array($r)){
        if($memberid==""){
            $memberid=$row['m_id'];
        }
        else
            $memberid=$memberid.",".$row['m_id'];
    }

   // echo $memberid;
    //echo  $row['m_id'];
    // $myString = "9,admin@example.com,8";
    $memberArray = explode(',', $memberid);
    $sql2 = "INSERT INTO `db_join`(m_id,g_id) VALUES('$mid','$last_id')";

    for ($x = 0; $x<count($memberArray); $x++) {
        $sql2 =  $sql2.",('$memberArray[$x]','$last_id')";
    }

    echo $sql2;


