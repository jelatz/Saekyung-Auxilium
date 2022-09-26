<?php
session_start();
include 'config.php';

if (isset($_POST['imgSubmit'])){
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $img = ($_POST['img']);
      $fName = validate ($_POST['fName']);
      $lName = validate ($_POST['lName']);


      $result = mysqli_query($conn,"insert into users 'firstName', 'lastName','image' values '$fName','$lName','$img'");

      $row = mysqli_fetch_row($result);

      if($row){
        header('Location:../../FrontEnd/residents/accounts.php');
      }
}


?>