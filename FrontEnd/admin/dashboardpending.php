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
  <title>Adimn Main Page</title>
</head>
<body style="background-color: rgba(255,248,243);">
<!--header-->
<nav class="navbar navbar-expand-md px-2">
  <div class="container-fluid">
<!-- LOGO -->
    <a class="navbar-brand" href="dashboardpending.php"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="150"></a>
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
        <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">Accounts
        </button>
        <ul class="dropdown-menu bg-inner p-2" style="left: -4rem;">
          <li class="nav-item my-2">
            <button type="button" class="btn btn-unselected w-100 text-nowrap" data-bs-toggle="modal" data-bs-target="#chngePassModal">Change Password</button>
          <li class="nav-item"><a class="btn btn-unselected w-100" href="../../BackEnd/database/logout.php">Logout</a></li>
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
        <button type="button" class="btn btn-unselected rounded-0 w-100" data-bs-toggle="modal" data-bs-target="#notif">Notification</button>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-unselected rounded-0 w-100" data-bs-toggle="modal" data-bs-target="#chngePassModal">Change Password</button>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-unselected rounded-0" href="../../BackEnd/database/logout.php">Logout</a>
      </li>
    </ul>
  </div> 
</div>
                                                    <!-- SMALL DEVICES -->
<!-- tab nav -->
<div class="medium">
  <div class="container-fluid mt-2">
    <ul class="nav nav-pills nav-justified justify-content-center gap-2">
      <li class="nav-item">
        <a class="nav-link px-0 bg-adminBackground text-dark fw-bold active" data-bs-toggle="pill" href="#dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-0 bg-adminBackground text-dark fw-bold" data-bs-toggle="pill" href="#accounts">Accounts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-0 bg-adminBackground text-dark fw-bold" data-bs-toggle="pill" href="#reports">Reports</a>
      </li>
    </ul>
  </div>

  <!-- tab contents -->
  <div class="tab-content text-center mt-3">
    <!-- dashboard contents -->
    <div class="tab-pane container-fluid active" id="dashboard">
      <div class="col-12 p-3 bg-inner">  
        <!-- dashboard status nav -->
        <div class="container-fluid mt-2">
          <ul class="nav nav-pills flex-column nav-justified justify-content-center gap-2">
            <li class="nav-item">
              <a class="btn  px-0 btn-unselected w-100 text-dark fw-bold active" data-bs-toggle="pill" href="#pending">Pending</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-unselected w-100 px-0 text-dark fw-bold" data-bs-toggle="pill" href="#ongoing">On-going</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-unselected w-100 px-0 text-dark fw-bold" data-bs-toggle="pill" href="#completed">Completed</a>
            </li>
          </ul>
        </div> 
      <!-- content for Pending -->
      <div class="tab-content text-center mt-3">
        <div class="input-group rounded my-4 w-75 mx-auto">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          <span class="input-group-text border-0" id="search-addon">
            <i class="bi bi-search"></i>
          </span>
        </div>
        <!-- pending tab panes -->
        <div class="tab-pane container-fluid active" id="pending">
          <div class="table-responsive-sm mt-3">
            <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
              <thead>
                <tr>
                  <th class="text-nowrap">Request #</th>
                  <th class="text-nowrap">Building & Unit #</th>
                  <th class="text-nowrap">Date Filed</th>
                  <th class="text-nowrap">Service</th>
                  <th class="text-nowrap">Status</th>
                  <th class="text-nowrap"></th>                
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>sample</td>
                  <td>sample</td>
                  <td>sample</td>
                  <td>sample</td>
                  <td>sample</td>
                  <td><button type="button" id="acceptBtn" class="btn btn-primary btn-sm">Accept</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- ongoing tab panes -->
        <div class="tab-pane container-fluid fade mx-0 p-0" id="ongoing">
          <div class="table-responsive-lg mt-3">
            <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
              <thead>
                <tr>
                  <th>Request #</th>
                  <th>Building & Unit #</th>
                  <th>Date Filed</th>
                  <th>Service</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>sample</td>
                  <td>sample</td>
                  <td>sample</td>
                  <td>sample</td>
                  <td>
                    <select class="form-select form-select-sm border-0 bg-transparent mx-auto" style="width: 6.5rem;" aria-label="Small select">
                      <option selected="">On-going</option>
                      <option value="1">Completed</option>
                    </select>
                  </td>
                  <td><button type="button" id="updateBtn" class="btn btn-primary btn-sm">Update</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- completed tab panes -->
        <div class="tab-pane container-fluid fade" id="completed">
          <div class="table-responsive-lg mt-3">
            <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
              <thead>
                <tr>
                  <th>Request #</th>
                  <th>Building & Unit #</th>
                  <th>Date Filed</th>
                  <th>Service</th>
                  <th>Date Compeleted</th>
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
    </div>
  <!-- Accounts contetnt -->
  <div class="tab-pane container-fluid fade" id="accounts">
    <div class="col-12 p-3 bg-inner">
      <div class="container-fluid mt-2">
        <!-- <ul class="nav nav-pills flex-column nav-justified justify-content-center gap-2">
          <li class="nav-item">
            <a class="btn  px-0 btn-unselected w-100 text-dark fw-bold active" data-bs-toggle="pill" href="#b1">Building 1</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-unselected w-100 px-0 text-dark fw-bold" data-bs-toggle="pill" href="#b2">Building 2</a>
          </li>
        </ul> -->
        <!-- Building 1 content -->
        <div class="tab-content text-center mt-3">
          <div class="input-group rounded my-4 w-75 mx-auto">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="bi bi-search"></i>
            </span>
          </div>  
      
      <!-- Building 1 tab pane -->
      <div class="tab-pane container active" id="b1">
        <div class="table-responsive-sm mt-3">
          <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
              <thead>
                <tr>
                  <th>Unit #</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>sample</td>
                  <td>
                    <button type="button" id="resetPass" class="btn btn-primary btn-sm ">Reset Password</button>
                  </td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
      <!-- Building 2 tab pane -->
      <div class="tab-pane container fade" id="b2">
        <div class="table-responsive-sm mt-3">
          <table class="table table-sm table-hover table-bordered text-center" style="border-color:black;">
              <thead>
                <tr>
                  <th>Unit #</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>sample</td>
                  <td>
                    <button type="button" id="resetPass" class="btn btn-primary btn-sm ">Reset Password</button>
                  </td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
      </div>
    </div> 
  </div>
</div>
  <!-- Reports content -->
      <div class="tab-pane container-fluid fade" id="reports">
        <div class="col-12 p-3 bg-inner">
          <p class="fw-bold text-start">Reports</p>
            <div class="row my-5">
              <div class="col-6 fw-bold">Montly</div>
              <div class="col-6 fw-bold">Yearly</div>
            </div>
            <div class="row text-center">
              <ul class="list-inline p-0 p-md-2">
                <span><i class="bi bi-person-bounding-box" style="background-color:blue; color:blue;"></i>
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
        </div>
      </div>
  </div>
</div>
                                    <!-- BIG DEVICES -->
<div class="large">
  <div class="container my-3 mx-auto">
    <div class="row justify-content-center my-3">
      <div class="col-2">
        <ul class="nav nav-pills flex-xl-column nav-justified justify-content-center gap-2">
          <li class="nav-item">
            <a class="nav-link w-100 px-0 bg-adminBackground text-dark fw-bold active" data-bs-toggle="pill" href="#dashboardB">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link w-100 px-0 bg-adminBackground text-dark fw-bold" data-bs-toggle="pill" href="#accountsB">Accounts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link w-100 px-0 bg-adminBackground text-dark fw-bold" data-bs-toggle="pill" href="#reportsB">Reports</a>
          </li>
        </ul>
      </div>
<!-- Dashboard status -->
        <div class="col-10 bg-inner">
          <div class="tab-content text-center mt-3">
            <!-- dashboard contents -->
            <div class="tab-pane container-fluid active" id="dashboardB">
              <div class="col-12 p-3 bg-inner">  
                <!-- dashboard status nav -->
                <div class="container-fluid mt-2">
                  <ul class="nav nav-pills nav-justified justify-content-center gap-2">
                    <li class="nav-item">
                      <a class="btn  px-0 btn-unselected w-100 text-dark fw-bold active" data-bs-toggle="pill" href="#pendingB">Pending</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-unselected w-100 px-0 text-dark fw-bold" data-bs-toggle="pill" href="#ongoingB">On-going</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-unselected w-100 px-0 text-dark fw-bold" data-bs-toggle="pill" href="#completedB">Completed</a>
                    </li>
                  </ul>
                </div> 
              <!-- content for Pending -->
              <div class="tab-content text-center mt-3">
                <div class="input-group rounded my-4 w-75 mx-auto">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                  </span>
                </div>
                <!-- pending tab panes -->
                <div class="tab-pane container-fluid active" id="pendingB">
                  <div class="table-responsive-sm mt-3">
                    <table class="table table-sm table-hover table-bordered text-center" style="border-color:black;">
                      <thead>
                        <tr>
                          <th class="text-nowrap">Request #</th>
                          <th class="text-nowrap">Building & Unit #</th>
                          <th class="text-nowrap">Date Filed</th>
                          <th class="text-nowrap">Service</th>
                          <th class="text-nowrap">Status</th>
                          <th class="text-nowrap"></th>                
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td><button type="button" id="acceptBtn" class="btn btn-primary btn-sm">Accept</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- ongoing tab panes -->
                <div class="tab-pane container-fluid fade mx-0 p-0" id="ongoingB">
                  <div class="table-responsive-lg mt-3">
                    <table class="table table-sm table-hover table-bordered text-center" style="border-color:black;">
                      <thead>
                        <tr>
                          <th>Request #</th>
                          <th>Building & Unit #</th>
                          <th>Date Filed</th>
                          <th>Service</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>
                            <select class="form-select form-select-sm border-0 bg-transparent mx-auto" style="width: 6.5rem;" aria-label="Small select">
                              <option selected="">On-going</option>
                              <option value="1">Completed</option>
                            </select>
                          </td>
                          <td><button type="button" id="updateBtn" class="btn btn-primary btn-sm">Update</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- completed tab panes -->
                <div class="tab-pane container-fluid fade" id="completedB">
                  <div class="table-responsive-lg mt-3">
                    <table class="table table-sm table-hover table-bordered text-center" style="border-color:black;">
                      <thead>
                        <tr>
                          <th>Request #</th>
                          <th>Building & Unit #</th>
                          <th>Date Filed</th>
                          <th>Service</th>
                          <th>Date Compeleted</th>
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
            </div>
          <!-- Accounts contetnt -->
          <div class="tab-pane container-fluid fade" id="accountsB">
            <div class="col-12 p-3 bg-inner">
              <div class="container-fluid mt-2">
                <!-- <ul class="nav nav-pills nav-justified justify-content-center gap-2">
                  <li class="nav-item">
                    <a class="btn  px-0 btn-unselected w-100 text-dark fw-bold active" data-bs-toggle="pill" href="#b1B">Building 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-unselected w-100 px-0 text-dark fw-bold" data-bs-toggle="pill" href="#b2B">Building 2</a>
                  </li>
                </ul> -->
                <!-- Building 1 content -->
                <div class="tab-content text-center mt-3">
                  <div class="input-group rounded my-4 w-75 mx-auto">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="bi bi-search"></i>
                    </span>
                  </div>  
              
              <!-- Building 1 tab pane -->
              <div class="tab-pane container active" id="b1B">
                <div class="table-responsive-sm mt-3">
                  <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
                      <thead>
                        <tr>
                          <th>Building & Unit #</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>sample</td>
                          <td>
                            <button type="button" id="resetPass" class="btn btn-primary btn-sm ">Reset Password</button>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
              <!-- Building 2 tab pane -->
              <div class="tab-pane container fade" id="b2B">
                <div class="table-responsive-sm mt-3">
                  <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
                      <thead>
                        <tr>
                          <th>Unit #</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>sample</td>
                          <td>
                            <button type="button" id="resetPass" class="btn btn-primary btn-sm ">Reset Password</button>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div> 
          </div>
        </div>
          <!-- Reports content -->
              <div class="tab-pane container-fluid fade" id="reportsB">
                <div class="col-12 p-3 bg-inner">
                  <p class="fw-bold text-start">Reports</p>
                    <div class="row my-5">
                      <div class="col-6 fw-bold">Montly</div>
                      <div class="col-6 fw-bold">Yearly</div>
                    </div>
                    <div class="row text-center">
                      <ul class="list-inline p-0 pm-2">
                        <span><i class="bi bi-person-bounding-box" style="background-color:blue; color:blue;"></i>
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
                </div>
              </div>
          </div>

      </div>
    </div>

  </div>
</div>

<script src="../_assets/js/bootstrap.bundle.js"></script>
</body>
</html>