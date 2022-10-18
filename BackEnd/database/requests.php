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
$insertstat = mysqli_query($conn,"INSERT INTO `status` (`status`) VALUES ('$status')");
if($insertstat){
    header('Location:../../FrontEnd/Residents/services.php?success=Request Sent!');
    exit();
// QUERY FOR INSERTING DATA FROM ELECTRICAL REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = '$servType'),'$concern',CURRENT_TIMESTAMP)");
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
 