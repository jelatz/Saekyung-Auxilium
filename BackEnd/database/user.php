<?php
// session_start();
include 'config.php';

// INSERT USERS PROFILE PICTURE AND DETAILS
if(isset($_POST['submit'])){

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
// VARIABLES FOR USER DETAILS
  $userID = validate ($_POST['userID']);
  $fName = validate ($_POST['fName']);
  $lName = validate ($_POST['lName']);
  //VARIABLE FOR THE UPLOADED IMAGE
  $upload = time() . '_' . $_FILES['upload']['name'];
  $target = '../../FrontEnd/_assets/images/uploads/' . $upload;
  
// move uploaded img to img folder and db
  if(move_uploaded_file($_FILES['upload']['tmp_name'], $target) || $fName && $lName){
    $sql = mysqli_query($conn,"UPDATE accounts SET firstname = '$fName', lastname = '$lName', img = '$target' WHERE userID = '$userID'");
  }if ($sql)
  {
     header('Location:../../FrontEnd/residents/profile2.php?success=Profile Successfully Updated!');
  }
else
  {
      header('Location:../../FrontEnd/residents/profile2.php?error=Profile Failed To Update!');
  }
}


// RESIDENTS SUBMIT PROFILE

if(isset($_POST['submitAdmin'])){

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
// VARIABLES FOR USER DETAILS
echo 'yes!';
  $userID = validate ($_POST['userID']);
  //VARIABLE FOR THE UPLOADED IMAGE
  $upload = time() . '_' . $_FILES['upload']['name'];
  $target = '../../FrontEnd/_assets/images/uploads/' . $upload;
 
  
// move uploaded img to img folder and db
  if(move_uploaded_file($_FILES['upload']['tmp_name'], $target)){
    $sql = mysqli_query($conn,"UPDATE accounts SET img = '$target' WHERE userID = '$userID'");
  }
  if ($sql)
  {
    
     header('Location:../../FrontEnd/admin/profile2.php?success=Profile Successfully Updated!');
  }
else
  {
      header('Location:../../FrontEnd/admin/profile2.php?error=Profile Failed To Update!');
  }
}


// CREATE NEW ACCOUNT
if(isset($_POST['createNewAccount'])){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $userName = validate ($_POST['userName']);
  $password = validate ($_POST['password']);
  $defaultPassword = validate (md5($_POST['defaultPassword']));
  $userType = validate ($_POST['userType']);
  // INSE
  $insert = mysqli_query($conn,"insert into accounts (accountID,password,defaultPass,usertype) values ('$userName','$password','$defaultPassword','$userType')");
  echo "<script> console.log('letse');</script>";

  if($insert)
  {
    header('Location:../../FrontEnd/systemadmin/home.php?success= Successfully Added!');
  }else
  {
    header('Location:../../FrontEnd/systemadmin/home.php?error=Account not created!');
  }
}
?>