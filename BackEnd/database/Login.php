<?php
session_start();
include 'config.php';
// RESIDENT LOGIN
if (isset($_POST['resLogin'])){

    function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

    $username = validate ($_POST['username']);
    $password = validate (md5($_POST['password'])); 
// JOIN USERS TABLE
$result=mysqli_query($conn,"select * from accounts where userID ='".$username."' AND password = '$password' limit 1");

$row=mysqli_fetch_array($result);

if($row["usertype"]=="user"){

    $_SESSION["username"] = $row['userID'];
    $_SESSION["password"] = $row['password'];
// check remember me checkbox
    if (isset($_POST['remember'])){
// set cookie
        setcookie('resuname',$username,time()+100,"/");
        setcookie('respass',$password,time()+100,"/");
    }
// cookie expire
    else
    {
        setcookie('resuname',$username,100,"/");
        setcookie('respass',$password,100,"/");
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
}//ADMIN LOGIN
 elseif (isset($_POST['adminLogin'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$username = validate ($_POST['username']);
$password = validate (md5($_POST['password']));


$result=mysqli_query($conn,"select * from accounts where userID ='".$username."' AND password = '".$password."' limit 1");

$row=mysqli_fetch_array($result);
if($row["usertype"]=="admin"){

$_SESSION["username"] = $row['userID'];
$_SESSION["password"] = $row['password'];

if (isset($_POST['rememberme'])){

setcookie('adminuser', $username, time()+100,"/");
setcookie('adminpass', $password, time()+100,"/");

}else{
setcookie('adminuser', $username, 100,"/");
setcookie('adminpass', $password, 100,"/");
}

header('Location:../../FrontEnd/admin/dashboardpending.php');
exit();
}elseif($row["usertype"]=="systemadmin"){
$_SESSION["username"] = $row['userID'];
$_SESSION["password"] = $row['password'];

if (isset($_POST['rememberme'])){

    setcookie('sysadminuser', $username, time()+100,"/");
    setcookie('sysadminpass', $password, time()+100,"/");
    
    }else{
    setcookie('sysadminuser', $username, 100,"/");
    setcookie('sysadminpass', $password, 100,"/");
    }
header('Location:../../FrontEnd/systemadmin/home.php');
exit();
}else{
header('Location:../../FrontEnd/index.php?error');
exit();
}


}
?>