<?php
include '../BackEnd/database/config.php';
session_start();
$username_cookie = '';
$password_cookie = '';
$admin_cookie = '';
$admin_pass_cookie = '';
if(isset($_COOKIE['resuname']) && isset($_COOKIE['respass'])){
    $username_cookie = $_COOKIE['resuname'];
    $password_cookie = $_COOKIE['respass'];
}elseif(isset($_COOKIE['adminuser']) && isset($_COOKIE['admipass'])){
    $admin_cookie = $_COOKIE['adminuser'];
    $admin_pass_cookie = $_COOKIE['adminpass'];
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
<body class="bg-image position-relative" style="background-image:url(_assets/images/login.png); background-repeat: no-repeat; background-size: cover; background-position: center; height: 100%;" style="overflow: auto;">
    <!-- navbar -->
<!-- <nav class="navbar navbar-expand-md justify-content-center">
    <div class="container-sm p-0">
        <a href="index.php" class="navbar-brand mx-auto d-block"><img src="_assets/images/FINAL LOGO.png" alt="logo" width="250"></a>
    </div>
</nav> -->
<?php 
    if (isset($_GET['error']))
    echo "<script>alert('Incorrect Username or Password!');</script>";
?>
    <?php if (isset($_GET['success'])){?><p class="error alert alert-success"><?php echo $_GET['success'];?></p> <?php } ?>
<!-- form box -->
<div class="form-box">
    <h2 class="text-center mt-5 mb-4">Login</h2>
    <div class="button-box mx-auto">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="residentlogin()">Resident</button>
        <button type="button" class="toggle-btn" onclick="adminlogin()">Admin</button>
    </div>

    <!-- RESIDENT LOGIN -->

<form action="../BackEnd/database/Login.php" method="POST" id="login-resident" class="input_group login-resident needs-validation" novalidate="">
    
    <input type="text" name="username" class="input-field" placeholder=" Username" required="" value="<?php echo $username_cookie;?>">
    <div class="invalid-feedback">
        Please enter username
    </div>
    <input type="password" name="password" class="input-field" placeholder=" Password" required="" value="<?php echo $password_cookie;?>">
    <div class="invalid-feedback">
        Please enter password
    </div>
    <input type="checkbox" name="remember" class="checkbox"><span>Remember me</span>
    <div class="mb-2">
    <a href="forgotPass.php" class="nav-link align-items-center me-3">Forgot Password</a>
    </div>
        <button class="btn submit-btn fw-bold fs-5 mt-4" type="submit" name="resLogin">Login</button>
</form>
<!-- ADMIN LOGIN -->
<form action="../BackEnd/database/Login.php" id="login-admin" class="input_group login-admin needs-validation" method="POST" novalidate="">
    <input type="text" class="input-field" name="username" placeholder=" Username" required="" value="<?php echo $admin_cookie;?>">
    <div class="invalid-feedback">
        Please enter username
    </div>
    <input type="password" class="input-field" name="password" placeholder=" Password" required="" value="<?php echo $admin_pass_cookie;?>">
    <div class="invalid-feedback">
        Please enter password
    </div>
    <input type="checkbox" class="checkbox" name="rememberme"><span>Remember me</span>
    <a href="forgotPass.php" class="nav-link align-items-center me-3">Forgot Password</a>
    <button class="btn submit-btn mt-2 fw-bold fs-5 mt-4" type=submit" name="adminLogin">Login</button>
</form>
</div>
<div class="container-fluid">
<footer class="mx-auto position-absolute bottom-0 start-50 translate-middle-x">
    <p class="mx-auto fs-6 text-white">&#169Copyright 2022. All rights Reserved.</p>
</footer>
</div>
<script src="../_assets/js/bootstrap.bundle.js"></script>
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
        y.style.left="1.9rem";
        z.style.left="11.7rem";
    }

    function residentlogin(){
        x.style.left="1.9rem";
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
<script>
    var forms = document.querySelectorAll('.needs-validation')
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
</script>


</body>
</html>