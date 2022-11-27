<?php
session_start();
include '../../BackEnd/database/config.php';

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
    <style>
        @media screen and (min-width: 768px) {
            .navbar-nav {
                display: none;
            }
        }
    </style>
    <title>Reports View Page</title>
</head>

<body style="background-image:url(../_assets/images/resident.png); background-repeat: no-repeat; background-size: cover; background-position:center; height:100%;">

    <div class="container-md">
        <nav class="navbar navbar-expand-md px-2">
            <div class="container-fluid justify-content-center">
                <!-- LOGO -->
                <a class="navbar-brand" href="dashboard.php" id="logo"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="300"></a>
        </nav>

        <div class="row bg-inner justify-content-center text-center p-3 py-5 fs-5 mt-3" style="border-radius: 10px;" style="height: 100%;">
            <div class="col-5 mb-4">
                <form class="d-flex" method="POST" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchInput">
                    <button class="btn btn-outline-secondary text-white" style="background-color: #1F2022; border-radius:10px;" type="submit" name="search">Search</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-sm">
                    <thead>
                        <tr class="text-center">
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
                        if (!$searchResult) {
                            $result = mysqli_query($conn, "SELECT *,services.serviceType FROM servicerequest INNER JOIN services ON servicerequest.serviceID = services.serviceID WHERE dateCompleted BETWEEN '" . $_SESSION['from'] . "' AND '" . $_SESSION['to'] . "'");
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['requestID'];
                                $accountID = $row['accountID'];
                                $dateFiled = $row['dateFiled'];
                                $serviceType = $row['serviceType'];
                                $concern = $row['concern'];
                                $notes = $row['notes'];
                                $dateCompleted = $row['dateCompleted'];
                        ?>
                                <tr class="justify-content-center text-center">
                                    <td><?php echo date('Y') . $id ?></td>
                                    <td><?php echo $accountID ?></td>
                                    <td><?php echo $dateFiled ?></td>
                                    <td><?php echo $serviceType ?></td>
                                    <td><?php echo $concern ?></td>
                                    <td><?php echo $notes ?></td>
                                    <td><?php echo $dateCompleted ?></td>
                                </tr>

                            <?php
                            }
                        } else {
                            foreach ($searchResult as $value) {
                            ?>
                                <tr>
                                    <td><?php echo date("Y") . $value[0]; ?></td>
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
    </div>
</body>

</html>