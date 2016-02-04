<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

    $image = $_POST['image'];

    require_once('db_config.php');

    $sql ="SELECT id FROM image ORDER BY id ASC";

    $res = mysqli_query($con,$sql);

    $id = 0;

    while($row = mysqli_fetch_array($res)){
        $id = $row['id'];
    }

    $path = "uploads/$id.png";

    $actualpath = "http://192.168.56.2:800/fyp_connect/$path";

    $sql = "INSERT INTO image (image) VALUES ('$actualpath')";

    if(mysqli_query($con,$sql)){
        file_put_contents($path,base64_decode($image));
        echo "Successfully Uploaded";
    }

    mysqli_close($con);
}else{
    echo "Error";
}