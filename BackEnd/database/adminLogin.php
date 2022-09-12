<?php
include 'config.php';
echo "connected!";
session_start();
if (isset($_POST['adminLogin'])){

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
if($row["usertype"]=="admin"){

    $_SESSION["username"] = $row['Username'];
    $_SESSION["password"] = $row['Password'];
   
    if (isset($_POST['remember'])){

        setcookie('username', $username, time()+10);
        setcookie('password', $password, time()+10);

    }else{
        setcookie('username', $username, 30);
        setcookie('password', $password, 30);
    }

    header('Location:../../FrontEnd/admin/dashboardpending.php');
    exit();
}elseif($row["usertype"]=="systemadmin"){
    $_SESSION["username"] = $row['Username'];
    $_SESSION["password"] = $row['Password'];
    header('Location:../../FrontEnd/systemadmin/home.php');
    exit();
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
?>