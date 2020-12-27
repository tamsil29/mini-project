<?php
if (isset($_POST['sign-up'])) {

    require 'dbh.inc.php';

    $personname = $_POST['name'];
    $email = $_POST['mail'];
    $username = $_POST['cuserid'];
    $password = $_POST['cpswrd'];

    if(empty($personname) || empty($email) || empty($username) || empty($password)) {
        header("Location: ./signupform.php?error=emptyfields");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ./signupform.php?error=invaliedmail&email");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ./signupform.php?error=invaliedmail");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ./signupform.php?error=invaliusername");
        exit();
    }
    else {

        $sql = "SELECT userid FROM users WHERE userid=?";
        $stmt = mysqli_stmt_init($dbh);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ./signupform.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0) {
                header("Location: ./signupform.php?error=usernametaken&mail=".$email);
            exit();
            }
            else {
                $sql = "INSERT INTO users (names, emailusers, userid, pswrd) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($dbh);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ./signupform.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedpswd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $personname, $email, $username, $hashedpswd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../ulogin.php?signup=success");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbh);
}
else {
    header("Location: ./signupform.php");
    exit();
}
