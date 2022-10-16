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
    @media screen and (min-width: 768px) {
      .navbar-nav{
        display: none;
      }
    }
  </style>
  <title>Residents History Page</title>
</head>
<body style="background-color: rgba(255,248,243);">
<!--header-->
<nav class="navbar navbar-expand-md px-2">
  <div class="container-fluid">
<!-- LOGO -->
    <a class="navbar-brand" href="services.php"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="200"></a>
<!-- COLLAPSE BUTTON -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"                data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<!-- NAVBAR CONTENT -->
    <div class="collapse navbar-collapse justify-content-end">
      <div class="navbar-md-nav d-flex align-items-center">
        <a href="#" class="nav-link btn-link align-items-center me-3" data-bs-toggle="modal" data-bs-target="#notif"><img src="../_assets/images/bell-fill.svg" class="img-fluid" width="20">
        </a>
      <div class="dropdown">
        <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if(isset($_SESSION['username'])){
        echo "Welcome! " . $_SESSION['username'];}?>
        <i class="bi bi-caret-down-fill align-text-baseline ms-3"></i></button>
        <ul class="dropdown-menu bg-inner p-2">
         <li class="nav-item my-2">
            <a class="btn btn-unselected w-100" href="profile.php" name="profile">Profile</a>
          </li>
          <li class="nav-item my-2">
          <a type="button" href="changepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
          </li>
          <li class="nav-item"><a class="btn btn-unselected w-100" href="../../BackEnd/database/logout.php">Logout</a></li>
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
<!-- Services and History -->
<div class="container">
  <div class="row my-3 gap-3 mx-auto">
    <div class="col-sm-5 col-lg-3 mx-auto">
      <a href="services.php" class="btn btn-unselected w-100">Services</a>
    </div>
    <div class="col-sm-5 col-lg-3 mx-auto">
      <a href="history.php" class="btn btn-unselected w-100 active" aria-current="page">History</a>
    </div>
  </div>
</div>
<!-- History Table -->
<div class="container-fluid">
  <div class="col-11 col-sm-10 col-lg-9 bg-inner p-5 my-4 my-lg-5 justify-content-center mx-auto">
    <div class="table-responsive-sm">
        <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
            <thead>
                <tr>
                    <th class="text-nowrap">Request #</th>
                    <th class="text-nowrap">Date Filed</th>
                    <th class="text-nowrap">Service</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Date Completed</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $reqSelect = mysqli_query($conn, "SELECT *,services.serviceType FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID");
                if($reqSelect)
                {
                while ($row = mysqli_fetch_array($reqSelect)){
              ?>
                <tr>
                    <td><?php echo $row['requestID']?></td>
                    <td><?php echo $row['dateFiled'] ?></td>
                    <td><?php echo $row['serviceType'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>Depends on the row</td>
                    <td>
                      <button type="submit" name="cancelReq" class="btn btn-danger">Cancel</button>
                    </td>
                    
                </tr>
              <?php 
              }
              }
              ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
<script src="../_assets/js/bootstrap.bundle.js"></script>
</body>
</html>