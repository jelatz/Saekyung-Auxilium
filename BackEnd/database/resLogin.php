<?php
include 'config.php';
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $select = mysqli_query($conn,"select * from accounts where Username = '$username' and Password = '$password'");
    $row  = mysqli_fetch_array($select);

    if(is_array($row)) {
        $_SESSION["username"] = $row['Username'];
        $_SESSION["password"] = $row['Password']; 
    } 

      else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");';
        echo 'window.location.href = "http://localhost/SaekyungAuxilium/FrontEnd/"';
        echo '</script>';
    }
    }
    if(isset($_SESSION["username"]) && isset($_SESSION['password'])
    ){
        // echo "exact match";
        header('Location:../../FrontEnd/residents/services.php');
    }

?>