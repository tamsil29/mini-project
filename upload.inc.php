<?php
 if (isset($_POST['upld'])) {
     $file = $_FILES['img'];

     $fileName = $_FILES['img']['name'];
     $fileTmpName = $_FILES['img']['tmp_name'];
     $fileSize = $_FILES['img']['size'];
     $fileError = $_FILES['img']['error'];
     $fileType = $_FILES['img']['type'];

     $fileExt = explode('.', $fileName);
     $fileActualExt = strtolower(end($fileExt));

     $allowed = array('jpg', 'jpeg', 'png');

     if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 100000000) {
                /*$fileNameNew = uniqid('', true).".".$fileActualExt;*/
                $fileDestination = '../pics/'.$fileName;
                /*move_uploaded_file($fileTmpName, $fileDestination);
                /*header("Location: update.php?uploadsuccess");*/
            } else {
                header("Location: update.php?error=bigfile");
            }
        } else{
            header("Location: update.php?error=failed");
        }
     } else{
         header("Location: update.php?error=formatunsupported");

     }
     $dbh = mysqli_connect("localhost", "root", "", "photos");
     $name = $_POST['name'];
     $fileName = $_FILES['img']['name'];
     $text = $_POST['lnk'];

     $sql = "INSERT INTO images (image, text, name) VALUES ('$fileName', '$text','$name')";
     mysqli_query($dbh, $sql);

     move_uploaded_file($fileTmpName, $fileDestination);
     header("Location: ../update.php?success=uploaded");


 }
