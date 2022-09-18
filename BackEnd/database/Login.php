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
    $password = validate (md5($_POST['password'])); 
    // $password = md5($password);

$result=mysqli_query($conn,"select * from accounts where userName='".$username."' AND password = '$password' limit 1");

$row=mysqli_fetch_array($result);

if($row["usertype"]=="user"){

    $_SESSION["username"] = $row['userName'];
    $_SESSION["password"] = $row['password'];
// check remember me checkbox
    if (isset($_POST['remember'])){
// set cookie
        setcookie('resuname',$username,time()+10,"/");
        setcookie('respass',$password,time()+10,"/");
    }
// cookie expire
    else
    {
        setcookie('resuname',$username,10,"/");
        setcookie('respass',$password,10,"/");
    }
// redirect to index.php
    header('Location:../../FrontEnd/residents/services.php');
    exit();
}
// error for invalid username or password
else{
    header('Location:../../FrontEnd/index.php?error');
    exit();
}
}
?>