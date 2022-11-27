<?php
session_start();
include '../../BackEnd/database/config.php';
function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_GET['notifid']))
    {
    $notifid = $_GET['notifid'];
    $update = mysqli_query($conn,"UPDATE notifications_resident SET status = 1 WHERE notifID = $notifid");
    header('Location:history2.php?notif='.$notifid.'');
    exit();
    } 
$searchResult = "";
    if(isset($_POST['search']))
    {
      try{
        $searchInput = validate($_POST['searchInput']);
    
        $result = mysqli_query($conn,"SELECT servicerequest.requestID, accounts.userID, services.serviceType,servicerequest.dateFiled, request_status.status, servicerequest.concern, servicerequest.dateCompleted, servicerequest.notes  FROM servicerequest INNER JOIN accounts ON servicerequest.accountID = accounts.accountID INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE servicerequest.requestID LIKE '%$searchInput%' OR servicerequest.accountID LIKE '%$searchInput%' OR services.serviceType LIKE '%$searchInput%' OR request_status.status LIKE '%$searchInput%'");
    
        $searchResult = mysqli_fetch_all($result);
      }catch(exception $e){
        echo '<script>alert(`No results Found!`)</script>';
        header('Location:history2.php');
      }
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
          data-bs-toggle="dropdown"><img src="<?php echo $img; ?>" class="img-fluid rounded-pill" width="35" style="height:35px;">
        </button>
        <ul class="dropdown-menu position-absolute bg-inner2" style="left: -15.7rem; width: 290px; " >
          <li class="nav-item">
            <div class="row">
              <div class="col-4"> 
                <img src="<?php echo $img;?>" alt="profile" width="35" class="m-3 ms-5 rounded-pill" style="height:35px;">
              </div>
              <div class="col pt-3">
                <p class="mb-0" style="font-size: 18px;
                ;">Unit no.:<?php echo $userID; ?></p>
                <a href="profile2.php">Edit My Profile</a>
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
    <div class="col-md-9 col-lg-10 bg-inner3 p-lg-5" style="height: 100vh;">
        <h1 class="text-white mb-4">Transaction History</h1>
        <div class="row justify-content-center">
          <div class="col-5">
            <form class="d-flex" method="POST" action="">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchInput">
              <button class="btn btn-outline-secondary text-white" style="background-color: #1F2022; border-radius:10px;" type="submit" name="search">Search</button>
            </form>
          </div>
        </div>
        <div class="row justify-content-center text-center fs-5 m-3">
        <?php if (isset($_GET['error2'])) { ?><p class="error alert alert-danger"><?php echo $_GET['error2']; ?></p><?php } ?>
        <?php if (isset($_GET['error'])) { ?><p class="error alert alert-danger"><?php echo $_GET['error']; ?></p><?php } ?>
      <?php if (isset($_GET['success'])) { ?><p class="error alert alert-success"><?php echo $_GET['success']; ?></p> <?php } ?>
        <div class="table-responsive">
        <table class="table table-sm table-hover text-center bg-white" style="border-radius: 10px;">
            <thead>
                <tr class="bg-inner">
                    <th class="text-nowrap p-2">Request #</th>
                    <th class="text-nowrap p-2">Bldng & Unit #</th>
                    <th class="text-nowrap p-2">Date Filed</th>
                    <th class="text-nowrap p-2">Service</th>
                    <th class="text-nowrap p-2">Status</th>
                    <th class="text-nowrap p-2">Date Completed</th>
                    <th class="text-nowrap p-2">Notes</th>
                </tr>
            </thead>
            <tbody>
              <?php
              if(isset($_GET['notifid'])){
                        echo '<script>
                        document.getElementById("'.$requestID.'").classList.add("active");
                        </script>';}
              if(!$searchResult){
                $reqSelect = mysqli_query($conn, "SELECT *,services.serviceType,request_status.status FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE servicerequest.accountID = '".$_SESSION['username']."' ORDER BY requestID DESC");
                if($reqSelect)
                {
                  while ($row = mysqli_fetch_array($reqSelect)){
                    $requestID = $row['requestID'];
                    
                    ?>
                <tr id="<?php $requestID ;?>">
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
          }else{
            foreach($searchResult as $value){
                ?>
            <tr>
              <td><?php echo date("Y").$value[0];?></td>
              <td><?php echo $value[1]; ?></td>
              <td><?php echo $value[2]; ?></td>
              <td><?php echo $value[3]; ?></td>
              <td><?php echo $value[4]; ?></td>
              <td><?php echo $value[5]; ?></td>
              <td><?php echo $value[6]; ?></td>
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