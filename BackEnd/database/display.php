<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./displays.css">
    <title>Employee Information</title>
</head>

<body>
    <div class="btn_container">
        <h1>Renters Information</h1>
        <button class="btn_add"><a href="insert.php">Add Renter</a>
        </button>
        <div class="table_container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Valid ID Number</th>
                        <th>Room # Selected</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
    
    $sql="select * from renterinformation";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['renter_ID'];
            $Full_Name=$row['Fullname'];
            $Phone_Number=$row['PhoneNumber'];
            $Email=$row['Email'];
            $ValidIdNum=$row['ValidIDNumber'];
            $RoomNum=$row['RoomNumberSelected'];
            echo '<tr>
            <td>'.$Full_Name.'</td>
            <td>'.$Phone_Number.'</td>
            <td>'.$Email.'</td>
            <td>'.$ValidIdNum.'</td>
            <td>'.$RoomNum.'</td>
            <td>
                <button class="btn_update"><a href="update.php?updateid='.$id.'">Update</a></button>
                <button class="btn_del" id="modalId"><a href="delete.php?deleteid='.$id.'">Archive</a></button>
            </td>
            </tr>';
        }
    }
        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<!-- Deelete Link for delte iD -->
<!-- <a href="delete.php? deleteid='.$id.' "><a/> -->