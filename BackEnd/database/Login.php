<?php
include 'config.php';
session_start();
if (isset($_POST['resLogin'])){

    function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

    $username = validate ($_POST['username']);
    $password = validate ($_POST['password']);
   

$result=mysqli_query($conn,"select * from accounts where Username='".$username."' AND Password = '".$password."' limit 1");

$row=mysqli_fetch_array($result);
if($row["usertype"]=="user"){

    $_SESSION["username"] = $row['Username'];
    $_SESSION["password"] = $row['Password'];

    header('Location:../../FrontEnd/residents/services.php');
    exit();

    if (isset($_POST['remember'])){

        setcookie('username', $username, time()+30);
        setcookie('password', $password, time()+30);

    }else{
        setcookie('username', $username, 30);
        setcookie('password', $password, 30);
    }
    
    
}else{
    header('Location:../../FrontEnd/index.php?error');
    exit();
}
$username_cookie = '';
$password_cookie = '';
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $username_cookie = $_COOKIE['username'];
    $password_cookie = $_COOKIE['password'];
}
}
