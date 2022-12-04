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

if (isset($_POST['dl_report'])) {

    
    //============================================================+
    // File name   : example_011.php
    // Begin       : 2008-03-04
    // Last Update : 2013-05-14
    //
    // Description : Example 011 for TCPDF class
    //               Colored Table (very simple table)
    //
    // Author: Nicola Asuni
    //
    // (c) Copyright:
    //               Nicola Asuni
    //               Tecnick.com LTD
    //               www.tecnick.com
    //               info@tecnick.com
    //============================================================+
    
    /**
     * Creates an example PDF TEST document using TCPDF
     * @package com.tecnick.tcpdf
     * @abstract TCPDF - Example: Colored Table
     * @author Nicola Asuni
     * @since 2008-03-04
     */
    
    // Include the main TCPDF library (search for installation path).
    require_once('../../TCPDF-main/tcpdf.php');
    
    // extend TCPF with custom functions
    class MYPDF extends TCPDF {
    
        // Load table data from file
        public function LoadData() {
            // Read file lines
           include '../../BackEnd/database/config.php';

           $result = mysqli_query($conn, "SELECT servicerequest.requestID, accounts.userID, services.serviceType, request_status.status, servicerequest.concern, servicerequest.dateFiled, servicerequest.notes, servicerequest.dateCompleted FROM servicerequest INNER JOIN accounts ON servicerequest.accountID = accounts.accountID INNER JOIN services ON servicerequest.serviceID = services.serviceID INNER JOIN request_status ON servicerequest.statusID = request_status.statusID WHERE servicerequest.statusID = 3");
           return $result;
        }

        public function Header() {
            // Logo
            $image_file = K_PATH_IMAGES.'FINAL_LOGO.png';
            $this->Image($image_file, 130, 8, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            // $this->SetFont('helvetica', 'B', 20);
            // Title
            // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        }
    
        // Colored table
        public function ColoredTable($header,$data) {
            // Colors, line width and bold font
            $this->SetFillColor(255, 229, 180);
            $this->SetTextColor(0);
            $this->SetDrawColor(0, 0, 0);
            // $this->SetLineWidth(0.1);
            $this->SetFont('', 'B');
            // Header
            $w = array(20, 15, 23, 25, 47, 45, 47, 45);
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 5, $header[$i], 1, 0, 'C', 1);
            }
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(224, 235, 255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = 0;
            foreach($data as $row) {
                $this->Cell($w[0], 6, date('Y') . $row['requestID'], 'LR', 0, 'C', $fill);
                $this->Cell($w[1], 6, $row['userID'], 'LR', 0, 'C', $fill);
                $this->Cell($w[2], 6, $row['serviceType'], 'LR', 0, 'C', $fill);
                $this->Cell($w[3], 6, $row['status'], 'LR', 0, 'C', $fill);
                $this->Cell($w[4], 6, $row['concern'], 'LR', 0, 'C', $fill);
                $this->Cell($w[5], 6, $row['dateFiled'], 'LR', 0, 'C', $fill);
                $this->Cell($w[6], 6, $row['notes'], 'LR', 0, 'C', $fill);
                $this->Cell($w[7], 6, $row['dateCompleted'], 'LR', 0, 'C', $fill);
                $this->Ln();
                $fill=!$fill;
            }
            $this->Cell(array_sum($w), 0, '', 'T');
        }
    }
    
    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('System Admin');
    $pdf->SetTitle('Saekyung Completed Maintenance Service Request');
    // $pdf->SetSubject('TCPDF Tutorial');
    // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    
    // set default header data
    // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    
    // ---------------------------------------------------------
    
    // set font
    $pdf->SetFont('helvetica', '', 12);
    
    // add a page
    $pdf->AddPage('L', 'A4');

    
    // column titles
    $header = array('ReqID', 'User', 'Service', 'Status', 'Concern', 'Date Filed', 'Notes', 'Date Completed');
    
    // data loading
    $data = $pdf->LoadData();
    
    // print colored table
    $pdf->ColoredTable($header, $data);
    
    // ---------------------------------------------------------
    
    // close and output PDF document
    $pdf->Output('reports.pdf', 'I');
    
    //============================================================+
    // END OF FILE
    //============================================================+
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
                <a class="navbar-brand" href="home2.php" id="logo"><img src="../_assets/images/FINAL LOGO.png" class="img-fluid" width="300"></a>
        </nav>

        <div class="row bg-inner justify-content-center text-center p-3 py-5 fs-5 mt-3" style="border-radius: 10px;" style="height: 100%;">
            <h1 class="text-start mb-5">Maintenance & Repair Reports</h1>
            <div class="col-5 mb-4">
                <form class="d-flex mt-4" method="POST" action="">
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
            <div class="row justify-content-end text-end">
                <form method="POST">
                    <div class="col">
                        <a href="home2.php" class="btn mt-3 text-white" style="background-color: #1F2022;">Back</a>
                        <button type="submit" class="btn text-white mt-3" style="background-color:#1F2022;" name="dl_report"> Download Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>