<?php
session_start();

if ($_SESSION['username'] == 0 && $_SESSION['password'] == 0) {
  header('Location:../index.php');
  exit();
}

include '../../BackEnd/database/config.php';
if (isset($_GET['notifid'])) {
  $notifid = $_GET['notifid'];
  $update = mysqli_query($conn, "UPDATE notifications SET status = 1 WHERE notifID = $notifid");
  header('Location:history2.php?notif=' . $notifid . '');
  exit();
}

$searchResult = "";
if (isset($_POST['search'])) {
  try {
    $searchInput = ($_POST['searchInput']);

    $result = mysqli_query($conn, "SELECT servicerequest.requestID, accounts.userID, servicerequest.dateFiled, services.serviceType, servicerequest.concern, servicerequest.notes, servicerequest.dateCompleted  FROM servicerequest INNER JOIN accounts ON servicerequest.accountID = accounts.accountID INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE servicerequest.requestID LIKE '%$searchInput%' OR servicerequest.accountID LIKE '%$searchInput%' OR services.serviceType LIKE '%$searchInput%' OR servicerequest.concern LIKE '%$searchInput%' OR servicerequest.notes LIKE '%$searchInput%' OR servicerequest.dateCompleted LIKE '%$searchInput%'");

    $searchResult = mysqli_fetch_all($result);
  } catch (exception $e) {
    echo '<script>alert(`No results Found!`)</script>';
    header('Location:dashboard.php');
    exit();
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
  <title>System Admin Home</title>
</head>

<body style="background-image:url(../_assets/images/resident.png); background-repeat: no-repeat; background-size: cover; background-position:center; height:100%;">

  <!-- NAVBAR START-->
  <nav class="navbar navbar-expand-md px-2 bg-inner">
    <div class="container-fluid">
      <a href="home2.php" class="navbar-brand"><img src="../_assets/images/FINAL LOGO.png" alt="LOGO" class="img-fluid position-relative" width=150; style="top:3px;"></a>

      <!-- NOTIFICATIONS DROPDOWN-->
      <?php
      $selectnotif = mysqli_query($conn, "SELECT * FROM notifications WHERE status = 0");
      $count = mysqli_num_rows($selectnotif);
      ?>
      <div class="d-flex flex-row gap-2">
        <div class="dropdown position-relative p-0 m-0">
          <button type="button" class="btn btn-link border-0 mx-auto text-decoration-none" data-bs-toggle="dropdown"><img src="../_assets/images/bell.png" class="img-fluid" width="25">

            <?php
            if ($count == 0) {
            } else {
              echo '<span class="badge bg-danger rounded-circle" style="position: absolute; top:-10px; left:2rem;">';
              echo $count;
            }
            ?>
          </button>
          <ul class="dropdown-menu position-absolute p-0 m-0" style="left: -15.3rem; width: 300px;">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header bg-inner2 text-start" style="height: 3rem;">
                <img src="../_assets/images/bell.png" class="img-fluid me-2 bg-transparent" width="21">
                <strong class="me-auto text-center bg-transparent">Notifications</strong>
              </div>
              <?php
              $select = mysqli_query($conn, "SELECT * FROM notifications WHERE status = 0");
              while ($row = mysqli_fetch_array($select)) {
                $notifID = $row['notifID'];
              ?>
                <a href="requests.php?notifid=<?php echo $notifID; ?>" class="text-decoration-none text-dark">
                  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                      <strong class="me-auto">Bldg & Unit #: <?php echo $row['user']; ?></strong>
                      <!-- <small class="text-muted">5 seconds ago</small> -->
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                      <p><?php echo $row['message'] ?></p>
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
        <?php if (isset($_SESSION['username'])) {
          $userID = $_SESSION['username'];
        } ?>
        <?php
        $select = mysqli_query($conn, "SELECT * FROM accounts WHERE userID = '$userID' limit 1");
        $row = mysqli_fetch_array($select);
        $img = $row['img'];
        ?>
        <div class="dropdown">
          <button type="button" class="btn btn-link border-0 mx-auto text-decoration-none p-0" data-bs-toggle="dropdown"><img src="<?php echo $img; ?>" class="img-fluid rounded-pill" width="40" style="height:40px;">
          </button>
          <ul class="dropdown-menu position-absolute bg-inner2" style="left: -15.7rem; width: 290px; ">
            <li class="nav-item">
              <div class="row">
                <div class="col-4">
                  <img src="<?php echo $img; ?>" alt="profile" width="45" class="mt-3 rounded-pill" style="height:45px; margin-left:2.7rem;">
                </div>
                <div class="col pt-3">
                  <p class="mb-0" style="font-size: 18px;
                ;">User:<?php echo $userID; ?></p>
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

  <!-- NAVIGATION -->
  <!-- NAVIGATION TABS START-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-lg-2 p-0 bg-transparent">
        <nav class="nav nav-pills flex-column fs-5 gap-1 p-0">
          <a href="home2.php" class="nav-link text-white ps-5 active">Dashboard</a>
          <a href="accounts.php" class="nav-link text-white ps-5">Accounts</a>
          <a href="services.php" class="nav-link text-white ps-5">Services</a>
          <a href="requests.php" class="nav-link text-white ps-5">Requests</a>
        </nav>
      </div>
      <!-- NAVIGATION TABS END -->

      <!-- NAVIGATION CONTENTS -->
      <div class="col-md-9 col-lg-10 bg-inner3 p-md-5" style="height: 100vh;">
        <h1 class="text-white mb-4">Welcome <strong>
            <?php

            $selectUser = mysqli_query($conn, "SELECT firstname,lastname FROM accounts WHERE userID = '$userID' limit 1");
            $row = mysqli_fetch_array($selectUser);
            $firstname = strtoupper($row['firstname']);
            $lastname = strtoupper($row['lastname']);
            if ($row['lastname'] > 1 || $row['firstname'] > 1) {
              echo "$lastname $firstname";
            } else {
              echo $userID;
            }
            ?>
        </h1>
        <div class="row bg-inner justify-content-start text-center p-3 py-5 fs-5 mt-3" style="border-radius: 10px;" style="height: 100%;overflow:auto;">
          <div class="col-md-8">
            <?php
            $result = mysqli_query($conn, "SELECT *,services.serviceType,COUNT(statusID) as completed FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID WHERE statusID = 3 GROUP BY services.serviceType");
            ?>
            <div id="piechart" class="mx-auto" style="width: 100%; height:20rem;"></div>
          </div>

          <!-- VIEW REPORTS -->
          <div class="row text-start mt-5 mb-2 text-white">
            <h5 class="text-dark ps-2">Date</h5>
          </div>
          <form action="../../BackEnd/database/viewreport.php" class="form-inline" method="POST">
            <div class="row text-start mb-3 gap-3">
              <label for="From" class="col-sm-1 col-form-label h6">From: </label>
              <div class="col-sm-3">
                <input type="datetime-local" class="form-control" id="from" name="from">
              </div>
              <label for="To" class="col-sm-1 col-form-label h6">To: </label>
              <div class="col-sm-3">
                <input type="datetime-local" class="form-control" id="from" name="to">
              </div>
              <div class="col-lg-2">
                <button type="submit" class="btn btn-secondary
                 w-100" name="view_report">View Report</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- NAVIGATION CONTENTS END -->
  </div>
  <!-- NAVIGATION -->
  <!-- BOOTSTRAP JS -->
  <script src="../_assets/js/bootstrap.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- NOTIFICATION TOAST SCRIPT -->
  <script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function(toastEl) {
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
  <!-- GOOGLE PIE CHART SCRIPT -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['serviceType', 'completed'],

        <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "['" . $row["serviceType"] . "' , " . $row["completed"] . "],";
        }
        ?>
      ]);

      var options = {
        backgroundColor: 'transparent',
        title: 'Service Request Reports'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</body>

</html>