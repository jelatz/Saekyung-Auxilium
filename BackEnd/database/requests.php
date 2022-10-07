<?php
session_start();
include 'config.php';

if(isset($_POST['elecSubmit'])){

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// VARIABLES FOR ELECTRICAL REQUEST
    $accountID = validate ($_POST['accountID']);
    $servType = validate ($_POST['servType']);
    $concern = validate ($_POST['concern']);


    $insert = mysqli_query($conn,"INSERT INTO servicerequest 'accountID','serviceID','concern','dateFiled' VALUES '$userame','");
}




?>