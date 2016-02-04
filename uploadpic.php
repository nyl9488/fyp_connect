<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    $domain="192.168.1.152";

    $image = $_POST['image'];
    $id = $_POST['id'];
    require_once('db_config.php');

    $path = "uploads/$id.png";

    $actualpath = "http://".$domain.":800/fyp_connect/$path";

 //   $sql = "INSERT INTO image (image) VALUES ('$actualpath')";
    $sql="UPDATE `db_member` SET image='$actualpath'WHERE m_id='$id'";

    if(mysqli_query($con,$sql)){
        file_put_contents($path,base64_decode($image));
        echo "Successfully Uploaded";
    }

    mysqli_close($con);
}else{
    echo "Error";
}