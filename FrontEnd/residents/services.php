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
      .navbar-nav{
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
    <a class="navbar-brand" href="services.php"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="150"></a>
<!-- COLLAPSE BUTTON -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"                data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<!-- NAVBAR CONTENT -->
    <div class="collapse navbar-collapse justify-content-end">
      <div class="navbar-md-nav d-flex align-items-center">
        <a href="#" class="nav-link btn-link align-items-center me-3" data-bs-toggle="modal" data-bs-target="#notif"><img src="../_assets/images/bell-fill.svg" class="img-fluid" width="20">
        </a>
      <div class="dropdown">
        <button class="btn btn-unselected mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">Accounts
        </button>
        <ul class="dropdown-menu bg-inner p-2" style="left: -4rem;">
          <li class="nav-item my-2">
            <button type="button" class="btn btn-unselected w-100 text-nowrap" data-bs-toggle="modal" data-bs-target="#chngePassModal">Change Password</button>
          <li class="nav-item my-2"><a class="btn btn-unselected w-100" href="#">Logout</a></li>
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
      <li class="nav-item">
        <button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#chngePassModal">Change Password</button>
      </li>
      <li class="nav-item">
        <a class="nav-link btn" href="#">Logout</a>
      </li>
    </ul>
  </div> 
</div>
<!-- Services and History -->
<div class="container">
  <div class="row my-3 gap-3 mx-auto">
    <div class="col-sm-5 col-lg-3 mx-auto">
      <a href="services.php" class="btn btn-unselected w-100 active" aria-current="page">Services</a>
    </div>
    <div class="col-sm-5 col-lg-3 mx-auto">
      <a href="history.php" class="btn btn-unselected w-100">History</a>
    </div>
  </div>
</div>
<!-- LIST OF SERVICES -->
<div class="container">
  <div class="col-11 p-2 col-sm-10 col-lg-7 bg-inner my-4 my-lg-5 p-sm-4 justify-content-center mx-auto">
    <div class="row mx-auto justify-content-around">
      <div class="col-12 col-md-4 py-2">
        <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal"  data-bs-target="#elecReq">Electrical</button>
<!-- Modal for electrical -->
          <div class="modal fade" id="elecReq" tabindex="-1" aria-labelledby="elecReq" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: rgb(255, 248,243)">
                  <div class="modal-header">
                    <h5 class="modal-title" id="elecReqTitle">Electrical Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">    
                  <form>
                 <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="bldgNum" value="2621"> <!--  get input value from db -->
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="Type" value="Electrical"> 
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="concern" class="col-form-label fw-bold pb-3 ">Concern : </label>
                    </div>
                    <div class="col-12">
                      <textarea name="#" class="form-control" id="concern" rows="5"></textarea>
                    </div>  
                  </div>                 
                 </div>
               <button type="submit" class="btn btn-unselected">Submit</button>
               </form>
              </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-12 col-md-4 py-2">
        <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal"  data-bs-target="#furnitureReq">Furniture</button>
<!-- Modal for Furniture -->
          <div class="modal fade" id="furnitureReq" tabindex="-1" aria-labelledby="furnitureReq" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: rgb(255, 248,243)">
                  <div class="modal-header">
                    <h5 class="modal-title" id="furnitureReqTitle">Furniture Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">    
                  <form>
                 <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="bldgNum" value="2621"> <!--  get input value from db -->
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="Type" value="Furniture">
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="concern" class="col-form-label fw-bold">Concern : </label>
                    </div>
                    <div class="col-12">
                      <textarea name="#" class="form-control" id="concern" rows="5"></textarea>
                    </div>  
                  </div>                 
                 </div>
               <button type="submit" class="btn btn-unselected">Submit</button>
               </form>
              </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-12 col-md-4 py-2">
        <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal"  data-bs-target="#paintReq">Painting</button>
<!-- Modal for Painting -->
          <div class="modal fade" id="paintReq" tabindex="-1" aria-labelledby="paintReq" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: rgb(255, 248,243)">
                  <div class="modal-header">
                    <h5 class="modal-title" id="paintReqTitle">Painting Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">    
                  <form>
                 <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="bldgNum" value="2621"> <!--  get input value from db -->
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="Type" value="Painting">
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="concern" class="col-form-label fw-bold">Concern : </label>
                    </div>
                    <div class="col-12">
                      <textarea name="#" class="form-control" id="concern" rows="5"></textarea>
                    </div>  
                  </div>                 
                 </div>
               <button type="submit" class="btn btn-unselected">Submit</button>
               </form>
              </div>
              </div>
            </div>
          </div>
      </div>
      <div class="w-100"></div>
      <div class="col-12 col-md-4 py-2">
        <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal"  data-bs-target="#plumbingReq">Plumbing</button>
<!-- Modal for Plumbing -->
          <div class="modal fade" id="plumbingReq" tabindex="-1" aria-labelledby="plumbingReq" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: rgb(255, 248,243)">
                  <div class="modal-header">
                    <h5 class="modal-title" id="plumbingReqTitle">Plumbing Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">    
                  <form>
                 <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="bldgNum" value="2621"> <!--  get input value from db -->
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="Type" value="Plumbing">
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="concern" class="col-form-label fw-bold">Concern : </label>
                    </div>
                    <div class="col-12">
                      <textarea name="#" class="form-control" id="concern" rows="5"></textarea>
                    </div>  
                  </div>                 
                 </div>
               <button type="submit" class="btn btn-unselected">Submit</button>
               </form>
              </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-12 col-md-4 py-2">
        <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal"  data-bs-target="#securityReq">Security</button>
<!-- Modal for Security -->
          <div class="modal fade" id="securityReq" tabindex="-1" aria-labelledby="securityReq" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: rgb(255, 248,243)">
                  <div class="modal-header">
                    <h5 class="modal-title" id="securityReqTitle">Security Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">    
                  <form>
                 <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="bldgNum" value="2621"> <!--  get input value from db -->
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="Type" value="Security">
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="concern" class="col-form-label fw-bold">Concern : </label>
                    </div>
                    <div class="col-12">
                      <textarea name="#" class="form-control" id="concern" rows="5"></textarea>
                    </div>  
                  </div>                 
                 </div>
               <button type="submit" class="btn btn-unselected">Submit</button>
               </form>
              </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-12 col-md-4 py-2">
        <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal"  data-bs-target="#tileReq">Tile</button>
<!-- Modal for Tile -->
          <div class="modal fade" id="tileReq" tabindex="-1" aria-labelledby="tileReq" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: rgb(255, 248,243)">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tileReqTitle">Tile Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">    
                  <form>
                 <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="bldgNum" value="2621"> <!--  get input value from db -->
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="Type" class="col-form-label fw-bold">Service Type: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="Type" value="Tile"> 
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="concern" class="col-form-label fw-bold">Concern : </label>
                    </div>
                    <div class="col-12">
                      <textarea name="#" class="form-control" id="concern" rows="5"></textarea>
                    </div>  
                  </div>                 
                 </div>
               <button type="submit" class="btn btn-unselected">Submit</button>
               </form>
              </div>
              </div>
            </div>
          </div>
      </div>
      <div class="w-100"></div>
      <div class="col-lg-10 mt-2 py-2">
        <button type="button" class="btn btn-unselected w-100" data-bs-toggle="modal"  data-bs-target="#otherReq">Other</button>
<!-- Modal for Others -->
          <div class="modal fade" id="otherReq" tabindex="-1" aria-labelledby="otherReq" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: rgb(255, 248,243)">
                  <div class="modal-header">
                    <h5 class="modal-title" id="otherReqTitle">Other Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">    
                  <form>
                 <div class="mb-3">
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="bldgNum" class="col-form-label fw-bold">Building & Unit #: </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      <input type="text" readonly class="form-control-plaintext" id="bldgNum" value="#"> <!--  get input value from db -->
                    </div>  
                  </div>
                  <div class="row g-0">
                    <div class="col-12 col-sm-4">
                      <label for="concern" class="col-form-label fw-bold">Concern : </label>
                    </div>
                    <div class="col-12">
                      <textarea name="#" class="form-control" id="concern" rows="5"></textarea>
                    </div>  
                  </div>                 
                 </div>
               <button type="submit" class="btn btn-unselected">Submit</button>
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
</body>
</html>