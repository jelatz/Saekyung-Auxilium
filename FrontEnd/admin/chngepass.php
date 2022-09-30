<?php
// session_start();
include '../../BackEnd/database/changepass.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../FrontEnd/_assets/css/bootstrap.css">
  <link rel="stylesheet" href="../../FrontEnd/_assets/css/custom.css">
  <style>
    .required::after{
      content: "*" !important;
      color: red !important;
    }
    @media screen and (min-width: 768px) {
      .navbar-nav{
        display: none;
      }
    }
  </style>
  <title>Residents Service Page</title>
</head>
<body style="background-color: rgba(255,248,243);">
<!--header-->
<nav class="navbar navbar-expand-md px-2">
  <div class="container-fluid">
<!-- LOGO -->
    <a class="navbar-brand" href="../../FrontEnd/admin/dashboardpending.php"><img src="../../FrontEnd/_assets/images/FINAL LOGO.png" class="img-fluid" width="200"></a>
<!-- COLLAPSE BUTTON -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<!-- NAVBAR CONTENT -->
    <div class="collapse navbar-collapse justify-content-end">
      <div class="navbar-md-nav d-flex align-items-center">
        <a href="#" class="nav-link btn-link align-items-center me-3" data-bs-toggle="modal" data-bs-target="#notif"><img src="../../FrontEnd/_assets/images/bell-fill.svg" class="img-fluid" width="20">
        </a>
      <div class="dropdown">
        <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        if(isset($_SESSION['username'])){
        echo "Welcome! " . $_SESSION['username'];}?>
        <i class="bi bi-caret-down-fill align-text-baseline ms-3"></i>
        </button>
        <ul class="dropdown-menu bg-inner p-2">
        <li class="nav-item my-2">
          <a class="btn btn-unselected w-100" href="profile.php" name="profile">Profile</a>
        </li>
        <li class="nav-item my-2">
          <a type="button" href="chngepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
        </li>
        <li class="nav-item my-2"><a class="btn btn-unselected w-100" href="../../BackEnd/database/logout.php" name="logout">Logout</a>
        </li>
        </ul>
      </div> 
      </div>
    </div>
  </div>
</nav>
<!-- Modal for Notifications -->
<div class="modal fade" id="notif" tabindex="-1" aria-labelledby="notif" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content" style="background-color: rgba(255,248,243);">
      <div class="modal-header">
        <h5 class="modal-title" id="norifTitle">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">SAMPLE NOTIFICATIONS    
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--NAVBAR COLLAPSE CONTENT-->
<div class="collapse navbar-collapse" id="navbarMenu">
  <div class="navbar-md-nav bg-inner">
    <ul class="navbar-nav bg-transparent text-center">
      <li class="nav-item">
        <button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#notif">Notification</button>
      </li>
      <li class="nav-item">
        <a type="button" href="../../BackEnd/database/adminchangepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn" href="../../BackEnd/database/logout.php">Logout</a>
      </li>
    </ul>
  </div> 
</div>
<!-- Change Password -->
<div class="container-fluid mt-5">
    <div class="col col-md-8 mx-auto p-5">
        <form action="../../BackEnd/database/hangepass.php" method="POST" class="needs-validation bg-dark text-light p-4" novalidate="" onSubmit="return valid();">
        <?php if (isset($_GET['error'])){?><p class="error alert alert-danger"><?php echo $_GET['error'];?></p> <?php } ?>
        <?php if (isset($_GET['success'])){?><p class="error alert alert-danger"><?php echo $_GET['success'];?></p> <?php } ?>
            <div class="mb-3">
                <?php if(isset($_SESSION['username'])){ $userID = $_SESSION['username'];}?>
                <input type="hidden" class="form-control" name="userName" value = <?php echo $userID ?>>
                <label  for="oldPassword" class="form-label" >Current Password</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                <div class="invalid-feedback">Current password required</div>
                <label for="newPassword" class="form-label" >Set New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                <div class="invalid-feedback">Enter a new password</div>
                <label for="newConfirmPassword" class="form-label" >Confirm New Password</label>
                <input type="password" class="form-control" id="newConfirmPassword" name="newConfirmPassword" required>
                <div class="invalid-feedback">Confirm password</div>
                <p class="mt-2 alert alert-info mt-3" role="alert"><strong>Password must only contain Alphanumeric characters</strong></p>
            </div>
                <button type="submit" name="adminSubmit" class="btn btn-unselected">Change Password</button>
        </form>    
    </div>
</div>

<script src="../../FrontEnd/_assets/js/bootstrap.bundle.js"></script>
<!-- form validation -->
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