

<?php
    include 'config.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="delete from renterinformation where renter_ID='$id'";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Deleted Successfully";
            header('location:display.php');
        }else{
            die(mysqli_error($conn));
        }
    }

?>