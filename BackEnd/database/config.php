<?php
$servername="localhost";
$username="root";
$password="";
$dbname="saekyungDB";
$conn=mysqli_connect($servername,$username,$password,$dbname);

// CREATE CONNECTION
if($conn){
//   echo "connected!";
}
else{
    die("Connection Failed!" . mysqli_connect_error());
}

?>
