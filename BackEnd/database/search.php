<?php
session_start();
include 'config.php';

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['search']))
{
    $searchInput = validate($_POST['searchInput']);

    $result = mysqli_query($conn,"SELECT servicerequest.requestID, accounts.userID, services.serviceType,servicerequest.dateFiled, request_status.status, servicerequest.concern, servicerequest.dateCompleted, servicerequest.notes  FROM servicerequest INNER JOIN accounts ON servicerequest.accountID = accounts.accountID INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE servicerequest.requestID LIKE '%$searchInput%' OR servicerequest.accountID LIKE '%$searchInput%' OR services.serviceType LIKE '%$searchInput%' OR request_status.status LIKE '%$searchInput%' LIMIT 1");

    $row = mysqli_fetch_all($result);
    print_r($row);
    // $reqID = $row['requestID'];
    // if ($row)
    // {
    //     header('Location: ../../FrontEnd/residents/history2.php?searchReq= '.$row.'');
    //     exit();
    // }
    // else
    // {
    //     echo '<script>alert(`No results Found!`)</script>';
    //     header('Location:../../FrontEnd/residents/history2.php?error2=No Records Found!');
    //     exit();
    // }
}


?>