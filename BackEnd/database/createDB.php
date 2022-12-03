<?php
include 'config.php';

// CREATE DATABASE
$sql = "CREATE DATABASE saekyungDB";
if(mysqli_query($conn,$sql) ){
}else{
    echo "Error creating database: " . mysqli_error($conn);
}



?>