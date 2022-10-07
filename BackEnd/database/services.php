<?php
session_start();
include 'config.php';

if (isset($_POST['addServSubmit'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $servType = validate($_POST['serviceType']);
    
    $insert = mysqli_query($conn,"insert into services (serviceType) values ('$servType')");
    $_SESSION['servType'] = $row['serviceType'];

    if($insert){
        header('Location:../../FrontEnd/admin/dashboardpending.php?success=Service Type Successfully Added!');
        exit();
    }else{
        header('Location: ../../FrontEnd/admin/dashboardpending.php?error= Not added!');
       
    }
}
?>