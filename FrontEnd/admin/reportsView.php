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
  <title>Reports View Page</title>
</head>

<body>
    <div class="container-fluid">
<nav class="navbar navbar-expand-md px-2">
    <div class="container-fluid justify-content-center">
      <!-- LOGO -->
      <a class="navbar-brand" href="dashboardpending.php" id="logo"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="200"></a>
</nav>

<div class="row p-5">
    <div class="table-responsive">
        <table class="table table-hover table-striped table-sm">
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
                    $result = mysqli_query($conn, "SELECT *,services.serviceType FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID WHERE dateCompleted BETWEEN '".$_SESSION['from']."' AND '".$_SESSION['to']."'");
                    while($row = mysqli_fetch_array($result)){
                    $id = $row['requestID'];
                    $accountID = $row['accountID'];
                    $dateFiled = $row['dateFiled'];
                    $serviceType = $row['serviceType'];
                    $concern = $row['concern'];
                    $notes = $row['notes'];
                    $dateCompleted = $row['dateCompleted'];
                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $accountID ?></td>
                    <td><?php echo $dateFiled ?></td>
                    <td><?php echo $serviceType ?></td>
                    <td><?php echo $concern ?></td>
                    <td><?php echo $notes ?></td>
                    <td><?php echo $dateCompleted ?></td>
                </tr>

                <?php 
                }
                ?>
            </tbody>

        </table>
    </div>
</div>
</div>
</body>
</html>