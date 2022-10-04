<?php
session_start();
include 'config.php';

if (isset($_POST['addServSubmit'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $servType = validate($_POST['serviceType']);

    $insert = mysqli_query($conn,"insert into services (serviceType) values ('$servType')");

    if($insert){
        // echo '<script>alert("amaw ka lad!")</script>';
        // echo '<script>
        // $(function(){
        //     $("#service").tab("show")})
        //     window.location.href = "../../FrontEnd/admin/dashboardpending.php"</script>';
        header('Location:../../FrontEnd/admin/dashboardpending.php?success');
        exit();
    }else{
        header('Location: ../../FrontEnd/admin/dashboardpending.php?error= Not added!');
       
    }
}
?>