<?php
session_start();
include 'config.php';
if (isset($_POST['submit'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $oldPassword = validate ($_POST['oldPassword']);
    $newPassword = validate ($_POST['newPassword']);
    $newConfirmPassword = validate ($_POST['newConfirmPassword']);

    $result = mysqli_query($conn, "select userName,password from accounts where password = '$oldPassword'");

    $row = mysqli_fetch_array($result);

    if($row>0){
        $query = mysqli_query($conn,"update accounts set password = '$newPassword' where password = '$oldPassword'");
        header('Location:../../FrontEnd/residents/services.php');
    }else{
        
        header('Location:../../FrontEnd/residents/services.php');
    }


}




?>