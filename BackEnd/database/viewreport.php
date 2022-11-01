<?php
session_start();
include 'config.php';

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if(isset($_POST['view_report'])){
    $from = validate ($_POST['from']);
    $to = validate ($_POST['to']);

    $result = mysqli_query($conn, "SELECT dateCompleted FROM servicerequest WHERE dateCompleted BETWEEN '$from' AND '$to'");
    $row = mysqli_fetch_all($result);


    print_r($row);

}








?>