<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];

    require_once('db_config.php');

    $sql = "DELETE FROM `db_bill` WHERE b_id=$id;";

    if(mysqli_query($con,$sql)){
        echo 'Bill Deleted Successfully';
    }else{
        echo 'Could Not Delete Bill Try Again';
    }

    mysqli_close($con);
}