<?php
include 'config.php';
    if(isset($_POST['createSubmit'])){
        // $id=$row['id'];
        $Username=$_POST['userName'];
        $Password=$_POST['password'];

        
        $sql="insert into residents (Username,Password) 
        values ('$Username','$Password')";

        $result=mysqli_query($conn,$sql);
        if($result){
            Echo "New Account Added!";
            header('location: /SaekyungAuxilium/FrontEnd/systemadmin/home.php');
        }else{
            die(mysqli_error($conn));
        }
    }

?>   
