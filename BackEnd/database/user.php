<?php
include 'config.php';

if(isset($_POST['submit'])){

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
// VARIABLES FOR USER DETAILS
  $fName = validate ($_POST['fName']);
  $lName = validate ($_POST['lName']);


  // DECLARE VARIABLE FOR THE UPLOADED IMAGES
  $upload = time() . '_' . $_FILES['upload']['name'];
  $target = '../../FrontEnd/_assets/images/uploads/' . $upload;

  if(move_uploaded_file($_FILES['upload']['tmp_name'], $target)){
    $sql = mysqli_query($conn,"insert into users (img) values ('$target')");
    if ($sql){
    header('Location:../../FrontEnd/residents/profile.php?error=Profile Successfully Updated!');
  }
}else{
    header('Location:../../FrontEnd/residents/profile.php?error=Not Successfull!');
  }


}


?>