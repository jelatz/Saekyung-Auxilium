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
    $_SESSION['reqSubmitID'] = $accountID;
    $concern = validate ($_POST['concern']);
    $pending = validate($_POST['pending']);
    $ongoing = validate($_POST['ongoing']);
    $completed = validate($_POST['completed']);
    $servType = validate($_POST['service_type']);

// ADD STATUS TO TABLE
$select = mysqli_query($conn,"SELECT * FROM request_status");
$row = mysqli_fetch_array($select);
if($row == null)
{
    $insertstat = mysqli_query($conn,"INSERT INTO request_status (status) VALUES ('Pending'),('On-going'),('Completed')");
    if($insertstat)
    {
        
        $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,statusID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = '$servType' limit 1),(SELECT (statusID) FROM request_status WHERE `status`='$pending' limit 1),'$concern',CURRENT_TIMESTAMP)");
        $insertnotif = mysqli_query($conn,"INSERT INTO notifications (user,message) VALUES ('$accountID', '$concern')");
        header('Location:../../FrontEnd/Residents/services.php?success=Request Sent!');
        exit();
    }
}
else{
$insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,statusID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = '$servType' limit 1),(SELECT (statusID) FROM request_status WHERE `status`='$pending' limit 1),'$concern',CURRENT_TIMESTAMP)");
$insertnotif = mysqli_query($conn,"INSERT INTO notifications (user,message) VALUES ('$accountID', '$concern')");
}
if($insert)
{   
    header('Location:../../FrontEnd/Residents/history2.php?success=Request Sent!');
    exit();
}
else
{
    header('Location:../../FrontEnd/residents/services2.php?error=Request not sent!');
    exit();
}
$conn -> close();
}

// ACCEPTING REQUESTS

if(isset($_POST['accept_btn']))
{
    
    $id = $_GET['id'];
    
    $update = mysqli_query($conn,"UPDATE servicerequest SET statusID = 2 WHERE requestID ='$id'");
    $updatenotif = mysqli_query($conn,"UPDATE notifications SET status = 1 WHERE notifID = '".$_SESSION['notifID']."'");
    if($update)
    {
        $result = mysqli_query($conn,"SELECT * FROM notifications");
        $row = mysqli_fetch_array($result);
        $user = $row['user'];
        $message = $row['message'];
        $insert = mysqli_query($conn,"INSERT INTO notifications_resident (user,message) VALUES ('$user', 'Your request has been acknowledged!')");
        header('Location:../../FrontEnd/admin/requests.php');
        exit(); 
    }
    else
    {
        echo "<script> alert(`Can't accept this request!');</script>";
        header('Location:../../FrontEnd/admin/requests.php');
        exit();
    }
    $conn -> close();
}



// COMPLETE REPORT

if(isset($_POST['complete_btn']))
{
    $id = $_GET['id'];
    $notes = validate ($_POST['notes']);
    $update = mysqli_query($conn,"UPDATE servicerequest SET statusID = 3,notes='$notes', dateCompleted = CURRENT_TIMESTAMP WHERE requestID='$id'");
    if($update)
    {      
        $insert = mysqli_query($conn,"INSERT INTO notifications_resident (user,message) VALUES ('$id', 'Your request has been completed!')");
            header('Location:../../FrontEnd/admin/requests.php');
            exit();
    }
    else
    {
        echo "<script> alert(`Can't complete this request!');</script>";
        header('Location:../../FrontEnd/admin/requests.php');
        exit();
    }
    $conn -> close();
}


