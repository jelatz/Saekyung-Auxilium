<?php
// session_start();
include 'config.php';
function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// INSERT USERS PROFILE PICTURE AND DETAILS
if(isset($_POST['submit'])){


// VARIABLES FOR USER DETAILS
  $userID = validate ($_POST['userID']);
  $fName = validate ($_POST['fName']);
  $lName = validate ($_POST['lName']);
  //VARIABLE FOR THE UPLOADED IMAGE
  $upload = time() . '_' . $_FILES['upload']['name'];
  $target = '../../FrontEnd/_assets/images/uploads/' . $upload;
  
// move uploaded img to img folder and db
  if(move_uploaded_file($_FILES['upload']['tmp_name'], $target) && $fName < 1 && $lName < 1){

    $update = mysqli_query($conn,"UPDATE accounts SET img = '$target' WHERE userID = '$userID'");

    header('Location:../../FrontEnd/residents/profile2.php?success=Profile Successfully Updated!');
    exit();

  }
  elseif(move_uploaded_file($_FILES['upload']['tmp_name'], $target && $fName && $lName)){
    $update = mysqli_query($conn,"UPDATE accounts SET firstname = '$fName', lastname = '$lName', img = '$target' WHERE userID = '$userID'");
    header('Location:../../FrontEnd/residents/profile2.php?success=Profile Successfully Updated!');
    exit();
  }
  
  elseif($fName && $lName){

    $sql = mysqli_query($conn,"UPDATE accounts SET firstname = '$fName', lastname = '$lName' WHERE userID = '$userID'");  
    header('Location:../../FrontEnd/residents/profile2.php?success=Profile Successfully Updated!');
    exit();
  }
else
  {
      header('Location:../../FrontEnd/residents/profile2.php?error=Profile Failed To Update!');
  }
}


// RESIDENTS SUBMIT PROFILE

if(isset($_POST['submitAdmin'])){

// VARIABLES FOR USER DETAILS
echo 'yes!';
  $userID =  ($_POST['userID']);
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
  $password = validate (md5($_POST['password']));
  $firstname = validate ($_POST['firstname']);
  $lastname = validate ($_POST['lastname']);
  $defaultPassword = validate (md5($_POST['defaultPassword']));
  $userType = validate ($_POST['userType']);
  // INSERT USER PROFILE
  $insert = mysqli_query($conn,"insert into accounts (userID,password,defaultPass,firstname, lastname, usertype) values ('$userName','$password','$defaultPassword', '$firstname', '$lastname', '$userType')");
  echo "<script> console.log('letse');</script>";

  if($insert)
  {
    header('Location:../../FrontEnd/systemadmin/accounts.php?success= Successfully Added!');
  }else
  {
    header('Location:../../FrontEnd/systemadmin/home.php?error=Account not created!');
  }
}

// UPDATE USER PROFILE
if(isset($_POST['updateProfile'])){
  $accountID = $_GET['update'];
  $username = validate($_POST['username']);
  $password = validate (md5($_POST['password']));
  $def_password = validate (md5($_POST['default_pass']));
  $firstname = validate($_POST['firstname']);
  $lastname = validate($_POST['lastname']);
  $userType = validate($_POST['userType']);

$result = mysqli_query($conn,"UPDATE accounts SET userID = '$username', password = '$password', defaultPass = '$def_password', firstname = '$firstname', lastname = '$lastname', usertype = '$userType' WHERE accountID = '$accountID'");

print_r($result);

header('Location:../../FrontEnd/systemadmin/accounts.php?update');
exit();
}

if(isset($_POST['submitSysAdmin'])){
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
     header('Location:../../FrontEnd/systemadmin/profile2.php?success=Profile Successfully Updated!');
     exit();
  }
else
  {
      header('Location:../../FrontEnd/systemadmin/profile2.php?error=Profile Failed To Update!');
      exit();
  }
}
?>