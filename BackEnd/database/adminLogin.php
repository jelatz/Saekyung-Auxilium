<?php
include 'config.php';
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
    $password = md5($password);

$result=mysqli_query($conn,"select * from accounts where userName='".$username."' AND password = '".$password."' limit 1");

$row=mysqli_fetch_array($result);
if($row["usertype"]=="admin"){

    $_SESSION["username"] = $row['userName'];
    $_SESSION["password"] = $row['password'];
   
    if (isset($_POST['remember'])){

        setcookie('adminuser', $username, time()+30,"/");
        setcookie('adminpass', $password, time()+30,"/");

    }else{
        setcookie('adminuser', $username, 30,"/");
        setcookie('adminpass', $password, 30,"/");
    }

    header('Location:../../FrontEnd/admin/dashboardpending.php');
    exit();
}elseif($row["usertype"]=="systemadmin"){
    $_SESSION["username"] = $row['userName'];
    $_SESSION["password"] = $row['password'];
    header('Location:../../FrontEnd/systemadmin/home.php');
    exit();
}else{
    header('Location:../../FrontEnd/index.php?error');
    exit();
}
}
?>