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
    $_SESSION['from'] = $from;
    $to = validate ($_POST['to']);
    $_SESSION['to'] = $to;

    // $result = mysqli_query($conn, "SELECT dateCompleted FROM servicerequest WHERE dateCompleted BETWEEN '$from' AND '$to'");
    
    header('Location:../../FrontEnd/admin/reportsView.php');
    exit();
}


if(isset($_POST['view_report_sysadmin'])){
    $from = validate ($_POST['from']);
    $_SESSION['from'] = $from;
    $to = validate ($_POST['to']);
    $_SESSION['to'] = $to;

    // $result = mysqli_query($conn, "SELECT dateCompleted FROM servicerequest WHERE dateCompleted BETWEEN '$from' AND '$to'");
    
    header('Location:../../FrontEnd/systemadmin/reportsView.php');
    exit();
}





?>