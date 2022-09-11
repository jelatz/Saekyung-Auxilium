<?php
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
  <title>System Administrator</title>
</head>
<body style="background-color: rgba(255,248,243);">
<!--header-->
<nav class="navbar navbar-expand-md px-2">
  <div class="container-fluid">
<!-- LOGO -->
    <a class="navbar-brand" href="home.html"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="150"></a>
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
        <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">Accounts
        </button>
        <ul class="dropdown-menu bg-inner p-2" style="left: -4rem;">
          <li class="nav-item my-2">
            <button type="button" class="btn btn-unselected w-100 text-nowrap" data-bs-toggle="modal" data-bs-target="#chngePassModal">Change Password</button>
          <li class="nav-item my-2"><a class="btn btn-unselected w-100" href="../../BackEnd/database/logout.php">Logout</a></li>
        </ul>
      </div> 
      </div>
    </div>
  </div>
</nav>
<!--Modal for change password -->
<div class="modal fade" id="chngePassModal" tabindex="-1" aria-labelledby="chngePassModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="chngePassModalTitle">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">    
        <form>
          <div class="mb-3">
            <label for="oldPassword" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="oldPassword">
            <label for="newPassword" class="form-label">Set New Password</label>
            <input type="password" class="form-control" id="newPassword">
            <label for="newConfirmPassword" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="newConfirmPassword">
          </div>
          <button type="submit" class="btn btn-unselected">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
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
        <button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#chngePassModal">Change Password</button>
      </li>
      <li class="nav-item">
        <a class="nav-link btn" href="../../BackEnd/database/logout.php">Logout</a>
      </li>
    </ul>
  </div> 
</div>
<!-- SYSTEM ADMIN NAVIGATION -->
<div class="container-md">
    <div class="row justify-content-center text-center">
        <ul class="nav nav-pills nav-justified gap-2 p-2">
            <li class="nav-item">
              <a class="btn btn-unselected w-100  text-dark fw-bold active" data-bs-toggle="pill" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-unselected w-100 text-dark fw-bold" data-bs-toggle="pill" href="#accounts">Accounts</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-unselected w-100 text-dark fw-bold" data-bs-toggle="pill" href="#reports">Reports</a>
            </li>
          </ul>
    </div>
</div>
<!-- NAVIGATION CONTENTS START -->
<div class="tab-content text-center mt-3">
<!-- Home contents START -->
  <div class="tab-pane container-md active" id="home">
    <div class="col-md-12 mx-auto p-3 bg-inner">
      <div class="table-responsive-sm mt-3">
        <table class="table table-sm table-hover table-bordered text-center" style="border-color:black;">
          <thead>
            <tr>
              <th>Request #</th>
              <th>User</th>
              <th>Date Filed</th>
              <th>Service</th>
              <th>Status</th>
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
              <td>sample</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<!-- HOME CONTENTS END -->
<!-- ACCOUNTS CONTENTS START -->
  <div class="tab-pane container-md fade" id="accounts">
    <div class="col-md-12 mx-auto p-3 bg-inner">
      <!-- SEARCH BAR START -->
      <div class="input-group rounded my-4 w-50 mx-auto">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
          <i class="bi bi-search"></i>
        </span>
      </div>
      <!-- SEARCH BAR END -->
      <!-- TABLE START -->
      <div class="table-responsive-sm mt-3">
        <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
          <thead>
            <tr>
              <th>Building #</th>
              <th>Room #</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>sample</td>
              <td>sample</td>
              <td style="width: 25vw;">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm mx-2" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                  <button class="btn btn-danger btn-sm" id="deleteBtn">Delete</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- TABLE END -->
      <!-- CREATE NEW ACCOUNT BUTTON START -->
    <button type="button" class="btn btn-unselected" data-bs-toggle="modal" data-bs-target="#createModal">Create New Account</button>
          <!-- CREATE NEW ACCOUNT BUTTON END -->
      <!-- Modal for Create START-->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content" style="background-color: rgb(255, 248,243)">
            <div class="modal-header">
              <h5 class="modal-title" id="createModalTitle">Create New Account</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">     
              <form action="/SaekyungAuxilium/BackEnd/database/insert.php" method="POST">
                <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-3">
                      <label for="userName" class="col-form-label fw-bold">Username </label>
                    </div>
                    <div class="col-12 col-sm-6">
                      <input type="text"  class="form-control" name="userName" id="userName" placeholder="Enter Username" autocomplete="off"> <!--  get input value from db -->
                    </div>  
                  </div>
                  <div class="row g-0 my-3">
                    <div class="col-12 col-sm-3">
                      <label for="password" class="col-form-label fw-bold">Password</label>
                    </div>
                    <div class="col-12 col-sm-6">
                      <input type="text"  class="form-control" name="password" id="password" placeholder="Enter Password" autocomplete="off"> 
                    </div>  
                  </div>
                <button type="submit" name="createSubmit" class="btn btn-unselected my-3 w-75" id="updateBtn">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL FOR CREATE END -->
    <!-- Modal for UPDATE START-->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="background-color: rgb(255, 248,243)">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalTitle">Update Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">    
          <form>
            <div class="mb-3">
              <div class="row g-0">
                <div class="col-12 col-sm-3">
                  <label for="userName" class="col-form-label fw-bold">Username </label>
                </div>
                <div class="col-12 col-sm-6">
                  <input type="text"  class="form-control" id="userName" value="2621"> <!--  get input value from db -->
                </div>  
              </div>
              <div class="row g-0 my-3">
                <div class="col-12 col-sm-3">
                  <label for="password" class="col-form-label fw-bold">Password</label>
                </div>
                <div class="col-12 col-sm-6">
                  <input type="text"  class="form-control" id="password" placeholder="Enter Password"> 
                </div>  
              </div>
              <button type="submit" class="btn btn-unselected my-3 w-75" id="updateBtn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 
   <!-- MODAL FOR UPDATE END -->
  </div>
  <!--accounts tab ends-->
  <!-- REPORTS CONTENT -->
</div>
  <div class="tab-pane container-md fade" id="reports">
    <div class="col-12 p-3 bg-inner">
      <p class="fw-bold text-start">Reports</p>
        <div class="row my-5">
          <div class="col-6 fw-bold">Montly</div>
          <div class="col-6 fw-bold">Yearly</div>
        </div>
        <div class="row text-center">
          <ul class="list-inline p-0 p-md-2">
            <span>
            <i class="bi bi-person-bounding-box" style="background-color:blue; color:blue;"></i>
            <li class="list-inline-item fw-bold text-dark">Electrical</li></span>
            <span><i class="bi bi-person-bounding-box" style="background-color:orangered; color:orangered;"></i>
            <li class="list-inline-item fw-bold text-dark">Furniture</li></span>
            <span><i class="bi bi-person-bounding-box" style="background-color:gray; color:gray;"></i>
            <li class="list-inline-item fw-bold text-dark">Painting</li></span>
            <span><i class="bi bi-person-bounding-box" style="background-color:yellow; color:yellow;"></i>
            <li class="list-inline-item fw-bold text-dark">Plumbing</li></span>
            <span><i class="bi bi-person-bounding-box" style="background-color:darkblue; color:darkblue;"></i>
            <li class="list-inline-item fw-bold text-dark">Security</li></span>
            <span><i class="bi bi-person-bounding-box" style="background-color:green; color:green;"></i>
            <li class="list-inline-item fw-bold text-dark">Tile</li></span>
            <span><i class="bi bi-person-bounding-box" style="background-color:red; color:red;"></i>
            <li class="list-inline-item fw-bold text-dark">Others</li></span>
          </ul>
        </div>
        <!-- DOWNLOADING REPORTS -->
        <div class="row justify-content-center">
          <div class="col-7 my-3 fw-bold">Date</div>
        </div>
        <div class="row justify-content-center">
        <form action="/action_page.php">
          <div class="mb-3 mt-3">
            <label for="from" class="form-label">From:</label>
            <input type="date" class="form-control mx-auto w-auto" id="from">
          </div>
          <div class="mb-3">
            <label for="to" class="form-label">To:</label>
            <input type="date" class="form-control mx-auto w-auto" id="to">
          </div>
        </form>
        </div>
        <div class="row justify-content-center my-2">
          <div class="col-sm-6">
            <button type="submit" class="btn btn-unselected  text-nowrap">Download Report</button>
          </div>
        </div>
    </div>
  </div>
</div>


<script src="../_assets/js/bootstrap.bundle.js"></script>
</body>
</html>