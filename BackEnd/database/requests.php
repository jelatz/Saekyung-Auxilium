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
    $stat = validate ("Pending");


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
// FURNITURE
elseif(isset($_POST['furnitureRequest']))
{

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// VARIABLES FOR FURNITURE REQUEST
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['furnitureConcern
    ']);


// QUERY FOR INSERTING DATA FROM FURNITURE REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = ('Furniture')),'$concern',CURRENT_TIMESTAMP)");
    
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
// PAINTING
elseif(isset($_POST['paintingRequest']))
{

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// VARIABLES FOR FURNITURE REQUEST
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['paintingConcern']);


// QUERY FOR INSERTING DATA FROM FURNITURE REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = ('Painting')),'$concern',CURRENT_TIMESTAMP)");
    
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

// PLUMBING
elseif(isset($_POST['plumbingRequest']))
{

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// VARIABLES FOR FURNITURE REQUEST
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['plumbingConcern']);


// QUERY FOR INSERTING DATA FROM FURNITURE REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = ('Plumbing')),'$concern',CURRENT_TIMESTAMP)");
    
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
elseif(isset($_POST['securityRequest']))
{

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// VARIABLES FOR FURNITURE REQUEST
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['securityConcern']);


// QUERY FOR INSERTING DATA FROM FURNITURE REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = ('Security')),'$concern',CURRENT_TIMESTAMP)");
    
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
elseif(isset($_POST['tileRequest']))
{

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// VARIABLES FOR FURNITURE REQUEST
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['tileConcern']);


// QUERY FOR INSERTING DATA FROM FURNITURE REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = ('Tile')),'$concern',CURRENT_TIMESTAMP)");
    
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
elseif(isset($_POST['otherRequest']))
{

// FUNCTION FOR VALIDATION
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// VARIABLES FOR FURNITURE REQUEST
    $accountID = validate ($_POST['accountID']);
    $concern = validate ($_POST['otherConcern']);


// QUERY FOR INSERTING DATA FROM FURNITURE REQUEST FORM
    $insert = mysqli_query($conn,"INSERT INTO servicerequest (accountID,serviceID,concern,dateFiled) VALUES ('$accountID',(SELECT (serviceID) FROM services WHERE serviceType = ('Other')),'$concern',CURRENT_TIMESTAMP)");
    
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
 