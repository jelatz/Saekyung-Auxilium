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
  <style>
    @media screen and (min-width: 768px) {
      .navbar-nav {
        display: none;
      }
    }
  </style>

  <title>System Administrator</title>
</head>

<body style="background-color: rgba(255,248,243);">

  <!--header-->

  <nav class="navbar navbar-expand-md px-2">
    <div class="container-fluid">

      <!-- LOGO -->

      <a class="navbar-brand" href="home.php"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="200"></a>

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
            <button class="btn btn-unselected mx-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php
                                                                                                                                  if (isset($_SESSION['username'])) {
                                                                                                                                    echo "Welcome! " . $_SESSION['username'];
                                                                                                                                  } ?></button>
            <ul class="dropdown-menu bg-inner p-2">
              <li class="nav-item my-2">
                <a class="btn btn-unselected w-100" href="profile.php" name="profile">Profile</a>
              </li>
              <li class="nav-item my-2">
                <a type="button" href="chngePass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
              </li>
              <li class="nav-item my-2">
                <a class="btn btn-unselected w-100" href="../../BackEnd/database/logout.php">Logout</a>
              </li>
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
          <button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#notif">Notification</button>
        </li>
        <li class="nav-item my-2">
          <a class="btn btn-unselected w-100" href="profile.php" name="profile">Profile</a>
        </li>
        <li class="nav-item">
          <a type="button" href="chngePass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" href="../../BackEnd/database/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>

  <!-- SYSTEM ADMIN NAVIGATION -->

  <div class="container-md">
    <div class="row row-cols-3s justify-content-center text-center" role="tablist">
      <nav class="nav nav-pills nav-justified gap-2 p-2" id="systemAdminNav">
        <div class="col">
          <a class="nav-link w-100  text-dark fw-bold show active" data-bs-toggle="pill" href="#home" type="button" id="homeTab">
            Home
          </a>
        </div>
        <div class="col">
          <a class="nav-link w-100 text-dark fw-bold" data-bs-toggle="pill" href="#accounts" type="button" id="accountsTab">
            Accounts
          </a>
        </div>
        <div class="col">
          <a class="nav-link w-100 text-dark fw-bold" data-bs-toggle="pill" href="#reports" type="button" id="reportsTab">
            Reports
          </a>
        </div>
        <div class="col">
          <a class="nav-link w-100 text-dark fw-bold" data-bs-toggle="pill" href="#services" type="button" id="reportsTab">
            Services
          </a>
        </div>
      </nav>
    </div>
  </div>

  <!-- NAVIGATION CONTENTS START -->

  <div class="tab-content text-center mt-3">

    <!-- Home contents START -->

    <div class="tab-pane container-md show active" id="home" role="tabpanel">
      <div class="col-md-12 mx-auto p-3 bg-inner">
        <div class="table-responsive-sm mt-3">
          <table class="table table-sm table-hover table-bordered text-center" style="border-color:black;">
            <thead>
              <tr>
                <th>Request #</th>
                <th>User</th>
                <th>Date Filed</th>
                <th>Service</th>
                <th>Status</th>
                <th>Date Completed</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>sample</td>
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
    <!-- HOME CONTENTS END -->

    <!-- ACCOUNTS CONTENTS START -->

    <div class="tab-pane container-md fade" id="accounts">
      <div class="col-md-12 mx-auto p-3 bg-inner">

        <!-- SEARCH BAR START -->

        <div class="input-group rounded my-4 w-50 mx-auto">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          <span class="input-group-text border-0" id="search-addon">
            <i class="bi bi-search"></i>
          </span>
        </div>
        <!-- SEARCH BAR END -->

        <!-- CREATE NEW ACCOUNT BUTTON START -->

        <button type="button" class="btn btn-unselected" data-bs-toggle="modal" data-bs-target="#createModal" id="createAccountModal">Create New Account</button>
        <!-- CREATE NEW ACCOUNT BUTTON END -->

        <!-- TABLE START -->
        <div class="table-responsive-sm mt-3">
          <table class="table table-sm table-hover table-bordered text-center" style="border-color: black;">
            <thead>
              <tr>
                <th>Building & Room #</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>sample</td>
                <td style="width: 25vw;">
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm mx-2" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                    <button class="btn btn-danger btn-sm" id="deleteBtn">Delete</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- TABLE END -->



        <!-- Modal for Create ACCOUNT START-->

        <div class="modal fade" id="createModal" data-bs-backdrop="static" data-keyboard="true" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
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
                  <select name="userType" class="form-select mt-4" required>
                    <option selected="" name="userType">Select a User Type</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                    <option value="SysAdmin">System Admin</option>
                  </select>
                  <div class="row row-cols-2 d-flex text-center">
                    <div class="col">
                      <input type="submit" class="btn btn-primary mt-4" value="Create Account" name="createNewAccount">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL FOR ADDING MULTIPLE ACCOUNTS -->
        <div class="modal fade" id="multipleAccount">
          <div class="modal-dialog modal-lg modal-center modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="multipleLabe">Add Multiple Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <form action="#" method="POST" class="text-start h-100 needs-validate" novalidate="">
                  <label for="">user</label>
                  <input type="text">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- MODAL FOR CREATE END -->

      <!-- Modal for UPDATE START-->

      <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content" style="background-color: rgb(255, 248,243)">
            <div class="modal-header">
              <h5 class="modal-title" id="updateModalTitle">Update Account</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-3">
                      <label for="userName" class="col-form-label fw-bold">Username </label>
                    </div>
                    <div class="col-12 col-sm-6">
                      <input type="text" class="form-control" id="userName" value="2621"> <!--  get input value from db -->
                    </div>
                  </div>
                  <div class="row g-0 my-3">
                    <div class="col-12 col-sm-3">
                      <label for="password" class="col-form-label fw-bold">Password</label>
                    </div>
                    <div class="col-12 col-sm-6">
                      <input type="text" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-unselected my-3 w-75" id="updateBtn">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- MODAL FOR UPDATE END -->
    </div>
    <!--accounts tab ends-->

    <!-- REPORTS CONTENT -->

  <!-- REPORTS CONTENTS -->
  <div class="tab-pane container-md fade" id="reports<?php $reports ?>">
            <div class="row justify-content-center text-center">
              <div class="col mx-auto">
                <?php
                $result2 = mysqli_query($conn, "SELECT *,services.serviceType,COUNT(statusID) as completed FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID WHERE statusID = 3 GROUP BY services.serviceType");
                ?>
                <div id="piechart" class="mx-auto" style="width: 900px; height: 500px;"></div>
              </div>
            </div>
            <!-- VIEW REPORTS -->
            <div class="row text-start mt-5 mb-2">
              <h5>Date</h5>
            </div>
            <form action="../../BackEnd/database/viewreport.php" class="form-inline" method="POST">
              <div class="row text-start mb-3">
                <label for="From" class="col-sm-1 col-form-label h6">From: </label>
                <div class="col-sm-3">
                  <input type="datetime-local" class="form-control" id="from" name="from">
                </div>
                <label for="To" class="col-sm-1 col-form-label h6">To: </label>
                <div class="col-sm-3">
                  <input type="datetime-local" class="form-control" id="from" name="to">
                </div>
                <button type="submit" class="btn btn-primary w-25 ms-5" name="view_report">View Report</button>
              </div>
            </form>
          </div>
          <!-- REPORTS CONTENT END -->
  </div>
  <!-- SERVICES CONTENTS -->
          
  <div class="tab-pane fade p-5" id="services<?php $services ?>" role="tabpanel" aria-labelledby="servicesTab" tabindex="0">
            <div class="row justify-content-center">
              <!-- ALERT MESSAGE IF SERVICE TYPE IS SUCCESSFULLY ADDED -->
              <?php if (isset($_GET['success'])) { ?><p class="error alert alert-success"><?php echo $_GET['success']; ?></p> <?php } ?>
              <div class="input-group rounded my-4 w-50">
                <input type="search" class="form-control rounded w-50" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                <span class="input-group-text border-0" id="search-addon">
                  <i class="bi bi-search"></i>
                </span>
              </div>
            </div>
            <form action="../../BackEnd/database/services.php" method="POST">
              <div class="table-responsive">
                <table class="table table-bordered table-sm">
                  <thead>
                    <tr>
                      <th><label for="serviceType">Service Type</label></th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- RETRIEVE DATA FROM DATABASE -->
                    <?php
                    $result = mysqli_query($conn, "select * from services");
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        $servType = $row['serviceType'];
                        echo '<tr>
                            <td class="align-middle p-1">
                              ' . $servType . '
                            </td>
                            <td>
                                <button class="btn btn-danger \" ><a href="../../BackEnd/database/delete.php?deleteService=' . $servType . '" class="text-decoration-none text-dark">Delete</a></button>
                            </td>
                            </tr>';
                      }
                    }
                    ?>
                  </tbody>
                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addService">Add Service</button>
              </div>
            </form>
          </div>
          <!-- MODAL FOR ADDING OF SERVICE -->
          <div class="modal fade" data-bs-backdrop="static" id="addService">
            <div class="modal-dialog modal-md modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5">Add Services</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <form action="../../BackEnd/database/services.php" method="POST" class="needs-validation" novalidate="">
                    <?php if (isset($_GET['error'])) { ?><p class="error alert alert-danger"><?php echo $_GET['error']; ?></p> <?php } ?>
                    <label for="service" form-label text-nowrap">Enter Service Type: </label>
                    <input type="text" class="form-control w-75 mx-auto mt-3" name="serviceType" id="serviceType" required>
                    <div class="invalid-feedback">
                      Please enter a service type
                    </div>
                    <button type="submit" name="addServSubmit" id="addServSub" class="btn btn-primary mt-3">Add</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
  </div>

  <!-- SCRIPTS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../_assets/js/bootstrap.bundle.js"></script>
  <!-- FORM VALIDATION -->
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
  <!-- LOCAL STORAGE FOR TAB ID -->
  <script>
    const pillsTab = document.querySelector('#systemAdminNav');
    const pills = pillsTab.querySelectorAll('a[data-bs-toggle="pill"]');

    pills.forEach(pill => {
      pill.addEventListener('shown.bs.tab', (event) => {
        const {
          target
        } = event;
        const {
          id: targetId
        } = target;

        savePillId(targetId);
      });
    });

    const savePillId = (selector) => {
      localStorage.setItem('activePillId', selector);
    };

    const getPillId = () => {
      const activePillId = localStorage.getItem('activePillId');

      // if local storage item is null, show default tab
      if (!activePillId) return;

      // call 'show' function
      const someTabTriggerEl = document.querySelector(`#${activePillId}`)
      const tab = new bootstrap.Tab(someTabTriggerEl);

      tab.show();
    };

    // get pill id on load
    getPillId();
  </script>
  <!-- REPORTS SCRIPT -->
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
        while ($row = mysqli_fetch_array($result2)) {
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