<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    //Getting values
    $username = $_POST['username'];


    //Creating an sql query
    $sql = "INSERT INTO `db_member`(username) VALUES('$username')";

    //Importing our db connection script
    require_once('db_config.php');

    //Executing query to database
    if(mysqli_query($con,$sql)){
        echo 'Member Added Successfully';
    }else{
        echo 'Could Not Add Member';
    }

    //Closing the database
    mysqli_close($con);
}