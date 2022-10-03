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
                                                                                                                    echo "Welcome! " . $_SESSION['username'];
                                                                                                                  } ?>
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
        <nav class="nav nav-pills flex-column gap-2" role="tablist" aria-orientation="vertical">
          <a href="#dashboard" class="nav-link active bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill" id="dashboardTab" aria-controls="dashboard" role="tab" aria-selected="true">
            Dashboard
          </a>
          <a href="#accounts" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill" id="accountsTab" aria-controls="accounts" role="tab" aria-selected="false">
            Accounts
          </a>
          <a href="#services" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill" id="servicesTab" aria-controls="services" role="tab" aria-selected="false">
            Services
          </a>
          <a href="#reports" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill" id="reportsTab" aria-controls="reports" role="tab" aria-selected="false">
            Reports
          </a>
        </nav>
      </div>
<!-- HOME PAGE NAVIGATION CONTENTS -->
      <div class="col-md-9 bg-secondary p-3">
        <div class="tab-content" id="homeNavContent">
<!--DASHBOARD CONTENTS -->
<!-- DASHBOARD TABS -->
          <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboardTab" tabindex="0">
            <!-- <div class="row row-cols-3 row-cols-sm-1 px-5 justify-content-center mt-5"> -->
              <div class="nav nav-pills nav-justified gap-3 mt-3" role="tablist">
                <div class="col">
                  <button type="button" class="nav-link active w-100 text-nowrap text-dark bg-primary active" id="pendingTab" role="tab" data-bs-toggle="pill" data-bs-target="#pending">
                    Pending
                  </button>
                </div>
                <div class="col">
                  <button type="button" class="nav-link w-100 text-nowrap text-dark bg-primary" id="ongoingTab" role="tab" data-bs-toggle="pill" data-bs-target="#onGoing">
                    On-Going
                  </button>
                </div>
                <div class="col">
                  <button type="button" class="nav-link w-100 text-nowrap text-dark bg-primary" data-bs-toggle="pill" data-bs-target="#completed" role="tab" id="completedTab">
                    Completed
                  </button>
                </div>
              </div>
<!-- DASHBOARD TAB CONTENTS -->
            <div class="tab-content" id="dashboardContent">
<!-- PENDING CONTENTS -->
              <div class="tab-pane show active" id="pending" role="tabpanel">
                <!-- SEARCH BAR -->
                <div class="input-group rounded my-4 w-50 mx-auto">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                  </span>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Request #</th>
                      <th>User</th>
                      <th>Date Filed</th>
                      <th>Service Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>sample</td>
                      <td>sample</td>
                      <td>sample</td>
                      <td>sample</td>
                      <td>
                        <button type="submit" class="btn btn-primary btn-block">Accept</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
              </div>
<!-- ON-GOING CONTENTS -->
              <div class="tab-pane fade" id="onGoing" role="tabpanel">
                <!-- SEARCH BAR -->
                <div class="input-group rounded my-4 w-50 mx-auto">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                  </span>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Request #</th>
                      <th>User</th>
                      <th>Date Filed</th>
                      <th>Service Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>sample</td>
                      <td>sample</td>
                      <td>sample</td>
                      <td>sample</td>
                      <td>
                        <button type="submit" class="btn btn-primary btn-block">Complete</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
              </div>
<!-- COMPLETED CONTENTS -->
              <div class="tab-pane fade" id="completed" role="tabpanel">
                <!-- SEARCH BAR -->
                <div class="input-group rounded my-4 w-50 mx-auto">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                  </span>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Request #</th>
                      <th>User</th>
                      <th>Date Filed</th>
                      <th>Service Type</th>
                      <th>Date Completed</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>sample</td>
                      <td>sample</td>
                      <td>sample</td>
                      <td>sample</td>
                      <td>sample</td>
                    </tr>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
<!-- ACCOUNTS CONTENTS -->
          <div class="tab-pane fade" id="accounts" role="tabpanel" aria-labelledby="accountsTab" tabindex="0">
            <div class="row justify-content-center">
              <div class="input-group rounded my-4 w-50">
                <input type="search" class="form-control rounded w-50" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                <i class="bi bi-search"></i>
                </span>
              </div>
            </div>
            <table class="table table-sm table-bordered table-responsive">
              <thead>
                <tr>
                  <th>AccountsID</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>sample</td>
                  <td>
                    <button type="submit" class="btn btn-primary btn-sm">Reset Password</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>
  </div>


  <script src="../_assets/js/bootstrap.bundle.js"></script>
</body>

</html>