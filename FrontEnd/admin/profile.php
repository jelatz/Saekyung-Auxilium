<?php
  session_start();
  include '../../BackEnd/database/config.php';
  // include '../../BackEnd/database/user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../_assets/css/bootstrap.css">
  <link rel="stylesheet" href="../_assets/css/custom.css">
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

 /*Profile Pic Start*/
.picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    width: 106px;
    height: 106px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
    height: 100%;
}
/*Profile Pic End*/
  </style>
  <title>Profile Page</title>
</head>
<body style="background-color: rgba(255,248,243);">
<!--header-->
<nav class="navbar navbar-expand-md px-2">
  <div class="container-fluid">
<!-- LOGO -->
    <a class="navbar-brand" href="dashboardpending.php"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="200"></a>
<!-- COLLAPSE BUTTON -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<!-- NAVBAR CONTENT -->
    <div class="collapse navbar-collapse justify-content-end">
      <div class="navbar-md-nav d-flex align-items-center">
        <a href="#" class="nav-link btn-link align-items-center me-3" data-bs-toggle="modal" data-bs-target="#notif"><img src="../_assets/images/bell-fill.svg" class="img-fluid" width="20">
        </a>
      <div class="dropdown">
      <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php
        if(isset($_SESSION['username'])){
        echo "Welcome! " . $_SESSION['username'];}?>
        <i class="bi bi-caret-down-fill align-text-baseline ms-3"></i></button>
        <ul class="dropdown-menu bg-inner p-2">
          <li class="nav-item my-2">
            <a class="btn btn-unselected w-100" href="profile.php" name="profile">Profile</a>
          </li>
          <li class="nav-item my-2">
            <a type="button" href="chngepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
          </li>
          <li class="nav-item my-2">
            <a class="btn btn-unselected w-100" href="../../BackEnd/database/logout.php" name="logout">Logout</a>
          </li>
        </ul>
      </div> 
      </div>
    </div>
  </div>
</nav>
<!-- Modal for Notifications -->
<div class="modal fade" id="notif" tabindex="-1" aria-labelledby="notif" aria-hidden="true" data-bs-backdrop="static">
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
      <li class="nav-item my-2">
            <a class="btn btn-unselected w-100" href="profile.php" name="profile">Profile</a>
          </li>
      <li class="nav-item">
        <a type="button" href="changepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn" href="../../BackEnd/database/logout.php">Logout</a>
      </li>
    </ul>
  </div> 
</div>
<!-- USER DETAILS -->
<div class="container-md my-5">
  <form action="../../BackEnd/database/user.php" class="needs-validation h-100" method="POST" enctype="multipart/form-data" novalidate="">
    <div class="row text-center justify-content-center">
      <?php if (isset($_GET['error'])){?><p class="error alert alert-danger"><?php echo $_GET['error'];?></p> <?php } ?>
      <?php if (isset($_GET['success'])){?><p class="error alert alert-success"><?php echo $_GET['success'];?></p> <?php } ?>
        <div class="col-lg-3 my-2">
            <div class="card h-100 my-2">
              <div class="card-header">Profile Picture</div>
              <div class="card-body">
                <div class="container">
                  <div class="picture-container">
                    <div class="picture mt-4">
                      <img src="../_assets/images/profile.png" class="picture-src" id="frame" title="">
                      <input type="file" id="wizard-picture" class="" onchange="preview()" accept="image/*" name="upload">
                    </div>
                      <h6 class="">Choose Picture(Optional)</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-6 my-2">
          <div class="card h-100 my-2">
            <div class="card-header">User Details</div>
            <div class="card-body">
                <label for="fName" class="form-label">Enter First Name: </label>
                <input type="text" class="form-control w-75 mx-auto" name="fName" required="">
                <div class="invalid-feedback">
                  Please enter your first name:
                </div>
                <label for="lName" class="form-label">Enter Last Name: </label>
                <input type="text" class="form-control w-75 mx-auto" name="lName" required="">
                <div class="invalid-feedback">
                  Please enter your last name:
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3 w-75">
          </form>
            </div>
          </div>
        </div>
    </div>
</div>

<script src="../_assets/js/bootstrap.bundle.js"></script>

<script type="text/javascript">
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
<script type="text/javascript">
    function preview(){
        frame.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
</body>
</html>