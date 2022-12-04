<?php
session_start();
include 'config.php';

// ADD SERVICE
if (isset($_POST['addServSubmit'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $servType = validate($_POST['serviceType']);
    
    $insert = mysqli_query($conn,"INSERT INTO services (serviceType) VALUES ('$servType')");
    if($insert)
    {
        $select = mysqli_query($conn,"select * from services");
        $row = mysqli_fetch_row($select);
        $_SESSION['servType'] = $row['serviceType'];

        header('Location:../../FrontEnd/systemadmin/services.php?success=Service Type Successfully Added!');
            exit();
    }else
    {
        header('Location: ../../FrontEnd/systemadmin/services.php?error= Not added!');
    }
}
?>