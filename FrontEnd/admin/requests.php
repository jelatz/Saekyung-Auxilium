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
  <title>Resident Services</title>
</head>

<body
  style="background-image:url(../_assets/images/resident.png); background-repeat: no-repeat; background-size: cover; background-position:center; height:100%;">
<!-- NAVBAR START-->
<nav class="navbar navbar-expand-md px-2 bg-inner">
  <div class="container-fluid">
    <a href="dashboard.php" class="navbar-brand"><img src="../_assets/images/FINAL LOGO.png" alt="LOGO"
        class="img-fluid position-relative" width=150; style="top:3px;"></a>
    <!-- NOTIFICATIONS DROPDOWN-->
    <div class="d-flex flex-row">
      <div class="dropdown">
        <button type="button" class="btn btn-link border-0 mx-auto text-decoration-none"
          data-bs-toggle="dropdown"><img src="../_assets/images/bell.png" class="img-fluid" width="25">
        </button>
        <ul class="dropdown-menu bg-transparent px-5 m-0 border-0 position-absolute" style="left: -21.5rem;">
          <div class="toast bg-inner2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-inner2 mb-2">
              <img src="../_assets/images/bell.png" class="img-fluid me-2" width="21">
              <strong class="me-auto text-center">Notifications</strong>
            </div>
            <a href="dashboardpending.php" class="text-decoration-none text-dark">
              <div class="toast" role="alert" aria-live="assertive" aria-atomic="true";>
                <div class="toast-header bg-inner2">
                  <strong class="me-auto">Bldg & Unit #:></strong>
                  <small class="text-muted text-dark">5 seconds ago</small>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-inner2">
                  <p>hey</p>
                </div>
              </div>
            </a>
           
          </div>
        </ul>
      </div>
      <!-- NOTIFICATIONS DROPDOWN END -->
      <!-- PROFILE DROPDOWN -->
      <div class="dropdown">
        <button type="button" class="btn btn-link border-0 mx-auto text-decoration-none"
          data-bs-toggle="dropdown"><img src="../_assets/images/profile.png" class="img-fluid" width="25">
        </button>
        <ul class="dropdown-menu position-absolute bg-inner2" style="left: -15.5rem; width: 305px;">
          <li class="nav-item">
            <div class="row">
              <div class="col-4">
                <img src="../_assets/images/profile.png" alt="profile" width="33.33" class="m-3 ms-5">
              </div>
              <div class="col pt-3">
                <p class="mb-0" style="font-size: 18px;
                ">Unit no.: 1101!</p>
                <a href="">Edit My Profile</a>
              </div>
          </li>
          <li class="nav-item">
            <img src="../_assets/images/logout.png" alt="logout" width="33.33" class="m-3 ms-5"><a href="../../BackEnd/database/logout.php" class="ms-3 text-dark" style="font-size:18px ;">Logout </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!-- NAVBAR END -->

<!-- NAVIGATION TABS START-->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 col-lg-2 p-0 bg-transparent">
      <nav class="nav nav-pills flex-column fs-5 gap-1 p-0">
        <a href="dashboard.php" class="nav-link text-white ps-5 ">Dashboard</a>
        <a href="requests.php" class="nav-link text-white ps-5 active">Requests</a>
        <a href="accounts.php" class="nav-link text-white ps-5 ">Accounts</a>
    </nav>
    </div>
<!-- NAVIGATION TABS END -->

<!-- NAVIGATION CONTENTS START -->
    <div class="col-md-9 col-lg-10 bg-inner3 p-md-5 p-sm-3" style="height: 52.9rem;">
      <h1 class="text-white">Welcome <strong>Admin!</strong></h1>
      <div class="row bg-inner justify-content-center text-center px-md-3 py-5 fs-5 m-3" style="border-radius: 10px;">
        
      <div class="tab-pane show active" id="dashboard" role="tabpanel" aria-labelledby="dashboardTab" tabindex="0">
            <!-- <div class="row row-cols-3 row-cols-sm-1 px-5 justify-content-center mt-5"> -->
            <div class="nav nav-pills nav-justified gap-3 mt-3" role="tablist" id="dashboardTabs">
              <div class="col">
                <button type="button" class="nav-link white bg-white w-100 text-nowrap text-dark active" id="pendingTab" role="tab" data-bs-toggle="pill" data-bs-target="#pending" onclick="window.location.reload()">
                  Pending
                </button>
              </div>
              <div class="col">
                <button type="button" class="nav-link w-100 text-nowrap text-dark bg-white white" id="ongoingTab" role="tab" data-bs-toggle="pill" data-bs-target="#onGoing">
                  On-Going
                </button>
              </div>
              <div class="col">
                <button type="button" class="nav-link w-100 text-nowrap text-dark bg-white white" data-bs-toggle="pill" data-bs-target="#completed" role="tab" id="completedTab">
                  Completed
                </button>
              </div>
            </div>
            <!-- DASHBOARD TAB CONTENTS -->
            <div class="tab-content mt-5" id="dashboardContent">
              <!-- PENDING CONTENTS -->
              <div class="tab-pane show active" id="pending" role="tabpanel">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Request #</th>
                        <th>User</th>
                        <th>Date Filed</th>
                        <th>Service Type</th>
                        <th>Concern</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "SELECT *,services.serviceType,request_status.status FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE status='Pending' ORDER BY servicerequest.dateFiled DESC");
                      while ($row = mysqli_fetch_array($result)) {
                        $id = $row['requestID'];
                        $_SESSION['servreqID'] = $id;
                        $accountID = $row['accountID'];
                        $dateFiled = $row['dateFiled'];
                        $serviceType = $row['serviceType'];
                        $status = $row['status'];
                        $concern = $row['concern'];

                        echo 
                        '<tr>
                      <form action="../../BackEnd/database/requests.php?id=' . $id . '"  method="POST" id="request">
                        <td> ' . date("Y") . $id . '</td>
                        <td> ' . $accountID . '</td>
                        <td> ' . $dateFiled . '</td>
                        <td> ' . $serviceType . '</td>
                        <td> ' . $concern . '</td>
                        <td>
                          <button type="submit" class="btn btn-primary btn-block" name="accept_btn">Accept</button>
                          <button type="submit" class="btn btn-primary btn-block" name="reject_btn">Reject</button>
                        </td>
                      </tr>
                      </form>';
                      }
                      ?>                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- ON-GOING CONTENTS -->
              <div class="tab-pane fade" id="onGoing<?php $ongoing ?>" role="tabpanel">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Request #</th>
                        <th>User</th>
                        <th>Date Filed</th>
                        <th>Service Type</th>
                        <th>Concern</th>
                        <th>Notes</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(isset($_GET['id'])){
                        $result = mysqli_query($conn, "SELECT *,services.serviceType,request_status.status FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE status='On-going'");

                      while ($row = mysqli_fetch_array($result)) {
                        $id = $row['requestID'];
                        $accountID = $row['accountID'];
                        $dateFiled = $row['dateFiled'];
                        $serviceType = $row['serviceType'];
                        $concern = $row['concern'];
                        echo '<tr>
                            <form action="../../BackEnd/database/requests.php?id=' . $id . '" method="POST">
                              <td> ' . date("Y") . $id . '</td>
                              <td> ' . $accountID . '</td>
                              <td> ' . $dateFiled . '</td>
                              <td> ' . $serviceType . '</td>
                              <td> ' . $concern . '</td>
                              <td>
                              <textarea class="form-control" rows="1" name="notes" placeholder="Progress Notes: <br> Maintenance Personnel Assigned: <br> Additional Notes:"></textarea>
                              </td>
                              <td>
                                <button type="submit" class="btn btn-primary btn-block" name="complete_btn">Complete</button>
                              </td>
                            </tr>
                            </form>';
                      }
                      }

                      ?>
                      <?php
                      $result = mysqli_query($conn, "SELECT *,services.serviceType,request_status.status FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE status='On-going'");

                      while ($row = mysqli_fetch_array($result)) {
                        $id = $row['requestID'];
                        $accountID = $row['accountID'];
                        $dateFiled = $row['dateFiled'];
                        $serviceType = $row['serviceType'];
                        $concern = $row['concern'];
                        echo '<tr>
                            <form action="../../BackEnd/database/requests.php?id=' . $id . '" method="POST">
                              <td> ' . date("Y") . $id . '</td>
                              <td> ' . $accountID . '</td>
                              <td> ' . $dateFiled . '</td>
                              <td> ' . $serviceType . '</td>
                              <td> ' . $concern . '</td>
                              <td>
                              <textarea class="form-control" rows="1" name="notes" placeholder="Progress Notes: <br> Maintenance Personnel Assigned: <br> Additional Notes:"></textarea>
                              </td>
                              <td>
                                <button type="submit" class="btn btn-primary btn-block" name="complete_btn">Complete</button>
                              </td>
                            </tr>
                            </form>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- COMPLETED CONTENTS -->
              <div class="tab-pane fade" id="completed<?php $completed ?>" role="tabpanel">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Request #</th>
                        <th>User</th>
                        <th>Date Filed</th>
                        <th>Service Type</th>
                        <th>Concern</th>
                        <th>Notes</th>
                        <th>Date Completed</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "SELECT *,services.serviceType,request_status.status FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE status='Completed' ORDER BY requestID DESC");

                      while ($row = mysqli_fetch_array($result)) {
                        $id = $row['requestID'];
                        $accountID = $row['accountID'];
                        $dateFiled = $row['dateFiled'];
                        $serviceType = $row['serviceType'];
                        $concern = $row['concern'];
                        $notes = $row['notes'];
                        $dateCompleted = $row['dateCompleted'];
                        echo '<tr>
                            <form action="../../BackEnd/database/requests.php?id=' . $id . '" method="POST">
                              <td> ' . date("Y") . $id . '</td>
                              <td> ' . $accountID . '</td>
                              <td> ' . $dateFiled . '</td>
                              <td> ' . $serviceType . '</td>
                              <td> ' . $concern . '</td>
                              <td> ' . $notes . '</td>
                              <td> ' . $dateCompleted . '</td>
                            </tr>
                            </form>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



      </div>
    </div>

  </div>
</div>
<!-- NAVIGATION CONTENTS END -->
<!-- BOOTSTRAP JS -->
<script src="../_assets/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- NOTIFICATION TOAST SCRIPT -->
<script>
  var toastElList = [].slice.call(document.querySelectorAll('.toast'))
  var toastList = toastElList.map(function (toastEl) {
    return new bootstrap.Toast(toastEl, {
      autohide: false
    }).show()
  })
</script>
<!-- form validation -->
<script>
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
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