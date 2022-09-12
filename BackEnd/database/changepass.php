<?php
session_start();
include 'config.php';

if(isset($_POST['submit'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $oldPassword = validate ($_POST['oldPassword']);
    $newPassword = validate ($_POST['newPassword']);
    $newConfirmPassword = validate ($_POST['newConfirmPassword']);


}
 
?> 

