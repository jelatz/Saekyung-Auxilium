<?php
session_start();
include 'config.php';

// REQUESTS
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
    $concern = validate ($_POST['concern']);
    $status = validate ($_POST['status']);
    $servType = validate($_POST['service_type']);
// ADD STATUS TO STATUS TABLE
$insertstat = mysqli_query($conn,"INSERT INTO request_status (`status`) VALUES ('$status')");
$select = mysqli_query($conn,"SELECT * FROM request_status");
$row2 = mysqli_fetch_assoc($select);
$stats = validate ($row2['status']);
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
}
elseif(isset($_POST['accept_btn'])){
    // QUERY TO UPDATE THE STATUS FROM PENDING TO ON-GOING
    $result = mysqli_query($conn,"UPDATE servicerequest INNER JOIN request_status ON request_status.statusID = servicerequest.statusID SET status = 'Approved' WHERE ");
    if($result){
        
        header('Location:../../FrontEnd/admin/dashboardpending.php#onGoing');
        exit();
    }
    else
    {
        echo "<script>alert(`Can't process the request!`)</script>";
        header('Location:../../FrontEnd/admin/dashboardpending.php');
    }
}



?>
 