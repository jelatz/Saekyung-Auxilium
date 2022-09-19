<?php
session_start();
include 'config.php';
// RESIDENT CHANGE PASSWORD
if (isset($_POST['resSubmit'])){
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
          header('Location:../../FrontEnd/residents/changepass.php?success=Password Updated!');
      }else{
        header('Location:../../FrontEnd/residents/changepass.php?error=Incorrect Password!');
      }
    }else{
      header('Location:../../FrontEnd/residents/changepass.php?error=Password does not match!');
    }
}//ADMIN CHANGE PASSWORD
elseif (isset($_POST['adminSubmit'])){
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
}//SYSTEM ADMIN CHANGE PASSWORD
else if (isset($_POST['sysAdSubmit'])){
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
          header('Location:../../FrontEnd/systemadmin/chngePass.php?success=Password Updated!');
      }else{
        header('Location:../../FrontEnd/systemadmin/chngePass.php?error=Incorrect Password!');
      }
    }else{
      header('Location:../../FrontEnd/systemadmin/chngePass.php?error=Password does not match!');
    }
}//FORGOT PASSWORD USER CONFIRMATION
elseif (isset($_POST['confirmSubmit'])){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $userName = validate ($_POST['userName']);
  $defPass = validate (md5($_POST['defPass']));

  $result = mysqli_query($conn,"select userName,defaultPass from accounts where userName = '$userName' and defaultPass = '$defPass'");

  $row = mysqli_fetch_array($result);
    $_SESSION["userName"] = $row["userName"];
  if ($defPass == $row['defaultPass'] && $userName == $row['userName'] ){
    header('Location:../../FrontEnd/resetPass.php');
  }else{
    header('Location:../../FrontEnd/forgotPass.php?error= Username and code does not match');
  }
}//RESET PASSWORD
elseif (isset($_POST['resetSubmit'])){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $userName = validate ($_POST['userName']);
  $newPass = validate (md5($_POST['newPass']));
  $cnfrmNewPass = validate (md5($_POST['cnfrmNewPass']));

  $result = mysqli_query($conn,"select userName from accounts where userName = '$userName'");

  $row = mysqli_fetch_array($result);

  if($newPass == $cnfrmNewPass){
    $sql = mysqli_query($conn,"update accounts set password = '$newPass' where userName = '$userName'");
    header('Location:../../FrontEnd/index.php?success=Password reset successful');
  }else{
    header('Location:changepass.php?error = Password does not match');
  }
  
 
}




?>
