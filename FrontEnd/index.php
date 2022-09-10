<?php
// require '../BackEnd/database/config.php';
include '../BackEnd/database/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_assets/css/bootstrap.css">
    <link rel="stylesheet" href="_assets/css/custom.css">
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
<form action="../BackEnd/database/resLogin.php" method="post" id="login-resident" class="input_group login-resident">
    <input type="text" name="username" class="input-field" placeholder="Enter Building & Unit #" required>
    <input type="password" name="password" class="input-field" placeholder="Password" required>
    <input type="checkbox" class="checkbox"><span>Remember Password</span>
    <div class="mb-2">
        <a href="#" class="text-dark" id="forgetPassword">Forgot Password?</a>
    </div>
        <button class="btn submit-btn" type="submit" name="login">Login</button>
</form>
<!-- ADMIN LOGIN -->
<form id="login-admin" class="input_group login-admin">
    <input type="text" class="input-field" placeholder="Username" required>
    <input type="password" class="input-field" placeholder="Password" required>
    <input type="checkbox" class="checkbox"><span>Remember Password</span>
    <button class="btn submit-btn" type="submit">Login</button>
</form>
</div>

<script>
    var x = document.getElementById("login-resident");
    var y = document.getElementById("login-admin");
    var z = document.getElementById("btn");
    var xxx = window.matchMedia('(max-width: 576px)');
    var xx = window.matchMedia('(max-width: 407px)');
    

    function adminlogin(){
        x.style.left="-25rem";
        y.style.left="3.125rem";
        z.style.left="12rem";
    }

    function residentlogin(){
        x.style.left="3.125rem";
        y.style.left="28.125rem";
        z.style.left="0rem";
    }
    if(xxx.matches) {
        function adminlogin(){
            x.style.left="-80rem";
            y.style.left="3rem";
            z.style.left="50%";
        }
        function residentlogin(){
        x.style.left="3rem";
        y.style.left="40rem";
        z.style.left="0rem";
        }
    }
    if(xx.matches) {
        function adminlogin(){
            x.style.left="-80rem";
            y.style.left="0rem";
            z.style.left="50%";
        }
        function residentlogin(){
        x.style.left="0rem";
        y.style.left="40rem";
        z.style.left="0rem";
        }
    }
</script> 

</body>

</html>