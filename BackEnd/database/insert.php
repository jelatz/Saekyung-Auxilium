<?php

include 'config.php';
// include './FrontEnd/systemadmin/home.php';
    if(isset($_POST['submit'])){
        // $id=$row['id'];
        $Username=$_POST['userName'];
        $Password=$_POST['password'];

        
        $sql="insert into renterinformation (Username,Password) 
        values ('$Username','$Password')";

        $result=mysqli_query($conn,$sql);
        if($result){
            Echo "New Account Added!";
            header('location: home.php');
        }else{
            die(mysqli_error($conn));
        }
    }

    echo "hey!";
?>   
