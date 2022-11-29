<?php 
session_start();
include '../../BackEnd/database/config.php';

$userdetails = mysqli_query($conn,"SELECT firstname,lastname FROM accounts WHERE userID = '".$_SESSION['username']."'");
$row = mysqli_fetch_array($userdetails);
$firstname = $row['firstname'];
$lastname = $row['lastname'];

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
  <title>Resident Dashboard</title>
  <style>
     /*Profile Pic Start*/
.picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    width: 106px;
    height: 106px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 60%;
}

.picture-src{
    width: 100%;
    height: 100%;
}
/*Profile Pic End*/
  </style>
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
                  <div class="toast bg-inner" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-inner">
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
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 col-lg-2 p-0 bg-transparent">
      <nav class="nav nav-pills flex-column fs-5 gap-1 p-0">
        <a href="dashboard.php" class="nav-link text-white ps-5">Dashboard</a>
        <a href="services2.php" class="nav-link text-white ps-5">Services</a>
        <a href="history2.php" class="nav-link text-white ps-5">History</a>
      </nav>
    </div>
  <!-- NAVIGATION TABS END -->
  <div class="col-md-9 col-lg-10 bg-inner3 p-5" style="height: 100vh; overflow-y:scroll;">
        <h1 class="text-white">Profile</h1>
        <p class="text-white">Optional update for personal details and change password</p>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-5 bg-inner text-center p-2" style="border-radius: 10px;">
            <form action="../../BackEnd/database/user.php" class="needs-validation h-100" method="POST" enctype="multipart/form-data" novalidate="">
              <?php if(isset($_SESSION['username'])){ $userID = $_SESSION['username'];}?>
    <?php 
      $select = mysqli_query($conn,"SELECT * FROM accounts WHERE userID = $userID limit 1");
      $row = mysqli_fetch_array($select);
      $img = $row['img'];
    ?>
              <div class="card-body">
                <div class="container">
                  <div class="picture-container">
                    <div class="picture mt-4">
                      <img src="<?php echo $img ;?>" class="picture-src" id="frame" title="">
                      <input type="file" id="wizard-picture" class="" onchange="preview()" accept="image/*" name="upload">
                    </div>
                    <h6 class="mt-2">Profile Picture (Optional)</h6>
                  </div>
                </div>
              </div>
              <!-- USER DETAILS LOGIN -->
              <div class="card-body">
              <?php if (isset($_GET['success'])){?><p class="success alert alert-success"><?php echo $_GET['success'];?></p> <?php } ?>     
              <?php if (isset($_GET['error'])){?><p class="error alert alert-danger"><?php echo $_GET['error'];?></p> <?php } ?>
                <input type="hidden" class="form-control" name="userID" value = <?php echo $userID ?>>
                <label for="fName" class="form-label">
                  Enter First Name: 
                </label>
                <input type="text" class="form-control w-75 mx-auto" name="fName" placeholder="">
                <div class="invalid-feedback">
                  Please enter your first name:
                </div>
                <label for="lName" class="form-label">Enter Last Name: </label>
                <input type="text" class="form-control w-75 mx-auto" name="lName" placeholder="">
                <div class="invalid-feedback">
                  Please enter your last name:
                </div>
                <input type="submit" name="submit" value="Submit" class="btn text-white mt-3 w-50 fs-6" style="background-color: #1F2022;">
                <div class="row my-2">
                <a href="changepass2.php">Change Password?</a>
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
<!-- PROFILE PICTURE PREVIEW -->
<script type="text/javascript">
    function preview(){
        frame.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
</body>

</html>