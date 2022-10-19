<?php
session_start();
include 'config.php';

// ELECTRICAL
if(isset($_POST['reqSubmit']))
{

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// VARIABLES FOR ELECT[RICAL REQUEST
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['elecConcern']);
    $status = validate ($_POST['status']);
    $servType = validate($_POST['service_type']);
// ADD STATUS TO STATUS TABLE
$insertstat = mysqli_query($conn,"INSERT INTO request_status (`status`) VALUES ('$status')");
$select = mysqli_query($conn,"SELECT * FROM `status`");
$row2 = mysqli_fetch_assoc($select);
$stats = $row2['status'];
if($insertstat){
// QUERY FOR INSERTING DATA FROM ELECTRICAL REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,statusID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = '$servType' limit 1),(SELECT (statusID) FROM request_status WHERE `status`='$stats' limit 1),'$concern',CURRENT_TIMESTAMP)");
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
   //CONDITION IF DATA IS INSERTED
    
}


?>
 