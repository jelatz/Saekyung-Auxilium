<?php
session_start();
include '../../BackEnd/database/config.php';
// include '../../Backend/database/services.php';
// QUERY TO RETREIVE SERVICE TYPE IN DB AND STORE IN SESSION

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
    .required::after {
      content: "*" !important;
      color: red !important;
    }

    @media screen and (min-width: 768px) {
      .navbar-nav {
        display: none;
      }
    }
  </style>
  <title>Residents Service Page</title>
</head>

<body style="background-color: rgba(255,248,243);">

  <!--header-->
  <nav class="navbar navbar-expand-md px-2">
    <div class="container-fluid">
      <!-- LOGO -->
      <a class="navbar-brand" href="services.php"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="200"></a>
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
            <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php
              if (isset($_SESSION['username'])) {
                echo "Welcome! " . $_SESSION['username'];
              } ?>
              <i class="bi bi-caret-down-fill align-text-baseline ms-3"></i></button>
            <ul class="dropdown-menu bg-inner p-2">
              <li class="nav-item my-2">
                <a class="btn btn-unselected w-100" href="profile.php" name="accounts">Profile</a>
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
  <!-- NOTIFICATION MODAL -->
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
        <li class="nav-item my-2">
          <a class="btn btn-unselected w-100" href="profile.php" name="accounts">Profile</a>
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
  <!-- SERVICES AND HISTORY -->
  <div class="container">
    <div class="row my-3 gap-3 mx-auto">
      <?php if (isset($_GET['error'])) { ?><p class="error alert alert-danger"><?php echo $_GET['error']; ?></p><?php } ?>
      <?php if (isset($_GET['success'])) { ?><p class="error alert alert-success"><?php echo $_GET['success']; ?></p> <?php } ?>
      <div class="col-sm-5 col-lg-3 mx-auto">
        <a href="services.php" class="btn btn-unselected w-100 active" aria-current="page">Services</a>
      </div>
      <div class="col-sm-5 col-lg-3 mx-auto">
        <a href="history.php" class="btn btn-unselected w-100">History</a>
      </div>
    </div>
  </div>
  <!-- LIST OF SERVICES AND MODALS  -->

  <div class="container">
    <div class="col-11 p-2 col-sm-10 col-lg-7 bg-inner my-4 my-lg-5 p-sm-4 justify-content-center mx-auto">
      <div class="row mx-auto justify-content-around">
        <!-- SERVICE BUTTONS -->
        <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">User: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control-plaintext" name="accountID" value=<?php echo $_SESSION['username'] ?>>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Service Type</label>
            <div class="col-sm-10">
              <select class="form-select" name="service_type">
                <option selected>Please select a Service</option>
                <?php 
                $result = mysqli_query($conn,"SELECT * FROM services");
                while ($row = mysqli_fetch_assoc($result)){
                  ?>
                  <option><?php echo $row['serviceType'] ?></option>
                  <?php } ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Concern: </label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" name="elecConcern"></textarea>
            </div>
          </div>
          <input type="hidden" value="Pending" name="status">


          <button type="submit" name="reqSubmit" class="btn btn-unselected">Submit</button>
        </form>

      </div>
    </div>
  </div>





  <!-- SCRIPTS -->
  <script src="../_assets/js/bootstrap.bundle.js">
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