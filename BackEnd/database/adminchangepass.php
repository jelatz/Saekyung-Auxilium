<?php
// session_start();
include 'config.php';

if (isset($_POST['submit'])){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $userName = validate($_POST['userName']);
  $oldPassword =validate (md5($_POST['oldPassword']));
  $newPassword = validate (md5($_POST['newPassword']));
  $newConfirmPassword = validate (md5($_POST['newConfirmPassword']));

    

  $result = mysqli_query($conn,"select userName,password from accounts where userName = '$userName' and password = '$oldPassword'");

  $row = mysqli_fetch_array($result);
    if($newPassword == $newConfirmPassword){
      if ($row > 0){
          $sql = mysqli_query($conn,"update accounts set password = '$newPassword' where userName = '$userName'");
          header('Location:../../FrontEnd/admin/chngepass.php?success=Password Updated!');
      }else{
        header('Location:adminchangepass.php?error=Incorrect Password!');
      }
    }else{
      header('Location:adminchangepass.php?error=Password does not match!');
    }
}

?>
