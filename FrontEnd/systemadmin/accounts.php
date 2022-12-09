<?php
session_start();
include '../../BackEnd/database/config.php';
if (isset($_GET['notifid'])) {
  $notifid = $_GET['notifid'];
  $update = mysqli_query($conn, "UPDATE notifications SET status = 1 WHERE notifID = $notifid");
  header('Location:history2.php?notif=' . $notifid . '');
  exit();
}

$searchResult = "";
$accountID = "";
if (isset($_POST['search'])) {
  try {
    $searchInput = ($_POST['searchInput']);

    $result = mysqli_query($conn, "SELECT * FROM accounts WHERE userID LIKE '%$searchInput%'");

    $searchResult = mysqli_fetch_all($result);
  } catch (exception $e) {
    echo '<script>alert(`No results Found!`)</script>';
    header('Location:accounts.php');
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
  <title>System Admin Accounts</title>
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
                  <img src="<?php echo $img; ?>" alt="profile" width="45" class="m-3 ms-5 rounded-pill" style="height:45px;">
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
          <a href="home2.php" class="nav-link text-white ps-5">Dashboard</a>
          <a href="accounts.php" class="nav-link text-white ps-5 active">Accounts</a>
          <a href="services.php" class="nav-link text-white ps-5">Services</a>
          <a href="requests.php" class="nav-link text-white ps-5">Requests</a>
        </nav>
      </div>
      <!-- NAVIGATION TABS END -->

      <!-- NAVIGATION CONTENTS -->
      <div class="col-md-9 col-lg-10 bg-inner3 p-md-5" style="height: 100%; overflow:auto">
        <h1 class="text-white mb-4">View Accounts</h1>
        <div class="row justify-content-between ps-3">
          <div class="col-md-5 mb-3 col-lg-4 d-flex flex-row p-0 align-items-center justify-content-between" style="background-color: #FFE5B4; border-radius:10px;">
            <button type="button" class="btn bg-white h-100" style="border-radius: 10px; width:4rem;" data-bs-toggle="modal" data-bs-target="#newAccount">
              <img src="../_assets/images/add.png" alt="add" class="img-fluid" width="25">
            </button>
            <p class="d-inline m-0 mx-auto fw-bold text-nowrap justify-content-center">Create New Account</p>
          </div>
          <div class="col-md-7 col-lg-8">
            <form class="d-flex" method="POST" action="accounts.php">
              <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="searchInput">
                <span class="input-group-text">
                  <button class="btn btn-sm input-group-text w-100 h-100 p-0 m-0" style="border-radius:10px;" type="submit" name="search">
                    <img src="../_assets/images/Search.png" alt="search" class="img-fluid p-0 m-0" width="25">
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>

        <!-- MODAL FOR NEW ACCOUNT -->
        <div class="modal fade" id="newAccount" data-bs-backdrop="static" data-keyboard="true" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style="background-color: rgb(255, 248,243)">
              <div class="modal-header">
                <h5 class="modal-title" id="createModalTitle">Create New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">
                <form action="../../BackEnd/database/user.php" method="POST" class="text-start h-100 needs-validate" novalidate="">
                  <label for="userName" class="form-label">Username: </label>
                  <input type="text" class="form-control" name="userName" required>
                  <label for="password" class="form-label">Password: </label>
                  <input type="text" class="form-control" name="password" required>
                  <label for="defaultPass" class="form-label">Default Password: </label>
                  <input type="text" class="form-control" name="defaultPassword" required>
                  <label for="firstname" class="form-label">Firstname: </label>
                  <input type="text" class="form-control" name="firstname">
                  <label for="lastname" class="form-label">Lastname: </label>
                  <input type="text" class="form-control" name="lastname">
                  <select name="userType" class="form-select mt-4" required>
                    <option selected="" name="userType">Select a User Type</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                    <option value="SysAdmin">System Admin</option>
                  </select>
                  <div class="row row-cols-2 d-flex justify-content-end">
                    <div class="col text-end">
                      <input type="submit" class="btn btn-primary mt-4" value="Create Account" name="createNewAccount">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL FOR NEW ACCOUNT END  -->

        <!-- TABLE START -->
        <div class="table-responsive-sm mt-3">
          <?php if (isset($_GET['success'])) { ?><p class="error alert alert-success"><?php echo $_GET['success']; ?></p> <?php } ?>
          <?php if (isset($_GET['update'])) {
            echo "<script>alert('User Updated Successfully!');</script>";
          } ?>
          <table class="table table-hover table-bordered text-center" style="border-color: black;">
            <thead style="background-color: #FFE5B4; border-radius: 10px;">
              <tr>
                <th style="border-radius:10px 0px 0 0px;">Building & Room #</th>
                <th style="border-radius: 0 10px 0px 0">Action</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <?php
              if (!$searchResult) {
                $selectUser = mysqli_query($conn, "SELECT * FROM accounts");
                $count = 0;
                while ($count < 20 && $row = mysqli_fetch_assoc($selectUser)) {
                  $accountID = $row['accountID'];
              ?>
                  <tr>

                    <td class="align-middle"><?php echo $row['userID']; ?></td>
                    <td style="width: 25vw;">
                      <div class="btn-group">
                        <form action="../../BackEnd/database/delete.php?accID=<?php echo $accountID; ?>" method="POST">
                          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal
                          <?php echo $accountID; ?>"><i class="bi bi-pencil"></i>
                            Update</button>
                          <button class="btn btn-danger btn-sm" id="deleteBtn" name="deleteAccount"><i class="bi bi-trash"></i>
                            Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  <!-- ACCOUNT UPDATE MODAL AFTER SEARCH START -->
                  <div class="modal fade" id="updateModal
                  <?php echo $accountID; ?>" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content" style="background-color: rgb(255, 248,243); box-shadow:10px 10px 250px 250px rgba(0, 0, 0, 0.58); border-radius:15px;">
                        <div class="modal-header">
                          <h5 class="modal-title" id="updateModalTitle">Update Account</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="../../BackEnd/database/user.php?accountid=<?php echo $accountID; ?>" method="POST">
                            <div class="mb-3">
                              <div class="row g-0 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="userName" class="col-form-label fw-bold">Username </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control w-100" id="userName" name="username" placeholder="
                                  <?php echo $row['userID']; ?>">
                                </div>
                              </div>
                              <div class="row g-0 my-3 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="password" class="col-form-label fw-bold">Password</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>">
                                </div>
                              </div>
                              <div class="row g-0 my-3 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="password" class="col-form-label fw-bold">Def Password</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="default_pass" name="defPassword" value="<?php echo $row['defaultPass']; ?>">
                                </div>
                              </div>
                              <div class="row g-0 my-3 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="firstname" class="col-form-label fw-bold">Firstname</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?php echo $row['firstname']; ?>">
                                </div>
                              </div>
                              <div class="row g-0 my-3 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="lastname" class="col-form-label fw-bold">Lastname</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?php echo $row['lastname']; ?>">
                                </div>
                              </div>
                              <select name="userType" class="form-select mt-4">
                                <option selected="" name="userType">Select a User Type</option>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                                <option value="SysAdmin">System Admin</option>
                              </select>
                              <div class="row justify-content-center">
                                <button type="submit" class="btn btn-unselected my-3 w-50 text-white mx-auto" id="updateBtn" name="updateProfile" style="background-color: #1F2022;">Update</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ACCOUNT UPDATE MODAL END -->
                <?php
                  $count++;
                }
              } else {
                foreach ($searchResult as $value) {
                ?>
                  <tr>
                    <td><?php echo $value['1'] ?></td>
                    <td style="width: 25vw;">
                      <div class="btn-group">
                        <form action="../../BackEnd/database/delete.php?accID=<?php echo $value[0]; ?>" method="POST">
                          <button type="button" class="btn btn-primary btn-sm mx-2" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $value[0]; ?>"><i class="bi bi-pencil"></i>
                            Update</button>
                          <button class="btn btn-danger btn-sm" id="deleteBtn" name="deleteAccount"><i class="bi bi-trash"></i>
                            Delete</button>
                      </div>
                    </td>
                  </tr>
                  <!-- ACCOUNT UPDATE MODAL AFTER SEARCH START -->
                  <div class="modal fade" id="updateModal<?php echo $value[0]; ?>" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content" style="background-color: rgb(255, 248,243)">
                        <div class="modal-header">
                          <h5 class="modal-title" id="updateModalTitle">Update Account</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="../../BackEnd/database/user.php?update=<?php echo $value[0]; ?>" method="POST">
                            <div class="mb-3">
                              <div class="row g-0 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="userName" class="col-form-label fw-bold">Username </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="userName" name="username" placeholder="<?php echo $value[1]; ?>">
                                </div>
                              </div>
                              <div class="row g-0 my-3 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="password" class="col-form-label fw-bold">Password</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password">
                                </div>
                              </div>
                              <div class="row g-0 my-3 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="password" class="col-form-label fw-bold">Def Password</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="default_pass" name="default_pass" placeholder="Enter Default Password">
                                </div>
                              </div>
                              <div class="row g-0 my-3 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="firstname" class="col-form-label fw-bold">Firstname</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?php echo $value[4]; ?>">
                                </div>
                              </div>
                              <div class="row g-0 my-3 justify-content-around">
                                <div class="col-12 col-sm-3">
                                  <label for="lastname" class="col-form-label fw-bold">Lastname</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?php echo $value[5]; ?>">
                                </div>
                              </div>
                              <select name="userType" class="form-select mt-4">
                                <option selected="" name="userType">Select a User Type</option>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                                <option value="SysAdmin">System Admin</option>
                              </select>
                              <button type="submit" class="btn btn-unselected my-3 w-75" id="updateBtn" name="updateProfile">Update</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ACCOUNT UPDATE MODAL AFTER SEARCH END -->
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- TABLE END -->
        <!-- UPDATE ACCOUNTS MODAL START -->

        <!-- UPDATE ACCOUNTS MODAL END -->
      </div>
      <!-- NAVIGATION CONTENTS END -->
    </div>
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