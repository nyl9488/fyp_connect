<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    //Getting values
    $name =$_POST['name'];
    $type = $_POST['type'];
    $mid = $_POST['mid'];
    $username=$_POST['member'];
error_reporting(0);
/*    $name="s";
    $type = "s";
    $mid = "5";
    $username="p,c";*/
   // $last_id="53";


    //Creating an sql query
    $sql3 = "INSERT INTO `db_sgroup`(name,type) VALUES('$name','$type')";
    //Importing our db connection script
    require_once('db_config.php');

    //Executing query to database
    if(mysqli_query($con,$sql3)){

        $last_id = mysqli_insert_id($con);
    }else{
        echo 'Could Not Add Group';
    }

    if(!empty($username)){
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
    }
    else{
        $sql2 = "INSERT INTO `db_join`(m_id,g_id) VALUES('$mid','$last_id')";
    }


        $r = mysqli_query($con,$sql2);
        $result = array();


        array_push($result,array(

            "lastid"=>$last_id

        ));

        echo json_encode(array('result'=>$result));

    //Importing our db connection script
   // require_once('db_config.php');

    //Executing query to database




    //Closing the database
    mysqli_close($con);
}