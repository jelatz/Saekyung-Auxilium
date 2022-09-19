<?php
include '../BackEnd/database/config.php';
session_start();
$username_cookie = '';
$password_cookie = '';
if(isset($_COOKIE['resuname']) && isset($_COOKIE['respass'])){
    $username_cookie = $_COOKIE['resuname'];
    $password_cookie = $_COOKIE['respass'];
}elseif(isset($_COOKIE['adminuser'])){

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_assets/css/bootstrap.css">
    <link rel="stylesheet" href="_assets/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Saekyung Auxilium: Condominium Management Information System</title>
</head>
<body class="bg-image" style="background-image:url(_assets/images/indexbackgroundblur.png); background-repeat: no-repeat; background-size: cover; background-position: center; height: 100vh;">
    <!-- navbar -->
<nav class="navbar navbar-expand-md justify-content-center">
    <div class="container-sm p-0">
        <a href="index.php" class="navbar-brand mx-auto d-block"><img src="_assets/images/FINAL LOGO.png" alt="logo" width="250"></a>
    </div>
</nav>

<!-- form box -->
<div class="form-box my-5">
    <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="residentlogin()">Resident Login</button>
        <button type="button" class="toggle-btn" onclick="adminlogin()">Admin Login</button>
    </div>

    <!-- RESIDENT LOGIN -->
<?php 
    if (isset($_GET['error'])){?>
    <p class="alert alert-danger text-center mx-auto fw-bold" id="residentError" style="width:90%;"><?php echo $_GET['error'];?>Invalid Username or Password</p>  
<?php  
}?>
<form action="../BackEnd/database/Login.php" method="POST" id="login-resident" class="input_group login-resident">
    <input type="text" name="username" class="input-field" placeholder="Enter Building & Unit #" required value="<?php echo $username_cookie;?>">
    <input type="password" name="password" class="input-field" placeholder="Password" required value="<?php echo $password_cookie;?>">
    <input type="checkbox" name="remember" class="checkbox"><span>Remember me</span>
    <div class="mb-2">
    <a href="#" class="nav-link align-items-center me-3" data-bs-toggle="modal" data-bs-target="#resetPass">Forgot Password</a>
    </div>
        <button class="btn submit-btn" type="submit" name="resLogin">Login</button>
</form>
<!-- MODAL FOR FORGOT PASSWORD -->
<div class="modal fade" id="resetPass" tabindex="-1" aria-labelledby="notif" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="background-color: rgba(255,248,243);">
            <div class="modal-header">Reset Password</div>
                <h5 class="modal-title" id="norifTitle">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="container-sm">
                    <div class="col col-sm-8 col-lg-5 mx-auto my-5">
                        <div class="card">
                            <div class="card-header"> Reset Password</div>
                            <div class="card-body">
                                <form action="#">
                                    <label for="uniquePass" class="form-label fw-bold">Enter your default password</label>
                                    <input type="text" class="form-control" name="defPass">
                                    <a href="#" class="btn btn-secondary mt-3">Submit</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- ADMIN LOGIN -->
<form action="../BackEnd/database/Login.php" id="login-admin" class="input_group login-admin" method="POST">
    <input type="text" class="input-field" name="username" placeholder="Username" required>
    <input type="password" class="input-field" name="password" placeholder="Password" required>
    <input type="checkbox" class="checkbox" name="remember"><span>Remember me</span>
    <button class="btn submit-btn" type="submit" name="adminLogin">Login</button>
</form>
</div>

<script>
    var x = document.getElementById("login-resident");
    // var a = document.getElementById("residentError");
    var y = document.getElementById("login-admin");
    var z = document.getElementById("btn");
    var xxx = window.matchMedia('(max-width: 576px)');
    var xx = window.matchMedia('(max-width: 407px)');
    

    function adminlogin(){
        x.style.left="-25rem";
        // a.style.left="-25rem";
        y.style.left="3.125rem";
        z.style.left="12rem";
    }

    function residentlogin(){
        x.style.left="3.125rem";
        // a.style.left="5.125rem";
        y.style.left="28.125rem";
        z.style.left="0rem";
    }
    if(xxx.matches) {
        function adminlogin(){
            x.style.left="-80rem";
            // a.style.left="-80rem";
            y.style.left="3rem";
            z.style.left="50%";
        }
        function residentlogin(){
        x.style.left="3rem";
        // a.style.left="3rem";
        y.style.left="40rem";
        z.style.left="0rem";
        }
    }
    if(xx.matches) {
        function adminlogin(){
            x.style.left="-80rem";
            // a.style.left="-80rem";
            y.style.left="0rem";
            z.style.left="50%";
        }
        function residentlogin(){
        x.style.left="0rem";
        // a.style.left="0rem";
        y.style.left="40rem";
        z.style.left="0rem";
        }
    }
</script> 

</body>

</html>