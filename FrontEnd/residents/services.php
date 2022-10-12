<?php
session_start();
include '../../BackEnd/database/config.php';
// QUERY TO RETREIVE SERVICE TYPE IN DB AND STORE IN SESSION
$select = mysqli_query($conn,"select serviceType from services");
        $row = mysqli_fetch_array($select);
            $_SESSION['servType'] = $row['serviceType']; 
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
    <?php if (isset($_GET['error'])){ ?><p class="error alert alert-danger"><?php echo $_GET['error'];?></p><?php }?>
    <?php if (isset($_GET['success'])){?><p class="error alert alert-success"><?php echo $_GET['success'];?></p> <?php }?>
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
        <!-- ELECTRICAL BUTTON -->
        <div class="col-12 col-md-4 py-2">
          <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal" data-bs-target="#elecReq">Electrical</button>
          <!-- ELECTRICAL MODAL -->
          <div class="modal fade" id="elecReq" tabindex="-1" aria-labelledby="elecReq" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content" style="background-color: rgb(255, 248,243)">
                <div class="modal-header">
                  <h5 class="modal-title" id="elecReqTitle">Electrical Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
                    <div class="mb-3">
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <?php if (isset($_SESSION['username'])) {
                            $userID = $_SESSION['username'];
                          } ?>
                          <input type="text" readonly class="form-control-plaintext" value=<?php echo $userID ?> name="accountID">
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" value="Electrical">
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="concern" class="col-form-label fw-bold pb-3 ">Concern : </label>
                        </div>
                        <div class="col-12">
                          <textarea class="form-control" rows="5" name="elecConcern"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="elecSubmit" class="btn btn-unselected">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- FURNITURE BUTTON -->
        <div class="col-12 col-md-4 py-2">
          <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal" data-bs-target="#furnitureReq">Furniture</button>
          <!-- FURNITURE MODAL -->
          <div class="modal fade" id="furnitureReq" tabindex="-1" aria-labelledby="furnitureReq" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content" style="background-color: rgb(255, 248,243)">
                <div class="modal-header">
                  <h5 class="modal-title" id="furnitureReqTitle">Furniture Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
                    <div class="mb-3">
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" name="accountID" value=<?php echo $userID ?>>
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" value="Furniture">
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="furnitureConcern" class="col-form-label fw-bold">Concern : </label>
                        </div>
                        <div class="col-12">
                          <textarea name="concern" class="form-control" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-unselected" name="furnitureRequest">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- PAINTING BUTTON -->
        <div class="col-12 col-md-4 py-2">
          <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal" data-bs-target="#paintReq">Painting</button>
          <!-- PAINTING MODAL -->
          <div class="modal fade" id="paintReq" tabindex="-1" aria-labelledby="paintReq" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content" style="background-color: rgb(255, 248,243)">
                <div class="modal-header">
                  <h5 class="modal-title" id="paintReqTitle">Painting Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
                    <div class="mb-3">
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" name="accountID" value=<?php echo $userID ?>>
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" value="Painting">
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="concern" class="col-form-label fw-bold">Concern : </label>
                        </div>
                        <div class="col-12">
                          <textarea name="paintingConcern" class="form-control" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-unselected" name="paintingRequest">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- PLUMBING BUTTON -->
        <div class="col-12 col-md-4 py-2">
          <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal" data-bs-target="#plumbingReq">Plumbing</button>
          <!-- PLUMBING MODAL -->
          <div class="modal fade" id="plumbingReq" tabindex="-1" aria-labelledby="plumbingReq" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content" style="background-color: rgb(255, 248,243)">
                <div class="modal-header">
                  <h5 class="modal-title" id="plumbingReqTitle">Plumbing Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
                    <div class="mb-3">
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" name="accountID" value=<?php echo $userID ?>>
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" value="Plumbing">
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="concern" class="col-form-label fw-bold">Concern : </label>
                        </div>
                        <div class="col-12">
                          <textarea name="plumbingConcern" class="form-control" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-unselected" name="plumbingRequest">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SECURITY BUTTON -->
        <div class="col-12 col-md-4 py-2">
          <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal" data-bs-target="#securityReq">Security</button>
          <!-- SECURITY MODAL -->
          <div class="modal fade" id="securityReq" tabindex="-1" aria-labelledby="securityReq" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content" style="background-color: rgb(255, 248,243)">
                <div class="modal-header">
                  <h5 class="modal-title" id="securityReqTitle">Security Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
                    <div class="mb-3">
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" name="accountID" value=<?php echo $userID ?>> 
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" value="Security">
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="concern" class="col-form-label fw-bold">Concern : </label>
                        </div>
                        <div class="col-12">
                          <textarea name="securityConcern" class="form-control" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-unselected" name="securityRequest">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- TILE BUTTON -->
        <div class="col-12 col-md-4 py-2">
          <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal" data-bs-target="#tileReq">Tile</button>
          <!-- TILE MODAL -->
          <div class="modal fade" id="tileReq" tabindex="-1" aria-labelledby="tileReq" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content" style="background-color: rgb(255, 248,243)">
                <div class="modal-header">
                  <h5 class="modal-title" id="tileReqTitle">Tile Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
                    <div class="mb-3">
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" name="accountID" value=<?php echo $userID ?>> 
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" value="Tile">
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="concern" class="col-form-label fw-bold">Concern : </label>
                        </div>
                        <div class="col-12">
                          <textarea name="tileConcern" class="form-control" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-unselected" name="tileRequest">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        $result = mysqli_query($conn,"SELECT LAST_INSERT_ID()");
        $row = mysqli_fetch_array($result);
        // while ($row > 1)
        // {
        echo '<div class="col-12 col-md-4 py-2">
        <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal" data-bs-target="#plumbingReq">Plumbing</button>
        <!-- PLUMBING MODAL -->
        <div class="modal fade" id="plumbingReq" tabindex="-1" aria-labelledby="plumbingReq" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style="background-color: rgb(255, 248,243)">
              <div class="modal-header">
                <h5 class="modal-title" id="plumbingReqTitle">Plumbing Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">
                <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
                  <div class="mb-3">
                    <div class="row g-0">
                      <div class="col-12 col-sm-4">
                        <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                      </div>
                      <div class="col-12 col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" name="accountID" value=<?php echo $userID ?>>
                      </div>
                    </div>
                    <div class="row g-0">
                      <div class="col-12 col-sm-4">
                        <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                      </div>
                      <div class="col-12 col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" value="Plumbing">
                      </div>
                    </div>
                    <div class="row g-0">
                      <div class="col-12 col-sm-4">
                        <label for="concern" class="col-form-label fw-bold">Concern : </label>
                      </div>
                      <div class="col-12">
                        <textarea name="plumbingConcern" class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-unselected" name="plumbingRequest">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>';
      // break;
    // }
  
        ?>
        <!-- OTHERS BUTTON -->
        <!-- <div class="w-100"></div> -->
        <div class="col-lg-10 mt-2 py-2">
          <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal" data-bs-target="#otherReq">Other</button>
          <!-- OTHER MODAL -->
          <div class="modal fade" id="otherReq" tabindex="-1" aria-labelledby="otherReq" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content" style="background-color: rgb(255, 248,243)">
                <div class="modal-header">
                  <h5 class="modal-title" id="otherReqTitle">Other Request</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../../BackEnd/database/requests.php" method="POST" class="needs-validation" novalidate="">
                    <div class="mb-3">
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                        </div>
                        <div class="col-12 col-sm-2">
                          <input type="text" readonly class="form-control-plaintext" name="accountID" value=<?php echo $userID ?>> 
                        </div>
                      </div>
                      <div class="row g-0">
                        <div class="col-12 col-sm-4">
                          <label for="concern" class="col-form-label fw-bold">Concern : </label>
                        </div>
                        <div class="col-12">
                          <textarea name="otherConcern" class="form-control" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-unselected" name="otherRequest">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../_assets/js/bootstrap.bundle.js"></script>
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