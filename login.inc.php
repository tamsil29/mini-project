<?php

if(isset($_POST['sign-in'])){

  require 'dbh.inc.php';

  $mailuid = $_POST['userid'];
  $password = $_POST['pswrd'];

  if (empty($mailuid) || empty($password)) {
    header("Location: .ulogin.php?error=emptyfields");
    exit();
  }
  else{
    $sql = "SELECT * FROM users WHERE emailusers=? OR userid=?";
    $stmt = mysqli_stmt_init($dbh);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: .ulogin.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdcheck = password_verify($password, $row['pswrd']);
        if ($pwdcheck == false) {
          header("Location: .ulogin.php?error=wrongpassword");
          exit();
        }
        elseif ($pwdcheck == true) {
          session_start();
          $_SESSION['idusers'] = $row['idusers'];
          $_SESSION['userid'] = $row['userid'];

          header("location: ../update.php");
          exit();
        }
        else {
          header("Location: ../ulogin.php?error=wrongpassword");
          exit();
        }
      }
      else {
        header("Location: ../ulogin.php?error=nouser");
        exit();
      }
    }
  }

}
else{
  header("Location: ./ulogin.php");
  exit();
}
