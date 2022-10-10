<?php
session_start();
include 'config.php';

if(isset($_POST['elecSubmit']))
{

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// VARIABLES FOR ELECTRICAL REQUEST
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['elecConcern']);


// QUERY FOR INSERTING DATA FROM ELECTRICAL REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = ('Electrical')),'$concern',CURRENT_TIMESTAMP)");
    
   //CONDITION IF DATA IS INSERTED
    if($insert)
    {   
        header('Location:../../FrontEnd/Residents/services.php?success=Request Sent!');
    }
    else
    {
        header('Location:../../FrontEnd/residents/services.php?error=Request not sent!');
    }
}
?>