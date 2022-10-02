<?php
session_start();
include '../../BackEnd/database/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="refresh" content="10">
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
  <div class="container-fluid mt-5 text-center">
    <div class="row justify-content-center gap-4">
      <!-- HOME PAGE NAVIGATION -->
      <div class="col-md-2">
        <nav class="nav nav-column gap-2">
          <a href="#dashboard" class="nav-link active bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill">
            Dashboard
          </a>
          <a href="#accounts" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill">
            Accounts
          </a>
          <a href="#services" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill">
            Services
          </a>
          <a href="#reports" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill">
            Reports
          </a>
        </nav>
      </div>
      <!-- HOME PAGE NAVIGATION CONTENTS -->
      <div class="col-md-9 bg-primary">
        <div class="tab-pane fade show active" id="dashboard">
          <div class="row row-cols-3 row-cols-sm-1 p-2 justify-content-center">
            <nav class="nav nav-pills mt-5 gap-5 d-flex">
              <div class="col">
                <a href="#" class="nav-link active w-100 gap-2">
                  On-Going
                </a>
              </div>
              <div class="col">
                <a href="#" class="nav-link active w-100 gap-2">
                  Pending
                </a>
              </div>
              <div class="col">
                <a href="#" class="nav-link active w-100 gap-2">
                  Completed
                </a>
              </div>
            </nav>
          </div>
          <!-- SEARCH BAR -->
          <div class="input-group rounded my-4 w-50 mx-auto">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="bi bi-search"></i>
            </span>
          </div>
        </div>


        </div>
      </div>
  </div>


<script src="../_assets/js/bootstrap.bundle.js"></script>
</body>

</html>