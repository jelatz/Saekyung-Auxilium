<?php
    include 'config.php';
    
    if(isset($_GET['deleteService'])){
        $servType= $_GET['deleteService'];

        $sql="delete from services where serviceType='$servType'";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Deleted Successfully";
            header('Location:../../FrontEnd/systemadmin/services.php');
        }else{
            die(mysqli_error($conn));
        }
    }

    if(isset($_POST['deleteAccount'])){
        $accID = $_GET['accID'];

        $result = mysqli_query($conn, "DELETE FROM accounts WHERE accountID = '$accID'");

        if($result){
            header('Location:../../FrontEnd/systemadmin/accounts.php');
            exit();
        }
        else
        {   
            header('Location:../../FrontEnd/systemadmin/accounts.php');
            exit();
        }
    }
