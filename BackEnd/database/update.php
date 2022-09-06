<?php
    include 'config.php';
    $id=$_GET['updateid'];
    $sql="select * from renterinformation where renter_ID=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $FName=$row['Fullname'];
    $PNum=$row['PhoneNumber'];
    $Email=$row['Email'];
    $ValIDNum=$row['ValidIDNumber'];
    $RoomNum=$row['RoomNumberSelected'];
    
    if(isset($_POST['submit'])){
        $Full_Name=$_POST['Full_Name'];
        $Phone_Number=$_POST['Phone_Number'];
        $Email=$_POST['Email'];
        $ValidIDNum=$_POST['ValidIDNum'];
        $RoomNum=$_POST['RoomNum'];

        $sql="update renterinformation set renter_ID=$id, Fullname='$Full_Name', 
        PhoneNumber='$Phone_Number', 
        Email='$Email', 
        ValidIDNumber='$ValidIDNum', RoomNumberSelected='$RoomNum'
        where renter_ID=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Updated Successfully";
            header('location:display.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Insert Employee Information</title>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form">
                <label>Full Name:</label>
                <input class="input" type="text" placeholder="Enter First Name" autocomplete="off" name=Full_Name value=<?php echo $FName; ?>>
            </div>
            <div class="form">
                <label>Phone Number:</label>
                <input class="input" type="text" placeholder="Enter Family Name" autocomplete="off" name=Phone_Number value=<?php echo $PNum; ?>>
            </div>
            <div class="form">
                <label>Email:</label>
                <input class="input" type="text" placeholder="Enter Middle Name" autocomplete="off" name=Email value=<?php echo $Email; ?>>
            </div>  
            <div class="form">
                <label>Valid ID Number:</label>
                <input class="input" type="text" placeholder="Enter Middle Name" autocomplete="off" name=ValidIDNum value=<?php echo $ValIDNum; ?>>
                
            </div>  
            <div class="form">
                <label>Room Number Selected:</label>
                <input class="input" type="text" placeholder="Enter Contact Number" autocomplete="off" name=RoomNum value=<?php echo $RoomNum; ?>>
            </div>      
            <button type="submit" class="btn_insert" name="submit" header="display.php" >Update</button>
    </div>
    
</body>
</html>