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
      .navbar-nav {
        display: none;
      }
    }
  </style>
  <title>Adimn Main Page</title>
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
            <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php if (isset($_SESSION['username'])) {
              echo "Welcome! " . $_SESSION['username'];}?>
              <i class="bi bi-caret-down-fill align-text-baseline ms-3"></i></button>
            <ul class="dropdown-menu bg-inner p-2">
              <li class="nav-item">
                <a class="btn btn-unselected w-100" href="profile.php" name="accounts">Profile</a>
              </li>
              <li class="nav-item my-2"><a type="button" href="chngepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a></li>
              <li class="nav-item"><a class="btn btn-unselected w-100" href="../../BackEnd/database/logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
<!--NAVBAR COLLAPSE CONTENT-->
  <div class="collapse navbar-collapse" id="navbarMenu">
    <div class="navbar-md-nav bg-inner">
      <ul class="navbar-nav bg-transparent text-center">
        <li class="nav-item">
          <button type="button" class="btn btn-unselected rounded-0 w-100" data-bs-toggle="modal" data-bs-target="#notif">Notification</button>
        </li>
        <li class="nav-item">
          <a class="btn btn-unselected w-100" href="profile.php" name="accounts">Profile</a>
        </li>
        <li class="nav-item">
          <a type="button" href="chngepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-unselected rounded-0" href="../../BackEnd/database/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
<!-- NOTIFICATION MODAL -->
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
<!-- ADMIN HOME PAGE CONTAINER -->
  <div class="container-md mt-5 text-center">
<!-- NAVIGATION PILLS -->
    <div class="d-flex align-items-start mx-auto">
      <div class="nav flex-column nav-pills me-3" id="nav" role="tablist" aria-orientation="vertical">
        <a class="nav-link active text-white bg-secondary my-1" id="dashboard-tab" data-bs-toggle="pill" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">
          Dashboard
        </a>
        <a class="nav-link text-white bg-secondary my-1" id="accounts-tab" data-bs-toggle="pill" href="#accounts" role="tab" aria-controls="accounts" aria-selected="false">
          Accounts
        </a>
        <a class="nav-link text-white bg-secondary my-1" id="services-tab" data-bs-toggle="pill" href="#services" role="tab" aria-controls="services" aria-selected="false">
          Services
        </a>
        <a class="nav-link text-white bg-secondary my-1" id="reports-tab" data-bs-toggle="pill" href="#reports" role="tab" aria-controls="reports" aria-selected="false">
          Reports
        </a>
      </div>
<!-- NAVIGATION CONTENTS -->
      <div class="tab-content w-100 justify-content-around mt-1 bg-inner p-5" id="nav">
<!-- DASHBOARD CONTENTS -->
  <!-- DASHBOARD NAV -->
        <div class="tab-pane container-fluid fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
          <ul class="nav nav-pills justify-content-between" id="dashboardPills" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="btn btn-secondary active w-100 text-nowrap" id="ongoingTab" data-bs-toggle="pill" data-bs-target="ongoing" type="button" role="tab" aria-controls="ongoing">
                On-going
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="btn btn-secondary active w-100 text-nowrap" id="pendingTab" data-bs-toggle="pill" data-bs-target="ongoing" type="button" role="tab" aria-controls="pending">
                Pending
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="btn btn-secondary active w-100 text-nowrap" id="completedTab" data-bs-toggle="pill" data-bs-target="ongoing" type="button" role="tab" aria-controls="completed">
                Completed
              </button>
            </li>
          </ul>
<!-- DASHBOARD NAV CONTENTS -->
            <div class="tab-content container-fluid fade show active" id="onGoing" role="tabpanel">
              <h1>hey</h1>
            </div>    
        </div>




        
        <div class="tab-pane fade" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
          Accounts
        </div>
        <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
          Services
        </div>
        <div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
          Reports
        </div>
      </div>
    </div> 
  </div>



<script src="../_assets/js/bootstrap.bundle.js"></script>
</body>

</html>