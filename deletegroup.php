<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];

    require_once('db_config.php');

    $sql = "DELETE FROM `db_group` WHERE g_id=$id;";

    if(mysqli_query($con,$sql)){
        echo 'Group Deleted Successfully';
    }else{
        echo 'Could Not Delete Group Try Again';
    }

    mysqli_close($con);
}