<?php
include '../BackEnd/database/config.php';
include '../BackEnd/database/changepass.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_assets/css/bootstrap.css">
    <link rel="stylesheet" href="_assets/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Forgot Password</title>
</head>
<body class="bg-image" style="background-image:url(_assets/images/indexbackgroundblur.png); background-repeat: no-repeat; background-size: cover; background-position: center; height: 100vh;">
    <!-- navbar -->
<nav class="navbar navbar-expand-md justify-content-center">
    <div class="container-sm p-0">
        <a href="index.php" class="navbar-brand mx-auto d-block"><img src="_assets/images/FINAL LOGO.png" alt="logo" width="250"></a>
    </div>
</nav>

<div class="container-sm">
    <div class="col col-sm-8 col-lg-5 mx-auto my-5 bg-secondary">
        <div class="card">
            <div class="card-header bg-secondary fw-bold "> Reset Password</div>
            <div class="card-body">
                <form action="../BackEnd/database/changepass.php" method="POST" class="needs-validation text-dark p-4" novalidate="">
                  <?php if (isset($_GET['error'])){?><p class="error alert alert-danger"><?php echo $_GET['error'];?></p> <?php } ?>
                  <?php if(isset($_SESSION['userName'])){ $userID = $_SESSION['userName'];}?>
                  <input type="hidden" class="form-control" name="userName" value = <?php echo $userID ?>>
                  <label  for="newPass" class="form-label fw-bold" >Enter New Password</label>
                  <input type="password" class="form-control" id="newPass" name="newPass" required>
                  <div class="invalid-feedback">Current password required</div>
                  <label  for="cnfrmNewPass" class="form-label fw-bold" >Confirm New Password</label>
                  <input type="password" class="form-control" id="cnfrmNewPass" name="cnfrmNewPass" required>
                  <div class="invalid-feedback">Current password required</div>
                  <button type="submit" name="resetSubmit" class="btn btn-unselected mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../FrontEnd/_assets/js/bootstrap.bundle.js"></script>
<script>
  var forms = document.querySelectorAll('.needs-validation')
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
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