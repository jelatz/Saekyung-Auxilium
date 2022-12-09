<?php
session_start();
include '../../BackEnd/database/config.php';
if(isset($_GET['notifid']))
    {
    $notifid = $_GET['notifid'];
    $update = mysqli_query($conn,"UPDATE notifications_resident SET status = 1 WHERE notifID = $notifid");
    header('Location:history2.php?notif='.$notifid.'');
    exit();
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
    <?php
              $selectnotif = mysqli_query($conn,"SELECT * FROM notifications_resident WHERE status = 0");
              $count = mysqli_num_rows($selectnotif);
            ?>
    <div class="d-flex flex-row gap-2">
      <div class="dropdown position-relative p-0 m-0">
        <button type="button" class="btn btn-link border-0 mx-auto text-decoration-none"
          data-bs-toggle="dropdown"><img src="../_assets/images/bell.png" class="img-fluid" width="25">
      
        <?php
              if($count == 0){

              }else{
                echo '<span class="badge bg-danger rounded-circle" style="position: absolute; top:-10px; left:2rem;">';
                echo $count;
              }
            ?>
              </button>
        <ul class="dropdown-menu position-absolute p-0 m-0" style="left: -15.3rem; width: 300px;" >
              <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-inner2 text-start" style="height: 3rem;">
                  <img src="../_assets/images/bell.png" class="img-fluid me-2 bg-transparent" width="21">
                  <strong class="me-auto text-center bg-transparent">Notifications</strong>
                </div>
                <?php 
                  $select = mysqli_query($conn,"SELECT * FROM notifications_resident WHERE status = 0");
                  while ($row = mysqli_fetch_array($select))
                  {
                    $notifID = $row['notifID'];
                ?>
                <a href="history2.php?notifid=<?php echo $notifID;?>" class="text-decoration-none text-dark">
                  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                      <strong class="me-auto">Bldg & Unit #: <?php echo $row['user'];?></strong>
                      <!-- <small class="text-muted">5 seconds ago</small> -->
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
      <!-- NOTIFICATIONS DROPDOWN END -->
      <!-- PROFILE DROPDOWN -->
      <?php if(isset($_SESSION['username'])){ $userID = $_SESSION['username'];}?>
      <?php 
      $select = mysqli_query($conn,"SELECT * FROM accounts WHERE userID = $userID limit 1");
      $row = mysqli_fetch_array($select);
      $img = $row['img'];
    ?>
      <div class="dropdown">
        <button type="button" class="btn btn-link border-0 mx-auto text-decoration-none p-0"
          data-bs-toggle="dropdown"><img src="<?php echo $img; ?>" class="img-fluid rounded-pill" width="40" style="height:40px;">
        </button>
        <ul class="dropdown-menu position-absolute bg-inner2" style="left: -15.7rem; width: 290px; ">
            <li class="nav-item">
              <div class="row">
                <div class="col-4">
                  <img src="<?php echo $img; ?>" alt="profile" width="45" class="m-3 ms-5 rounded-pill" style="height:45px;">
                </div>
                <div class="col pt-3">
                  <p class="mb-0" style="font-size: 18px;
                ;">User:<?php echo $userID; ?></p>
                  <a href="profile2.php">Edit My Profile</a>
                </div>
              </div>
            </li>
            <li class="nav-item logout">
              <a href="../../BackEnd/database/logout.php" class="ms-3 text-dark text-decoration-none logout" style="font-size:18px;">
              <div class="row">
                  <div class="col-4 pe-1 text-end">
                    <img src="../_assets/images/logout.png" alt="logout" width="33.33" class="ms-5 p-0">
                  </div>
                  <div class="col">
                    <p class="text-decoration-none ps-1">Logout</p>
                  </div>
                </div>
              </a>
            </li>
          </ul>
      </div>
    </div>
  </div>
</nav>
<!-- NAVBAR END -->

<!-- NAVIGATION TABS START-->
<div class="container-fluid" style="overflow: auto;">
  <div class="row">
    <div class="col-md-3 col-lg-2 p-0 bg-transparent">
      <nav class="nav nav-pills flex-column fs-5 gap-1 p-0">
        <a href="dashboard.php" class="nav-link text-white ps-5">Dashboard</a>
        <a href="services2.php" class="nav-link text-white ps-5 active">Services</a>
        <a href="history2.php" class="nav-link text-white ps-5">History</a>
      </nav>
    </div>
  <!-- NAVIGATION TABS END -->
  <div class="col-md-9 col-lg-10 bg-inner3 p-md-5" style="height: 100vh;">
      <h1 class="text-white my-4">Concerns and Issues</h1>
      <div class="row bg-inner justify-content-center text-center p-4 fs-5" style="border-radius: 10px;">
        <div class="col">
          <?php if (isset($_GET['error'])) { ?><p class="error alert alert-danger"><?php echo $_GET['error']; ?></p><?php } ?>
      <?php if (isset($_GET['success'])) { ?><p class="error alert alert-success"><?php echo $_GET['success']; ?></p> <?php } ?>
        <!-- SERVICE BUTTONS -->
        <form action="../../BackEnd/database/requests.php?" method="POST" class="needs-validation" novalidate="">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-3 col-lg-2 col-form-label text-start">User: </label>
            <div class="col-6 col-lg-10">
              <input type="text" class="form-control-plaintext" id="userreq" name="accountID" value=<?php echo $_SESSION['username']; ?>>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-lg-2 col-form-label text-start">Service Type</label>
            <div class="col-lg-10">
              <select class="form-select" name="service_type">
                <option selected>
                  <?php 
                  if(isset($_GET['servid'])){
                    if($_GET['servid'] == '1'){
                      echo 'Electrical';
                    }elseif($_GET['servid'] == '2'){
                      echo 'Plumbing';
                    }elseif($_GET['servid'] == '3'){
                      echo 'Painting';
                    }elseif($_GET['servid'] == '4'){
                      echo 'Security';
                    }elseif($_GET['servid'] == '5'){
                      echo 'Tile';
                    }elseif($_GET['servid'] == '6'){
                      echo 'Furniture';
                    }elseif($_GET['servid'] == '7'){
                      echo 'Others';
                    }
                  }else{
                  echo 'Please select a Service';
                  }
                  ?>
                </option>
                <?php 
                $result = mysqli_query($conn,"SELECT * FROM services");
                while ($row = mysqli_fetch_array($result)){
                  $serviceID = $row['serviceID'];
                  $_SESSION['serviceID'] = $serviceID;
                  $serviceType = $row['serviceType']
                  ?>
                  <option><?php echo $serviceType ?></option>
                  <?php } ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
              <label for="inputEmail3" class="col-lg-2 col-form-label text-start" >Concern: </label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="5" name="concern" placeholder="Please enter you detailed concern" required></textarea>
            </div>
          </div>
          <input type="hidden" value="Pending" name="pending">     
          <input type="hidden" value="On-going" name="ongoing">     
          <input type="hidden" value="Completed" name="completed">
          <div class="row justify-content-end">  
            <div class="col-lg-2">
              <button type="submit" name="reqSubmit" class="btn w-100 text-white fs-5" style="background-color:#1F2022;">Submit</button>
            </div>
          </div>
        </form>
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