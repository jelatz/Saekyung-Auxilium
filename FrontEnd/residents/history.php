<?php
session_start();
include '../../BackEnd/database/config.php';
// include '../../BackEnd/database/requests.php';
$userdetails = mysqli_query($conn,"SELECT firstname,lastname FROM accounts WHERE userID = '".$_SESSION["username"]."'");
$row = mysqli_fetch_array($userdetails);
$firstname = $row['firstname'];
$lastname = $row['lastname'];

if(isset($_GET['notifid']))
{
  $notifid = $_GET['notifid'];
  $update = mysqli_query($conn,"UPDATE notifications_resident SET status = 1 WHERE notifID = $notifid");
}
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
      <div class="dropdown">
            <!-- NOTIFICATIONS -->
            <?php
              $selectnotif = mysqli_query($conn,"SELECT * FROM notifications_resident WHERE status = 0");
              $count = mysqli_num_rows($selectnotif);
            ?>
             <button type="button" class="btn btn-link border-0 mx-auto text-decoration-none" data-bs-toggle="dropdown"><img src="../_assets/images/bell-fill.svg" class="img-fluid" width="21">
            <?php
              if($count == 0){

              }else{
                echo '<span class="badge bg-danger rounded-circle" style="position: relative; top:-10px; left:-10px;">';
                echo $count;
              }
            ?>
          </span>
            </button>
            <ul class="dropdown-menu px-5 m-0 bg-transparent border-0" style="left: -10rem;">
              <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                  <img src="../_assets/images/bell-fill.svg" class="img-fluid me-2" width="21">
                  <strong class="me-auto text-center">Notifications</strong>
                </div>
                <?php 
                  $select = mysqli_query($conn,"SELECT * FROM notifications_resident WHERE status = 0");
                  while ($row = mysqli_fetch_array($select))
                  {
                    $notifID = $row['notifID'];
                ?>
                <a href="history.php?notifid=<?php echo $notifID;?>" class="text-decoration-none text-dark">
                  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                      <strong class="me-auto">Bldg & Unit #: <?php echo $row['user'];?></strong>
                      <small class="text-muted">5 seconds ago</small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                      <p><?php echo $row['message']?></p>
                    </div>
                  </div>
                </a>
                  <?php
                  }
                  ?>
              </div>
            </ul>
          </div>
      <div class="dropdown">
        <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        if($firstname > 0){
          echo "WELCOME ";
          echo strtoupper($firstname);
          echo '&nbsp';
          echo strtoupper($lastname) , '!';
        }else{
        if(isset($_SESSION['username'])){
        echo "Welcome! " . $_SESSION['username'];}}?>
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
                    <th class="text-nowrap">Bldng & Unit #</th>
                    <th class="text-nowrap">Date Filed</th>
                    <th class="text-nowrap">Service</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Date Completed</th>
                    <th class="text-nowrap">Notes</th>
                </tr>
            </thead>
            <tbody>
          <?php
                $reqSelect = mysqli_query($conn, "SELECT *,services.serviceType,request_status.status FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE servicerequest.accountID = '".$_SESSION['username']."' ORDER BY requestID DESC");
                if($reqSelect)
                {
                  while ($row = mysqli_fetch_array($reqSelect)){
                    $requestID = $row['requestID'];
                    ?>
                <tr>
                  <td><?php echo date("Y").$row['requestID']?></td>
                  <td><?php echo $row['accountID']?></td>
                  <td><?php echo $row['dateFiled'] ?></td>
                  <td><?php echo $row['serviceType'] ?></td>
                  <td><?php echo $row['status'] ?></td>
                  <td><?php echo $row['dateCompleted'] ?></td>
                  <td><?php echo $row['notes'] ?></td>
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
  <!-- NOTIFICATION TOAST SCRIPT -->
  <script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function(toastEl) {
      return new bootstrap.Toast(toastEl, {
        autohide: false
      }).show()
    })
  </script>
</body>
</html>