<?php
session_start();
include 'config.php';
if (isset($_POST['resLogin'])){

    function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

    $username = validate ($_POST['username']);
    $password = validate ($_POST['password']);
    $pass = md5($password);
   

$result=mysqli_query($conn,"select * from accounts where Username='".$username."' AND Password = '".$password."' limit 1");

$row=mysqli_fetch_array($result);

if($row["usertype"]=="user"){

    $_SESSION["username"] = $row['Username'];
    $_SESSION["password"] = $row['Password'];
// check remember me checkbox
    if (isset($_POST['remember'])){
        $remember_checkbox = $_POST['remember'];
// set cookie
        setcookie('username',$username,time()+86400*24*7);
        setcookie('uassword',$password,time()+86400*24*7);
        setcookie('userlogin',$remember_checkbox,time()+3600*24*7);
    }
// cookie expire
    else{
        setcookie('username',$username,30);
        setcookie('password',$password,30);
    }
// redirect to index.php
    header('Location:../../FrontEnd/residents/services.php');
    exit();
}else{
    header('Location:../../FrontEnd/index.php?error');
    exit();
}
$username_cookie = '';
$password_cookie = '';
$set_remember = '';
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $username_cookie = $_COOKIE['username'];
    $password_cookie = $_COOKIE['password'];
    $set_remember = "checked='checked'";
    } 
}
?>