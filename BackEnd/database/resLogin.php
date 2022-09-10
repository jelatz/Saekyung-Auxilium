<?php
include 'config.php';
if (isset($_POST['login'])){
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    
    $select = mysqli_query($conn,"select * from accounts where Username = '$uname' and Password = '$pass'");
    $row  = mysqli_fetch_array($select);

    if(is_array($row)) {
        $_SESSION["uname"] = $row['Username'];
        $_SESSION["pass"] = $row['Password']; 
    } 

      else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");';
        echo 'window.location.href = "index.php"';
        echo '</script>';
    }
    }
    if(isset($_SESSION["uname"]) && isset($_SESSION['pass'])){
        header('Location:C:\xampp\htdocs\SaekyungAuxilium\FrontEnd\index.php');
    }

?>