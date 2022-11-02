<?php
session_start();
include '../../BackEnd/database/config.php';

$dashboard = 1;
$accounts = 2;
$services = 3;
$reports = 4;
$pending = 1;
$ongoing = 5;
$completed = 6;

global $dashboard;
global $accounts;
global $services;
global $reports;
global $pending;
global $ongoing;
global $completed;

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
  <title>Adimn Home Page</title>
</head>

<body style="background-color: rgba(255,248,243);">
  <!--header-->
  <nav class="navbar navbar-expand-md px-2">
    <div class="container-fluid">
      <!-- LOGO -->
      <a class="navbar-brand" href="dashboardpending.php" id="logo"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="200"></a>
      <!-- COLLAPSE BUTTON -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- NAVBAR CONTENT -->
      <div class="collapse navbar-collapse justify-content-end">
        <div class="navbar-md-nav d-flex align-items-center">
          <a href="#" class="nav-link btn-link align-items-center me-3" data-bs-toggle="modal" data-bs-target="#notif"><img src="../_assets/images/bell-fill.svg" class="img-fluid" width="20">
          <!-- INSERT ALL FETCHED ARRAY HERE FOR NOTIFICATION COUNTER-->
          </a>
          <div class="dropdown">
            <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php if (isset($_SESSION['username'])) 
              {
              echo "Welcome! " . $_SESSION['username'];
              } ?>
              <i class="bi bi-caret-down-fill align-text-baseline ms-3"></i></button>
            <ul class="dropdown-menu bg-inner p-2">
              <li class="nav-item">
                <a class="btn btn-unselected w-100" href="profile.php" name="accounts">Profile</a>
              </li>
              <li class="nav-item my-2"><a type="button" href="chngepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a></li>
              <li class="nav-item"><a class="btn btn-unselected w-100" href="../../BackEnd/database/logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!--NAVBAR COLLAPSE CONTENT-->
  <div class="collapse navbar-collapse" id="navbarMenu">
    <div class="navbar-md-nav bg-inner">
      <ul class="navbar-nav bg-transparent text-center">
        <li class="nav-item">
          <button type="button" class="btn btn-unselected rounded-0 w-100" data-bs-toggle="modal" data-bs-target="#notif">Notification</button>
        </li>
        <li class="nav-item">
          <a class="btn btn-unselected w-100" href="profile.php" name="accounts">Profile</a>
        </li>
        <li class="nav-item">
          <a type="button" href="chngepass.php" class="btn btn-unselected w-100 text-nowrap">Change Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-unselected rounded-0" href="../../BackEnd/database/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
  <!-- NOTIFICATION MODAL -->
  <div class="modal fade" id="notif" tabindex="-1" aria-labelledby="notif" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="background-color: rgba(255,248,243);">
        <div class="modal-header">
          <h5 class="modal-title" id="norifTitle">Change Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- INSERT BOOTSTRAP TOAST FOR NOTIFICATIONS -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!-- ADMIN HOME PAGE CONTAINER -->
  <div class="container-fluid mt-5 text-center">
    <div class="row justify-content-center gap-3">
      <!-- HOME PAGE NAVIGATION -->
      <div class="col-md-2">
        <nav class="nav nav-pills flex-column gap-2" role="tablist" aria-orientation="vertical" id="homeNav">
          
          <a href="#dashboard<?php $dashboard ?>" class="nav-link show active bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill" id="dashboardTab" aria-controls="dashboard" role="tab" aria-selected="true" onclick="window.location.reload()">
            Dashboard
          </a>
          <a href="#accounts<?php $accounts ?>" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill" id="accountsTab" aria-controls="accounts" role="tab" aria-selected="false" onclick="window.location.reload()">
            Accounts
          </a>
          <a href="#services<?php $services ?>" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill" id="servicesTab" aria-controls="services" role="tab" aria-selected="false" onclick="window.location.reload()">
            Services
          </a>
          <a href="#reports<?php $reports ?>" class="nav-link bg-adminBackground w-100 text-dark text-nowrap" type="button" data-bs-toggle="pill" id="reportsTab" aria-controls="reports" role="tab" aria-selected="false" onclick="window.location.reload()">
            Reports
          </a>
        </nav>
      </div>
      <!-- HOME PAGE NAVIGATION CONTENTS -->
      <div class="col-md-9 bg-inner p-3">
        <div class="tab-content" id="homeNavContent">
          <!--DASHBOARD CONTENTS -->
          <!-- DASHBOARD TABS -->
          <div class="tab-pane show active" id="dashboard<?php $dashboard ?>" role="tabpanel" aria-labelledby="dashboardTab" tabindex="0" >
            <!-- <div class="row row-cols-3 row-cols-sm-1 px-5 justify-content-center mt-5"> -->
            <div class="nav nav-pills nav-justified gap-3 mt-3" role="tablist" id="dashboardTabs">
              <div class="col">
                <button type="button" class="nav-link active w-100 text-nowrap text-dark bg-secondary active" id="pendingTab" role="tab" data-bs-toggle="pill" data-bs-target="#pending<?php $pending ?>" onclick="window.location.reload()">
                  Pending
                </button>
              </div>
              <div class="col">
                <button type="button" class="nav-link w-100 text-nowrap text-dark bg-secondary" id="ongoingTab" role="tab" data-bs-toggle="pill" data-bs-target="#onGoing<?php $ongoing ?>">
                  On-Going
                </button>
              </div>
              <div class="col">
                <button type="button" class="nav-link w-100 text-nowrap text-dark bg-secondary" data-bs-toggle="pill" data-bs-target="#completed" role="tab" id="completedTab<?php $completed ?>">
                  Completed
                </button>
              </div>
            </div>
            <!-- DASHBOARD TAB CONTENTS -->
            <div class="tab-content" id="dashboardContent">
              <!-- PENDING CONTENTS -->
              <div class="tab-pane show active" id="pending<?php $pending ?>" role="tabpanel">
                <!-- SEARCH BAR -->
                <div class="input-group rounded my-4 w-50 mx-auto">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                  </span>
                </div>
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
                        $result = mysqli_query($conn, "SELECT *,services.serviceType,request_status.status FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE status='Pending'");
                        // if($result)
                        // {
                          while ($row = mysqli_fetch_array($result)) 
                          {
                            $id = $row['requestID'];
                            $accountID = $row['accountID'];
                            $dateFiled = $row['dateFiled'];
                            $serviceType = $row['serviceType'];
                            $status = $row['status'];
                            $concern = $row['concern'];
                       
                      echo '<tr>
                      <form action="../../BackEnd/database/requests.php?id='.$id.'" method="POST">
                        <td> '.date("Y").$id.'</td>
                        <td> '.$accountID.'</td>
                        <td> '.$dateFiled.'</td>
                        <td> '.$serviceType.'</td>
                        <td> '.$concern.'</td>
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
                <!-- SEARCH BAR -->
                <div class="input-group rounded my-4 w-50 mx-auto">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                  </span>
                </div>
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
                         $result = mysqli_query($conn, "SELECT *,services.serviceType,request_status.status FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE status='On-going'");
                        
                          while ($row = mysqli_fetch_array($result)){  
                            $id = $row['requestID'];
                            $accountID = $row['accountID'];
                            $dateFiled = $row['dateFiled'];
                            $serviceType = $row['serviceType'];
                            $concern = $row['concern'];
                            echo '<tr>
                            <form action="../../BackEnd/database/requests.php?id='.$id.'" method="POST">
                              <td> '.date("Y").$id.'</td>
                              <td> '.$accountID.'</td>
                              <td> '.$dateFiled.'</td>
                              <td> '.$serviceType.'</td>
                              <td> '.$concern.'</td>
                              <td>
                              <textarea class="form-control" rows="1" name="notes"></textarea>
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
                <!-- SEARCH BAR -->
                <div class="input-group rounded my-4 w-50 mx-auto">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                  </span>
                </div>
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
                        
                          while ($row = mysqli_fetch_array($result)){  
                            $id = $row['requestID'];
                            $accountID = $row['accountID'];
                            $dateFiled = $row['dateFiled'];
                            $serviceType = $row['serviceType'];
                            $concern = $row['concern'];
                            $notes = $row['notes'];
                            $dateCompleted = $row['dateCompleted'];
                            echo '<tr>
                            <form action="../../BackEnd/database/requests.php?id='.$id.'" method="POST">
                              <td> '.date("Y").$id.'</td>
                              <td> '.$accountID.'</td>
                              <td> '.$dateFiled.'</td>
                              <td> '.$serviceType.'</td>
                              <td> '.$concern.'</td>
                              <td> '.$notes.'</td>
                              <td> '.$dateCompleted.'</td>
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
          <!-- ACCOUNTS CONTENTS -->
          <div class="tab-pane fade" id="accounts<?php $accounts ?>" role="tabpanel" aria-labelledby="accountsTab" tabindex="0">
            <div class="row justify-content-center">
              <div class="input-group rounded my-4 w-50">
                <input type="search" class="form-control rounded w-50" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                <span class="input-group-text border-0" id="search-addon">
                  <i class="bi bi-search"></i>
                </span>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>Account ID</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $userResult = mysqli_query($conn, "SELECT * FROM accounts");
                  if ($userResult) {
                    while ($row = mysqli_fetch_array($userResult)){
                    $userName = $row['accountID'];
                    echo '
                    <tr>
                    <td>' . $userName . '</td>
                    <td>
                      <button type="submit" class="btn btn-primary btn-sm">Reset Password</button>
                    </td>';
                  }
                  }
                  ?>
                  </tr>
                </tbody>
              </table>
            </div>
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
          <!-- REPORTS CONTENTS -->
          <div class="tab-pane container-md fade" id="reports<?php $reports ?>">
            <div class="row justify-content-center text-center">
              <div class="col mx-auto">
                <?php 
                  $result = mysqli_query($conn,"SELECT *,services.serviceType,COUNT(statusID) as completed FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID WHERE statusID = 3 GROUP BY services.serviceType");
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
      </div>
    </div>


  </div>
  </div>

<!-- SCRIPTS -->
  <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- BOOTSTRAP JS -->
    <script src="../_assets/js/bootstrap.bundle.js"></script>
  <!-- FORM VALIDATION SCRIPT -->
    <script type="text/javascript">
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
  <!-- LOCAL STORAGE FOR TABS -->
    <script>
      const pillsTab = document.querySelector('#homeNav');
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
  <!-- LOCAL STORAGE FOR DASHBOARD TABS -->
    <!-- <script>
    const pillsTab2 = document.querySelector('#dashboardTabs');
    const pills2 = pillsTab2.querySelectorAll('button[data-bs-toggle="pill"]');

    pills2.forEach(pill => {
      pill.addEventListener('shown.bs.tab', (event) => {
        const { target } = event;
        const { id: targetId } = target;

        savePillId2(targetId);
      });
    });

    const savePillId2 = (selector) => {
      localStorage.setItem('activePillId', selector);
    };

    const getPillId2 = () => {
      const activePillId2 = localStorage.getItem('activePillId');

      // if local storage item is null, show default tab
      if (!activePillId2) return;

      // call 'show' function
      const someTabTriggerEl2 = document.querySelector(`#${activePillId2}`)
      const tab2 = new bootstrap.Tab(someTabTriggerEl2);

      tab2.show();
    };

    // get pill id on load
    getPillId2(); -->
    <!-- </script> -->
  <!-- GOOGLE PIE CHART SCRIPT -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        
          var data = google.visualization.arrayToDataTable([
            ['serviceType', 'completed'],

            <?php
              while ($row = mysqli_fetch_array($result))
              {
                echo "['".$row["serviceType"]."' , ".$row["completed"]."],";
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

  <!-- VIEW REPORTS SCRIPT -->

</body>

</html>