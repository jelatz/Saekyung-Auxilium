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
$result=mysqli_query($conn,"select * from accounts where accountID='".$username."' AND password = '$password' limit 1");

$row=mysqli_fetch_array($result);

if($row["usertype"]=="user"){

    $_SESSION["username"] = $row['accountID'];
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
}//ADMIN LOGIN
 elseif (isset($_POST['adminLogin'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$username = validate ($_POST['username']);
$password = validate ($_POST['password']);
$password = md5($password);

$result=mysqli_query($conn,"select * from accounts where accountID='".$username."' AND password = '".$password."' limit 1");

$row=mysqli_fetch_array($result);
if($row["usertype"]=="admin"){

$_SESSION["username"] = $row['accountID'];
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
$_SESSION["username"] = $row['accountID'];
$_SESSION["password"] = $row['password'];
header('Location:../../FrontEnd/systemadmin/home.php');
exit();
}else{
header('Location:../../FrontEnd/index.php?error');
exit();
}


}
?>