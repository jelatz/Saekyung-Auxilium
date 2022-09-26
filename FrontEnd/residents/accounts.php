<?php
  session_start();
  include '../../BackEnd/database/config.php';
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
    
}
/*Profile Pic End*/
  </style>
  <title>Residents Service Page</title>
</head>
<body style="background-color: rgba(255,248,243);">
<!--header-->
<nav class="navbar navbar-expand-md px-2">
  <div class="container-fluid">
<!-- LOGO -->
    <a class="navbar-brand" href="services.php"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="150"></a>
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
            <a class="btn btn-unselected w-100" href="accounts.php" name="accounts">Accounts</a>
          </li>
          <li class="nav-item my-2">
            <a type="button" href="changepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
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
      <li class="nav-item">
        <a type="button" href="../../BackEnd/database/changepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn" href="../../BackEnd/database/logout.php">Logout</a>
      </li>
    </ul>
  </div> 
</div>
<!-- USER DETAILS -->
<div class="container-md my-5">
    <div class="row">
        <div class="col col-md-6 bg-secondary mx-auto text-center">
            <form action="../../BackEnd/database/user.php" method="POST" class="p-3">
                <div class="picture-container my-3">
                    <div class="picture">
                        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="">
                        <input type="file" id="wizard-picture" class="">
                    </div>
                        <h6 class=" mt-3">Upload Photo</h6>
                </div>
                <label for="fName" class="form-label">Enter First Name: </label>
                <input type="text" class="form-control w-75 mx-auto">
                <label for="fName" class="form-label">Enter Last Name: </label>
                <input type="text" class="form-control w-75 mx-auto">
                <input type="submit" name="imgSubmit" value="Submit" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
</div>



<script src="../_assets/js/bootstrap.bundle.js"></script>


</body>
</html>