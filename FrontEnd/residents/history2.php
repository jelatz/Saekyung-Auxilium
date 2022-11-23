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
  <title>Resident History</title>
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
                ;">Unit no.: 1101!</p>
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
    <div class="col-md-3 col-lg-2 p-0 bg-transparent mb-md-2">
      <nav class="nav nav-pills flex-column fs-5 gap-1 p-0">
        <a href="dashboard.php" class="nav-link text-white ps-5">Dashboard</a>
        <a href="services2.php" class="nav-link text-white ps-5">Services</a>
        <a href="history2.php" class="nav-link text-white ps-5 active">History</a>
      </nav>
    </div>
  <!-- NAVIGATION TABS END -->
    <div class="col-md-9 col-lg-10 bg-inner3 p-md-5" style="height: 50.5rem;">
        <h1 class="text-white p-5">Transaction History</h1>
        <div class="row justify-content-center text-center py-5 fs-5 m-3">
        <div class="table-responsive-lg">
        <table class="table table-sm table-hover text-center bg-white" style="border-radius: 10px;">
            <thead>
                <tr class="bg-inner">
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
  <!-- NAVIGATION CONTENTS START -->

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