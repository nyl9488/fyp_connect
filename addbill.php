<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    //Getting values
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $gid = $_POST['gid'];


    //Creating an sql query
    $sql = "INSERT INTO `db_bill` (name,amount,date,`g_id`) VALUES('$name','$amount','$date','$gid')";
    //Importing our db connection script
    require_once('db_config.php');

    //Executing query to database
    if(mysqli_query($con,$sql)){

        $last_id = mysqli_insert_id($con);


      //  $last_id = mysqli_insert_id($con);
    }else{
        echo 'Could Not Add Bill';
    }
    $result = array();

    array_push($result,array(

        "id"=>$last_id

    ));
    echo json_encode(array('result'=>$result));
    //Closing the database
    mysqli_close($con);
}