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

// REQUESTS
if(isset($_POST['reqSubmit']))
{



// VARIABLES FOR REQUEST
    
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['concern']);
    $pending = validate($_POST['pending']);
    $ongoing = validate($_POST['ongoing']);
    $completed = validate($_POST['completed']);
    $servType = validate($_POST['service_type']);

// ADD PENDING STATUS TO STATUS TABLE
$select = mysqli_query($conn,"SELECT * FROM request_status");
$row = mysqli_fetch_array($select);
if($row == null)
{
    $insertstat = mysqli_query($conn,"INSERT INTO request_status (status) VALUES ('Pending'),('On-going'),('Completed')");
    if($insertstat)
    {
        $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,statusID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = '$servType' limit 1),(SELECT (statusID) FROM request_status WHERE `status`='$pending' limit 1),'$concern',CURRENT_TIMESTAMP)");
        header('Location:../../FrontEnd/Residents/services.php?success=Request Sent!');
        exit();
    }
}
else{
$insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,statusID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = '$servType' limit 1),(SELECT (statusID) FROM request_status WHERE `status`='$pending' limit 1),'$concern',CURRENT_TIMESTAMP)");
}
if($insert)
{   
    header('Location:../../FrontEnd/Residents/services.php?success=Request Sent!');
    exit();
}
else
{
    header('Location:../../FrontEnd/residents/services.php?error=Request not sent!');
}
}

// ACCEPTING REQUESTS

if(isset($_POST['accept_btn']))
{
    $maintPerson = validate($_POST['maintPerson']);
    
    $id = $_GET['id'];
    $update = mysqli_query($conn,"UPDATE servicerequest SET statusID = 2 WHERE requestID='$id'");
    if($update)
    {
        header('Location:../../FrontEnd/admin/dashboardpending.php');
        exit();
    }
    else
    {
        echo "<script> alert(`Can't accept this request!');</script>";
        header('Location:../../FrontEnd/admin/dashboardpending.php');
        exit();
    }
}

// COMPLETE REPORT

if(isset($_POST['complete_btn']))
{
    $id = $_GET['id'];
    $update = mysqli_query($conn,"UPDATE servicerequest SET statusID = 3 WHERE requestID='$id'");
    if($update)
    {
        $insert = mysqli_query($conn,"INSERT INTO servicerequest (dateCompleted) VALUES (CURRENT_TIMESTAMP)");
        header('Location:../../FrontEnd/admin/dashboardpending.php');
        exit();
    }
    else
    {
        echo "<script> alert(`Can't accept this request!');</script>";
        header('Location:../../FrontEnd/admin/dashboardpending.php');
        exit();
    }
}


