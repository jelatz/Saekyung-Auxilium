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

        echo "<script>
            $(function(){
                $('#addServices').modal('show');
            return function;
            })

                window.location.href = '../../FrontEnd/admin/dashboardpending.php';
        </script>";
        
        exit();
    }else{
        header('Location: ../../FrontEnd/admin/dashboardpending.php?error= Not added!');
       
    }
}
?>