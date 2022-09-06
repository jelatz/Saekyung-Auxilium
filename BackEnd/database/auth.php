<?php
include 'config.php';
    if (isset($_POST['submit'])){
        $uname = $_POST['username'];
        $Pass = $_POST['password'];
        $uid = 'renter_ID';

    $select = mysqli_query($conn," SELECT * FROM authentication WHERE User = '$uname' AND Password = '$Pass' ");
    $row  = mysqli_fetch_array($select);

    // $row = mysqli_fetch_array($select,MYSQLI_ASSOC);
    //$active = $row['active'];

    if(is_array($row)) {
        $_SESSION["username"] = $row['User'];
        $_SESSION["password"] = $row['Password'];
        $_SESSION["uid"] = $row['renter_ID'];
        

    }   else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");';
        echo 'window.location.href = "index.html" ';
        echo '</script>';
    }
    }
    if(isset($_SESSION["username"])){
        header("Location:./display.php");
    }

?>