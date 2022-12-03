<?php
    include 'config.php';
    
    if(isset($_GET['deleteService'])){
        $servType= $_GET['deleteService'];

        $sql="delete from services where serviceType='$servType'";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Deleted Successfully";
            header('Location:../../FrontEnd/systemadmin/home.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>